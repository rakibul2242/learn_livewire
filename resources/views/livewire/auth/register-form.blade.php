<form wire:submit.prevent="register" class="max-w-md mx-auto space-y-6 bg-white shadow-lg p-8 rounded-2xl mt-10">
    <h2 class="text-2xl font-bold text-center">Create Account</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium mb-1">Name</label>
        <input wire:model.live.dbounce.250ms="name" type="text" placeholder="Your full name" class="w-full border rounded-lg p-3 focus:outline-none focus:ring" />
        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input wire:model.live.dbounce.250ms="email" type="email" placeholder="Your email address" class="w-full border rounded-lg p-3 focus:outline-none focus:ring" />
        @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Phone</label>
        <input wire:model.live.dbounce.250ms="phone" type="number" placeholder="Your phone number" class="w-full border rounded-lg p-3 focus:outline-none focus:ring" />
        @error('phone')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Role</label>
        <select wire:model.live.dbounce.250ms="role" class="w-full border rounded-lg p-3 focus:outline-none focus:ring">
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
        </select>
        @error('role')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Password</label>
        <input wire:model.live.dbounce.250ms="password" type="password" placeholder="Password" class="w-full border rounded-lg p-3 focus:outline-none focus:ring" />
        @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="text-right mt-4">
        <div class="bg-green-600 text-white rounded hover:bg-green-700 transition inline-block">
            <button type="submit" class="cursor-pointer px-4 py-2" wire:loading.attr="disabled" wire:target="register">
                Register
            </button>
            <div wire:loading wire:target="register" class="inline-block pr-4 align-middle">
                <svg class="animate-spin h-5 w-5 text-gray-100" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                </svg>
            </div>
        </div>
    </div>

    <p class="text-center text-sm">
        Already have an account?
        <a href="{{ route('signin') }}" class="text-blue-600 hover:underline">Sign in</a>
    </p>
</form>
