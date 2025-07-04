<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center border-b-2 mb-10">Available <span class="text-blue-500">Courses</span></h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($courses as $course)
            <a class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all p-4 cursor-pointer">
                <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('storage/No-Image-Found.png') }}" alt="{{ $course->title }}" class="w-full shadow-md border h-48 object-cover rounded-md mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $course->title }}</h3>
                <p class="text-sm text-gray-500 mb-1">Category: {{ $course->category ?? 'N/A' }}</p>
                <p class="text-sm text-gray-500 mb-1">Instructor: {{ $course->instructor->name ?? 'Unknown' }}</p>
                <p class="text-sm text-gray-500 mb-1">Duration: {{ $course->formattedDuration() }}</p>

                <div class="mt-4 flex items-center justify-between">
                    <span class="text-lg font-semibold">
                        {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'Free' }}
                    </span>

                    <button wire:click="enroll({{ $course->id }})" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded">
                        Enroll
                    </button>
                </div>
            </a>
        @endforeach
    </div>

    @if (session()->has('success'))
        <div class="mt-6 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mt-6 bg-red-100 text-red-800 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif
</div>
