<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\View\View;

class NotificationListController extends Controller
{
    public function __invoke(): View
    {
        $notifications = Notification::query()
            ->select([
                'date_sent',
                'bib',
                'ride_short_name',
                'last_name',
                'first_name',
                'message',
            ])
            ->orderByDesc('date_sent')
            ->orderByDesc('id')
            ->get();

        return view('notificationlist', [
            'notifications' => $notifications,
        ]);
    }
}
