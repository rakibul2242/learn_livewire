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
    <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">

        @if (!$confirmedType)
            <h2 class="text-xl font-semibold mb-4">Select Content Type</h2>

            <form wire:submit.prevent="confirmType">
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Content Type</label>
                    <select wire:model.live.debounce.250ms="type" class="w-full border px-3 py-2 rounded">
                        <option>Select</option>
                        <option value="text">Text</option>
                        <option value="video">Video</option>
                        <option value="quiz">Quiz</option>
                    </select>
                    @error('type')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 cursor-pointer py-2 rounded">
                    Next
                </button>
            </form>
        @else
            <h2 class="text-xl font-semibold mb-4">Add {{ ucfirst($confirmedType) }} Content</h2>

            @if (session()->has('message'))
                <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="save" enctype="multipart/form-data">

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Title</label>
                    <input type="text" wire:model.live.debounce.250ms="title" class="w-full border px-3 py-2 rounded" />
                    @error('title')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if ($confirmedType === 'text')
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Text Content</label>
                        <textarea wire:model.live.debounce.250ms="content_text" rows="5" class="w-full border px-3 py-2 rounded"></textarea>
                        @error('content_text')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @elseif ($confirmedType === 'video')
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Duration (minutes)</label>
                        <input type="number" wire:model.live.debounce.250ms="duration" class="w-full border px-3 py-2 rounded" />
                        @error('duration')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Video File</label>
                        <input type="file" wire:model.live.debounce.250ms="videoFile" class="w-full border px-3 py-2 rounded" />
                        @error('videoFile')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                        <div wire:loading wire:target="videoFile" class="text-sm text-gray-500 mt-2">Uploading...</div>
                    </div>
                @elseif ($confirmedType === 'quiz')
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Quiz</label>
                        <textarea wire:model.live.debounce.250ms="quiz" rows="5" class="w-full border px-3 py-2 rounded" placeholder='quiz questions'></textarea>
                        @error('quiz')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <button type="submit" class="bg-blue-600 cursor-pointer text-white px-4 py-2 rounded flex items-center justify-center gap-2" wire:loading.attr="disabled" wire:target="save">
                    <svg wire:loading wire:target="save" class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                    <span wire:loading.remove wire:target="save">Add Content</span>
                </button>
            </form>

            <button wire:click="$set('confirmedType', null)" class="mt-4 text-sm text-blue-500 cursor-pointer hover:underline">
                ← Change Content Type
            </button>
        @endif

    </div>

</div>
