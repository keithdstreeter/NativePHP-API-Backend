<?php

use App\Http\Controllers\NotificationListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2', function () {
    return view('welcome2');
});

Route::get('/notificationlist', NotificationListController::class)->name('notificationlist');
