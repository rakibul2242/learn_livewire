<div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center border-b pb-4 mb-10">
        Add a <span class="text-blue-500">Course</span>
    </h2>

    <form wire:submit="save" class="space-y-6 shadow bg-white rounded p-6" enctype="multipart/form-data">
        <div>
            <label class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" wire:model.live.debounce.350ms="title" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring" placeholder="Course title">
            @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Category</label>
            <input type="text" wire:model.live.debounce.350ms="category" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring" placeholder="Optional category">
            @error('category')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Description</label>
            <textarea wire:model.live.debounce.350ms="description" rows="5" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring" placeholder="Write course description..."></textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Price (USD)</label>
            <input type="number" step="0.01" wire:model.live.debounce.350ms="price" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring" placeholder="e.g., 29.99">
            @error('price')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Course Image</label>
            <input type="file" wire:model="image" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring">
            @error('image')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if ($image)
                <div class="mt-3">
                    <img src="{{ $image->temporaryUrl() }}" class="h-32 object-cover rounded shadow">
                </div>
            @endif
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Instructor (User)</label>
            <select wire:model.live.debounce.350ms="instructor_id" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring">
                <option value="">-- Select Instructor --</option>
                @foreach ($instructors as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('instructor_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-right mt-4">
            <div class="bg-blue-600 text-white rounded hover:bg-blue-700 transition inline-block">
                <button type="submit" class="cursor-pointer px-4 py-2 " wire:loading.attr="disabled" wire:target="save">
                    Save Course
                </button>
                <div wire:loading wire:target="save" class="inline-block pr-4 align-middle">
                    <svg class="animate-spin h-5 w-5 text-gray-100" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                    </svg>
                </div>
            </div>
        </div>
    </form>
</div>
