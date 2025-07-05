<div class="max-w-7xl mx-auto px-6 py-12 mt-10">
    <div>
        <a href="{{ route('courses.content.create', $course->slug) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 mb-5 rounded shadow transition duration-200">
            + Add Content
        </a>
    </div>
    <div class="rounded-md shadow p-5 bg-white mb-10 flex justify-between">
        <div class="">
            <h1 class="text-4xl font-extrabold text-gray-900">{{ $course->title }}</h1>
            <p class="mb-8 text-gray-700 leading-relaxed">{{ $course->description }}</p>

            <div class="flex flex-wrap flex-col">
                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-800">Category:</span>
                    <span class="text-gray-600">{{ $course->category ?? 'N/A' }}</span>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-800">Instructor:</span>
                    <span class="text-gray-600">
                        {{ $course->instructor->name ?? ($course->instructor_name ?? 'N/A') }}
                    </span>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-800">Price:</span>
                    <span class="text-green-600 font-semibold">${{ number_format($course->price, 2) }}</span>
                </div>
            </div>
            <a wire:navigate href="{{ route('courses', $course->slug) }}" class="inline-flex items-center justify-center mt-6 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-lg shadow-md transition duration-200">
                👥 View Enrolled Students
            </a>
        </div>
        <div>
            <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('storage/No-Image-Found.png') }}" alt="{{ $course->title }}" class="w-full shadow-md border h-48 object-cover rounded-md mb-4">
        </div>
    </div>

    <h2 class="text-3xl font-semibold text-gray-900 mb-6 border-b border-gray-200 pb-3">
        Course Videos <span class="text-sm text-gray-500">({{ $course->videos->count() }} lessons)</span>
    </h2>

    @if ($videos->count())
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($videos as $index => $video)
                <li class="relative border border-gray-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-md transition duration-300">
                    <!-- Video Number Badge -->
                    <div class="absolute -top-3 -left-3 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                        #{{ $index + 1 }}
                    </div>

                    <!-- Video Title -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $video->title }}</h3>

                    <!-- Duration -->
                    @if ($video->duration)
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Duration: {{ $video->duration }} min
                        </div>
                    @endif

                    <!-- Video Player or Preview -->
                    @if ($video->url)
                        <video controls class="w-full h-48 rounded-lg bg-black mt-3">
                            <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded-lg mt-3 text-gray-400">
                            No video file
                        </div>
                    @endif

                    <!-- Watch Button -->
                    <button class="mt-4 w-full text-center py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition">
                        ▶ Watch Lesson
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="mt-8 w-1/2 mx-auto">
            {{ $videos->links() }}
        </div>
    @else
        <p class="text-gray-500 italic">No videos available for this course yet.</p>
    @endif

</div>
