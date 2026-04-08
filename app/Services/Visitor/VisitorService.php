<?php

namespace App\Services\Visitor;

use App\Filters\Pages\IsReadyForVisit;
use App\Filters\Pages\ShouldBeActive;
use App\Models\SitePage;
use App\Models\VisitRecord;
use App\Models\VisitRecordPayload;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class VisitorService
{
    public function __construct() { }

    /**
     * @return Collection|SitePage[]
     */
    public function getPagesToVisit(): Collection
    {
        return SitePage::query()
            ->tap(new ShouldBeActive())
            ->tap(new IsReadyForVisit())
            ->get();
    }

    public function processVisitUpdate(SitePage $page, Response $response)
    {
        Log::withContext([
            'pagekey' => $page->getKey(),
            'response' => $response->status()
        ]);

        info("PAGE LOG: " . $page->getKey());
        if(empty($page)) return;

        if(in_array($response->getStatusCode(), $page->expected_status)) {
            $isDown = false;
            $downAt = null;
        } else {
            $isDown = true;
            $downAt = now();
        }

        $page->update([
            'is_down' => $isDown,
            'down_at' => $downAt,
            'next_check_at' => now()->plus(seconds: $page->check_interval_seconds)
        ]);

        $record = VisitRecord::create([
            'site_page_id' => $page->getKey(),
            'status' => $response->getStatusCode(),
            'duration_ms' => round(($response->handlerStats()['total_time'] ?? 0) * 1000),
            'content_length' => $response->getBody()->getSize(),
            'has_error' => ! $response->successful(),
            'has_met_expected_status' => ! $isDown,
        ]);

        try {
            // TODO: hide sensitive headers
            VisitRecordPayload::create([
                'visit_record_id' => $record->getKey(),
                'response_headers' => $response->headers(),
                'response_body' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            // swallow payload errors to avoid impacting primary recording
        }
    }
}
