<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ApkController extends Controller
{
    // Define file details in one place
    private string $fileName = 'D2R2-2026.apk';
    private string $filePath = 'apks/D2R2-2026.apk'; // Points to storage/app/apks/D2R2-2026.apk

    public function showDownloadPage()
    {
        // 1. Check if the file actually exists in storage
        if (!Storage::exists($this->filePath)) {
            abort(404, 'APK file not found.');
        }

        // 2. Gather file metadata for the view
        $fileSize = round(Storage::size($this->filePath) / 1024 / 1024, 2); // Convert to MB
        $lastModified = date('Y-m-d', Storage::lastModified($this->filePath));
        
        // 3. Generate SHA-256 hash so users can verify file integrity
        $absolutePath = Storage::path($this->filePath);
        $sha256 = hash_file('sha256', $absolutePath);

        return view('apk.download', compact('fileSize', 'lastModified', 'sha256'));
    }

    public function downloadApk(): BinaryFileResponse
    {
        if (!Storage::exists($this->filePath)) {
            abort(404);
        }

        // Optional: Add code here to log download counts to a database

        // Force browser download with correct Android MIME type
        return Storage::download($this->filePath, $this->fileName, [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }
}
