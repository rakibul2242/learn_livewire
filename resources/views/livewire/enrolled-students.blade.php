<div class="max-w-5xl mx-auto px-6 py-8 bg-white rounded-2xl shadow mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-4 flex items-center justify-between">
        <span>🎓 Enrolled Students</span>
        <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
            Total: {{ count($students) }}
        </span>
    </h2>

    @if ($students->isEmpty())
        <div class="text-center py-8 text-gray-500">
            <p>No students have enrolled in this course yet.</p>
        </div>
    @else
        <h1 class="text-4xl font-extrabold text-gray-900">{{ $course->title }}</h1>
        <p class="mb-8 text-gray-700 leading-relaxed">{{ $course->description }}</p>

        <ul class="space-y-4">
            @foreach ($students as $student)
                <li class="p-4 bg-gray-50 border rounded-lg flex items-center justify-between hover:shadow transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 text-blue-700 w-10 h-10 flex items-center justify-center font-semibold rounded-full shadow-sm">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-800">{{ $student->name }}</p>
                            <p class="text-sm text-gray-500">{{ $student->email }}</p>
                        </div>
                    </div>
                     @if (session('user_role') === 'instructor')
                    <button wire:click="removeStudent({{ $student->id }})" onclick="return confirm('Are you sure you want to remove this student?')" class="cursor-pointer bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded shadow-sm transition">
                        🗑️ Remove
                    </button>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
