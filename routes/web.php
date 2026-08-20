<?php

use App\Http\Controllers\ApkController;
use App\Http\Controllers\NotificationListController;
use Illuminate\Support\Facades\Route;

Route::controller(ApkController::class)->group(function (): void {
    Route::get('/download', 'showDownloadPage')->name('apk.index');
    Route::get('/download/file', 'downloadApk')->name('apk.download');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getapk', function () {
    return view('welcome2');
});

Route::get('/notificationlist', NotificationListController::class)->name('notificationlist');

//Route::get('/getapk', ApkController::class)->name('showDownloadPage');
