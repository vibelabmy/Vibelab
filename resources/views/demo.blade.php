<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('Demo') }} - {{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        <main class="min-h-screen px-4 py-12">
            <div class="mx-auto w-full max-w-3xl">
                <h1 class="mb-6 text-2xl font-semibold">{{ __('Demo') }}</h1>
                <x-demo />
            </div>
        </main>
    </body>
</html>
