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
        Log::info('Storing notification', ['request' => $request->validated()]);
        
        $notification = Notification::query()->create($request->validated());

        Log::info('Notification created', ['notification' => $notification]);
        return response()->json($notification, 201);
    }
}
