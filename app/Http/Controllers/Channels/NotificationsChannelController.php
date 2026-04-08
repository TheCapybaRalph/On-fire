<?php

namespace App\Http\Controllers\Channels;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationsChannelController extends Controller
{
    public function index(Request $request) {
        $teamId = (string) $request->user()->getCurrentTeamId();

        $channels = Channel::query()
            ->where('team_id', $teamId)
            ->withCount('groupNotifications')
            ->orderByDesc('created_at')
            ->get();

        $data = $channels->map(function (Channel $c) {
            return [
                'id' => (string) $c->getKey(),
                'type' => $c->type,
                'name' => (string) ($c->name ?? ''),
                'active' => (bool) $c->active,
                'groups_count' => (int) ($c->group_notifications_count ?? 0),
                'created_at' => $c->created_at?->toISOString(),
            ];
        })->all();

        info("READING INMTO THIS");

        return Inertia::render('channels/Index', [
            'channels' => $data,
        ]);
    }
}
