<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Notification List</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-full bg-slate-100 font-sans text-slate-900 antialiased dark:bg-slate-950 dark:text-slate-100">
        <main class="mx-auto flex min-h-screen w-full max-w-7xl flex-col gap-6 px-4 py-10 sm:px-6 lg:px-8">
            <header class="flex flex-col gap-2">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-600 dark:text-sky-400">Notifications</p>
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div class="flex flex-col gap-1">
                        <h1 class="text-3xl font-semibold tracking-tight">Notification List</h1>
                        <p class="text-sm text-slate-600 dark:text-slate-400">All notification rows shown in reverse chronological order.</p>
                    </div>
                    <div class="rounded-full bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-800">
                        {{ $notifications->count() }} {{ \Illuminate\Support\Str::plural('notification', $notifications->count()) }}
                    </div>
                </div>
            </header>

            <section class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed divide-y divide-slate-200 dark:divide-slate-800">
                        <colgroup>
                            <col class="w-[18%]">
                            <col class="w-[10%]">
                            <col class="w-[14%]">
                            <col class="w-[14%]">
                            <col class="w-[14%]">
                            <col class="w-[30%]">
                        </colgroup>
                        <thead class="bg-slate-50 dark:bg-slate-800/70">
                            <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                <th scope="col" class="px-4 py-3">Date Sent</th>
                                <th scope="col" class="px-4 py-3">Bib</th>
                                <th scope="col" class="px-4 py-3">Ride Short Name</th>
                                <th scope="col" class="px-4 py-3">Last Name</th>
                                <th scope="col" class="px-4 py-3">First Name</th>
                                <th scope="col" class="px-4 py-3">Message</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white text-sm dark:divide-slate-800 dark:bg-slate-900">
                            @forelse ($notifications as $notification)
                                <tr class="align-top text-slate-700 hover:bg-slate-50 dark:text-slate-200 dark:hover:bg-slate-800/60">
                                    <td class="px-4 py-3 font-medium whitespace-normal break-words">
                                        {{ $notification->date_sent?->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-normal break-words">{{ $notification->bib }}</td>
                                    <td class="px-4 py-3 whitespace-normal break-words">{{ $notification->ride_short_name }}</td>
                                    <td class="px-4 py-3 whitespace-normal break-words">{{ $notification->last_name }}</td>
                                    <td class="px-4 py-3 whitespace-normal break-words">{{ $notification->first_name }}</td>
                                    <td class="px-4 py-3 whitespace-normal break-words">{{ $notification->message }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-500 dark:text-slate-400">
                                        No notifications found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </body>
</html>
