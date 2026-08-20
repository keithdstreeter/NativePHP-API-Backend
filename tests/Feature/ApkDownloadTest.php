<?php

use Illuminate\Support\Facades\Storage;

test('download page shows apk metadata and download link', function (): void {
    Storage::fake('local');

    $apkContents = 'fake apk contents';

    Storage::disk('local')->put('apks/D2R2-2026.apk', $apkContents);

    $this->get(route('apk.index'))
        ->assertSuccessful()
        ->assertSee('Download APK File')
        ->assertSee(route('apk.download'), escape: false)
        ->assertSee('download="D2R2-2026.apk"', escape: false)
        ->assertSee(hash('sha256', $apkContents));
});

test('download route returns the apk file', function (): void {
    Storage::fake('local');
    Storage::disk('local')->put('apks/D2R2-2026.apk', 'fake apk contents');

    $this->get(route('apk.download'))
        ->assertSuccessful()
        ->assertHeader('content-type', 'application/vnd.android.package-archive')
        ->assertDownload('D2R2-2026.apk');
});

test('download page is not found when the apk file is missing', function (): void {
    Storage::fake('local');

    $this->get(route('apk.index'))
        ->assertNotFound();
});
