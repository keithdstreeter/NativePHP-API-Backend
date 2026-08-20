<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApkController extends Controller
{
    private const string APK_DISK = 'local';

    private const string APK_FILE_NAME = 'D2R2-2026.apk';

    private const string APK_FILE_PATH = 'private/D2R2-2026.apk';

    public function showDownloadPage(): View
    {
        $apkDisk = $this->apkDisk();

        if (! $apkDisk->exists(self::APK_FILE_PATH)) {
            abort(404, 'APK file not found.');
        }

        $fileSize = round($apkDisk->size(self::APK_FILE_PATH) / 1024 / 1024, 2);
        $lastModified = date('Y-m-d', $apkDisk->lastModified(self::APK_FILE_PATH));
        $absolutePath = $apkDisk->path(self::APK_FILE_PATH);
        $sha256 = hash_file('sha256', $absolutePath);

        return view('download', [
            //'downloadUrl' => route('apk.download'),
            'downloadFileName' => self::APK_FILE_NAME,
            'fileSize' => $fileSize,
            'lastModified' => $lastModified,
            'sha256' => $sha256,
        ]);
    }

    public function downloadApk(): StreamedResponse
    {
        $apkDisk = $this->apkDisk();

        // if (! $apkDisk->exists(self::APK_FILE_PATH)) {
        //     abort(404, 'APK file not found.');
        // }

        // return $apkDisk->download(self::APK_FILE_PATH, self::APK_FILE_NAME, [
        //     'Content-Type' => 'application/vnd.android.package-archive',
        // ]);
    }

    private function apkDisk(): FilesystemAdapter
    {
        //return Storage::disk(self::APK_DISK);
    }
}
