<div class="max-w-4xl mx-auto px-4 py-10 bg-white shadow rounded-lg">
    <h2 class="text-3xl font-bold text-center border-b pb-4 mb-8">
        Add a <span class="text-blue-500">Course</span>
    </h2>

    <form wire:submit="save" class="space-y-6" enctype="multipart/form-data">
        <div>
            <label class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" wire:model="title"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                   placeholder="Course title">
            @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Slug</label>
            <input type="text" wire:model="slug"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                   placeholder="Auto-generated or manual">
            @error('slug') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Category</label>
            <input type="text" wire:model="category"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                   placeholder="Optional category">
            @error('category') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Description</label>
            <textarea wire:model="description" rows="5"
                      class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                      placeholder="Write course description..."></textarea>
            @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Price (USD)</label>
            <input type="number" step="0.01" wire:model="price"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                   placeholder="e.g., 29.99">
            @error('price') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Course Image</label>
            <input type="file" wire:model="image"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring">
            @error('image') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

            @if ($image)
                <div class="mt-3">
                    <img src="{{ $image->temporaryUrl() }}" class="h-32 object-cover rounded shadow">
                </div>
            @endif
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Instructor Name</label>
            <input type="text" wire:model="instructor_name"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"
                   placeholder="Instructor full name">
            @error('instructor_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Instructor (User)</label>
            <select wire:model="instructor_id"
                    class="w-full border px-4 py-2 rounded focus:outline-none focus:ring">
                <option value="">-- Select Instructor --</option>
                @foreach ($instructors as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('instructor_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="text-right">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Save Course
            </button>
        </div>
    </form>
</div>