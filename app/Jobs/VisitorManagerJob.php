<?php

namespace App\Jobs;

use App\Models\SitePage;
use App\Services\Visitor\VisitorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\Batch;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * We check if the page is on fire, we notify the users right away
 */
class VisitorManagerJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public VisitorService $visitor) { }

    public function handle(): void
    {
        $pages = $this->visitor->getPagesToVisit();

        info("PAGES TO VISIT: ".count($pages));

        if(blank($pages)) return; // bail

        /**
         * A very brittle implementation, refactor to accomodate for overcrowding
         */
        Http::batch(fn(Batch $batch) => $this->buildBatches($batch, $pages))
            ->progress(function(Batch $batch, int|string $key, Response $response) use ($pages) {
                info("VISITING: $key");
                $page = $pages->where('id', $key)->first();
                $this->visitor->processVisitUpdate($page, $response);
            })
            ->finally(function(Batch $batch, array $results) {
                Log::withContext([
                    'completed' => $batch->finishedAt,
                    'total' => $batch->totalRequests,
                    'failed' => $batch->failedRequests
                ]);
                info("BATCH HAS BEEN COMPLETED: $batch->finishedAt");
            })
            ->catch(function(Batch $batch, int|string $key, Response $response) use ($pages) {
                info("Catching: $key");
                $page = $pages->where('id', $key)->first();
                $this->visitor->processVisitUpdate($page, $response);
            })
            ->concurrency(20)
            ->send();
    }

    /**
     * @param Batch $batch
     * @param SitePage[] $pages
     * @return array
     */
    private function buildBatches(Batch $batch, $pages): array
    {
        $batches = [];
        foreach ($pages as $page) {
            $batches[] = $batch
                ->as($page->getKey())
                ->when(! $page->verify_ssl, function(PendingRequest $b) { $b->withoutVerifying(); })
                ->timeout($page->timeout_seconds)
                ->retry($page->retries, 250)
                ->withHeaders($page->headers ?? [])
                ->when($page->authorization_type == 'bearer', function(PendingRequest $b) use ($page) {
                    $b->withToken(data_get($page, 'authorization_payload.token'));
                })
                ->when($page->authorization_type == 'digest', function(PendingRequest $b) use ($page) {
                    $username = data_get($page, 'authorization_payload.username');
                    $password = data_get($page, 'authorization_payload.password');
                    $b->withDigestAuth($username, $password);
                })
                ->when($page->authorization_type == 'basic', function(PendingRequest $b) use ($page) {
                    $username = data_get($page, 'authorization_payload.username');
                    $password = data_get($page, 'authorization_payload.password');
                    $b->withBasicAuth($username, $password);
                })
                ->when($page->http_method == 'GET', function(PendingRequest $b) use ($page) { $b->get($page->url, $page->payload); })
                ->when($page->http_method == 'POST', function(PendingRequest $b) use ($page) { $b->post($page->url, $page->payload); });
        }

        return $batches;
    }
}
