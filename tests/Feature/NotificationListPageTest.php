<?php

use App\Models\Notification;

test('notification list page displays notifications in reverse chronological order', function (): void {
    Notification::query()->create([
        'date_sent' => '2026-08-07 08:00:00',
        'bib' => '100',
        'ride_short_name' => 'ride-a',
        'last_name' => 'Anderson',
        'first_name' => 'Ava',
        'message' => 'Oldest notification message',
    ]);

    Notification::query()->create([
        'date_sent' => '2026-08-08 08:00:00',
        'bib' => '200',
        'ride_short_name' => 'ride-b',
        'last_name' => 'Baker',
        'first_name' => 'Ben',
        'message' => 'Middle notification message',
    ]);

    Notification::query()->create([
        'date_sent' => '2026-08-09 08:00:00',
        'bib' => '300',
        'ride_short_name' => 'ride-c',
        'last_name' => 'Clark',
        'first_name' => 'Cara',
        'message' => 'Latest notification message',
    ]);

    $this->get(route('notificationlist'))
        ->assertSuccessful()
        ->assertSee('Notification List')
        ->assertSeeInOrder([
            'Latest notification message',
            'Middle notification message',
            'Oldest notification message',
        ]);
});
