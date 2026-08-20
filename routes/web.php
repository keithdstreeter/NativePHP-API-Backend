<?php

use App\Http\Controllers\NotificationListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApkController;

// View the download page
Route::get('/download', [ApkController::class, 'showDownloadPage'])->name('apk.index');

// Securely download the file
Route::get('/download/file', [ApkController::class, 'downloadApk'])->name('apk.download');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2', function () {
    return view('welcome2');
});


Route::get('/notificationlist', NotificationListController::class)->name('notificationlist');
