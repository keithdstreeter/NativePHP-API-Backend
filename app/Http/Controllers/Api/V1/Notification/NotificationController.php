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
        //Log::info('Storing notification', ['request' => $request->validated()]);

        Log::info('Storing notification', ['request' => $request->all()]);

        // $notification = Notification::query()->create($request->validated());

        // Log::info('Notification created', ['notification' => $notification]);


        $notification = Notification::create([
            'message' => $request->Message,
            // 'first_name' => $request->first_name,
            // 'last_name' => $request->last_name,
            // 'bib' => $request->bib,
            // 'ride_short_name' => $request->ride_short_name,
            'date_sent' => $request->DateSent,
        ]);

                //  $newNotificationtEntry = [
                //         'ride' => $cuesheetEntry['ride'],
                //         'turn' => $cuesheetEntry['turn'],
                //         'notes' => $cuesheetEntry['notes'],
                //         'distance' => $cuesheetEntry['distance'],
                //         'completed' => $cuesheetEntry['completed'],
                //     ];

        // Create each cuesheet entry in the database
        //   Cuesheet::create($newCuesheetEntry); 

        return response()->json($notification, 201);
    }
}
