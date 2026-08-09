<?php

namespace App\Http\Controllers\Api\V1\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Notification\StoreNotificationRequest;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function store(StoreNotificationRequest $request): JsonResponse
    {

        Log::info('Storing notification', ['request' => $request->all()]);

        $notification = Notification::create([
            'message' => $request->Message,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bib' => $request->bib,
            'ride_short_name' => $request->ride_short_name,
            'date_sent' => $request->DateSent,
        ]);

        return response()->json($notification, 201);
    }
}
