<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
    <script src="https://cdn.skypack.dev/@hotwired/turbo"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" wire:navigate class="text-xl font-bold text-blue-600">Cloud Learner</a>


            <nav class="space-x-6 hidden md:flex">
                <a href="{{ url('/home') }}" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Home</a>
                <a href="{{ url('/courses') }}" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Courses</a>
                <a href="#" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">About</a>
                <a href="#" wire:navigate class="text-gray-700 hover:text-blue-600 font-semibold">Contact</a>
            </nav>

            <div class="flex items-center space-x-4">
                @if (session()->has('user_id'))
                    <span class="text-sm font-medium text-gray-700">
                         {{ session('user_name') }}
                    </span>

                    @if (session('user_role') === 'instructor')
                        <a href="{{ route('courses.create') }}"
                           wire:navigate
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Add Course
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-600 text-gray-200 px-4 py-2 rounded hover:bg-red-700 cursor-pointer transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('signin') }}" wire:navigate class="text-blue-600 font-semibold hover:underline">Login</a>
                    <a href="{{ route('signup') }}" wire:navigate class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Register</a>
                @endif
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
