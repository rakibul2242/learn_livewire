<form wire:submit.prevent="login" class="max-w-md mx-auto space-y-6 bg-white shadow-lg p-8 rounded-2xl mt-10">
    <h2 class="text-2xl font-bold text-center">Login</h2>
    
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 border border-green-400 p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input wire:model.live.dbounce.500ms="email"
               type="email"
               class="w-full border rounded-lg p-3 focus:outline-none focus:ring"
               autofocus />
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Password</label>
        <input wire:model.live.dbounce.500ms="password"
               type="password"
               class="w-full border rounded-lg p-3 focus:outline-none focus:ring" />
        @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <label class="inline-flex items-center">
        <input wire:model="remember" type="checkbox" class="mr-2 rounded">
        <span class="text-sm">Remember me</span>
    </label>

    <div class="text-right mt-4">
        <div class="bg-blue-600 text-white rounded hover:bg-blue-700 transition inline-block">
            <button type="submit"
                    class="cursor-pointer px-4 py-2"
                    wire:loading.attr="disabled"
                    wire:target="login">
                Sign in
            </button>
            <div wire:loading wire:target="login" class="inline-block pr-4 align-middle">
                <svg class="animate-spin h-5 w-5 text-gray-100" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4" fill="none" />
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v8z" />
                </svg>
            </div>
        </div>
    </div>

    <p class="text-center text-sm mt-2">
        Need an account?
        <a href="{{ route('signup') }}" class="text-blue-600 hover:underline">Register</a>
    </p>
</form>
