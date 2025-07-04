<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo / Brand -->
        <a href="{{ url('/') }}" wire:navigate class="text-xl font-bold text-blue-600">Cloud Learner</a>

        <!-- Navigation -->
        <nav class="space-x-6 hidden md:flex">
            <a href="{{ url('/') }}" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Home</a>
            <a href="{{ url('/') }}" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Courses</a>
            <a href="#" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">About</a>
            <a href="#" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Contact</a>
        </nav>

        <!-- Add Course Button -->
        <a href="{{ route('courses.create') }}" wire:navigate
           class="hidden sm:inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Add Course
        </a>
    </div>
</header>

    <body class="bg-gray-100">
        <div>

            {{ $slot }}

        </div>
        @livewireScripts
    </body>

</html>
