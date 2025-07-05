<div class="max-w-7xl mx-auto px-6 py-12 mt-10">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 border border-green-400 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 border border-red-400 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif


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
             @if (session('user_role') === 'instructor')
            <div class="flex-start flex gap-4">
                <a wire:navigate href="{{ route('courses.edit', $course->slug) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold mt-6 py-3 px-4 rounded-lg shadow transition duration-200">
                    ✏️ Edit Course
                </a>
                <a wire:navigate href="{{ route('courses.students', $course->slug) }}" class="inline-flex items-center justify-center mt-6 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-lg shadow-md transition duration-200">
                    👥 View Enrolled Students
                </a>
                <button wire:click="delete({{ $course->id }})" onclick="return confirm('Are you sure you want to delete this course?')" class="bg-red-600 hover:bg-red-700 text-white font-semibold mt-6 py-3 px-4 rounded shadow transition duration-200 cursor-pointer">
                    🗑️ Delete
                </button>
            </div>
            @endif
        </div>
        <div>
            <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('storage/No-Image-Found.png') }}" alt="{{ $course->title }}" class="w-full shadow-md border h-48 object-cover rounded-md mb-4">
        </div>
    </div>
     @if (session('user_role') === 'instructor')
    <div class="flex flex-wrap justify-end gap-3 mb-6">
        <a href="{{ route('courses.content.create', $course->slug) }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
            + Add Content
        </a>
    </div>
    @endif
    <div>
        <h2 class="text-3xl font-semibold text-gray-900 mb-6 border-b pb-3 flex items-center justify-between">
            Course Contents <span class="text-sm text-gray-500">({{ $contents->total() }} lessons)</span>

            <div>
                <label for="typeFilter" class="mr-2 text-sm text-gray-600">Filter:</label>
                <select wire:model.live="typeFilter" id="typeFilter" class="border rounded px-3 py-1 text-sm">
                    <option value="">All</option>
                    <option value="text">Text</option>
                    <option value="video">Video</option>
                    <option value="quiz">Quiz</option>
                </select>
            </div>
        </h2>

        @if ($contents->count())
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($contents as $index => $content)
                    <li class="relative border border-gray-200 rounded-xl p-5 bg-white shadow hover:shadow-md transition">
                        <div class="absolute -top-3 -left-3 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                            #{{ $index + 1 }}
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $content->title }}</h3>

                        <div class="mb-2 text-sm font-medium">
                            <span class="px-2 py-1 rounded bg-gray-200 text-gray-700 uppercase">{{ $content->type }}</span>
                        </div>

                        @if ($content->type === 'video' && $content->duration)
                            <div class="text-sm text-gray-500 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $content->duration }} min
                            </div>
                        @endif

                        @if ($content->type === 'video' && $content->video_url)
                            <video controls class="w-full h-48 rounded-lg bg-black mt-3">
                                <source src="{{ asset('storage/' . $content->video_url) }}" type="video/mp4">
                            </video>
                        @elseif ($content->type === 'text')
                            <div class="prose max-w-none mt-3 text-gray-700">
                                {!! \Illuminate\Support\Str::limit($content->content_text, 150) !!}
                            </div>
                        @elseif ($content->type === 'quiz')
                            <div class="mt-3 p-3 bg-yellow-100 text-yellow-800 rounded">
                                Quiz Content Available
                            </div>
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded-lg mt-3 text-gray-400">
                                No preview available
                            </div>
                        @endif

                        @if ($content->type === 'video' && $content->video_url)
                            <button class="mt-4 w-full text-center py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition">
                                ▶ Watch Lesson
                            </button>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div class="mt-8 w-full flex justify-center">
                {{ $contents->links() }}
            </div>
        @else
            <p class="text-gray-500 italic">No content available for this course yet.</p>
        @endif
    </div>
</div>
