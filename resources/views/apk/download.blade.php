<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Android APK</title>
    <script src="https://tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-white rounded-xl shadow-md p-6 text-center">
        <!-- App Header -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">My Android App</h1>
        <p class="text-sm text-gray-500 mb-6">Official Direct APK Download</p>

        <!-- Download Button -->
        <a href="{{ route('apk.download') }}"
            class="inline-block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow mb-6">
            Download APK File
        </a>

        <!-- File Metadata -->
        <div class="border-t border-gray-200 pt-4 text-left text-sm text-gray-600 space-y-2">
            <div class="flex justify-between">
                <span class="font-medium text-gray-500">File Size:</span>
                <span>{{ $fileSize }} MB</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-500">Updated:</span>
                <span>{{ $lastModified }}</span>
            </div>
            <div class="pt-2">
                <span class="block font-medium text-gray-500 mb-1">SHA-256 Checksum:</span>
                <code class="block bg-gray-50 p-2 rounded text-xs break-all font-mono border text-gray-700">
                    {{ $sha256 }}
                </code>
            </div>
        </div>

        <!-- Installation Instructions -->
        <div class="mt-6 bg-blue-50 border border-blue-200 p-4 rounded-lg text-left">
            <h3 class="text-sm font-semibold text-blue-800 mb-1">How to Install:</h3>
            <ol class="list-decimal list-inside text-xs text-blue-700 space-y-1">
                <li>Tap the download button above.</li>
                <li>Open the downloaded `.apk` file.</li>
                <li>Allow "Install from Unknown Sources" if prompted by Android.</li>
            </ol>
        </div>
    </div>

</body>

</html>