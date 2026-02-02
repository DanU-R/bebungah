<x-guest-layout>
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl shadow-indigo-100 p-8">
        {{-- Logo / Brand --}}
        <div class="mb-10 text-center">
            <div class="mx-auto w-fit px-6 py-3 bg-indigo-600 text-white rounded-2xl font-extrabold text-2xl shadow-lg shadow-indigo-200 tracking-tight">
                Temanten<span class="opacity-80">.</span>
            </div>
            <p class="text-sm text-gray-500 mt-4">
                Silakan masuk untuk mengelola undangan
            </p>
        </div>

        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                    Email Address
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9" />
                        </svg>
                    </span>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="nama@email.com"
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-300
                               focus:bg-white focus:border-indigo-500 focus:ring-indigo-500
                               transition text-sm"
                    >
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                    Password
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-300
                               focus:bg-white focus:border-indigo-500 focus:ring-indigo-500
                               transition text-sm"
                    >
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember --}}
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center text-sm text-gray-600 cursor-pointer">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                    >
                    <span class="ml-2">Ingat sesi saya</span>
                </label>
            </div>

            {{-- Button --}}
            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-indigo-600 text-white font-bold
                       shadow-lg shadow-indigo-200
                       hover:bg-indigo-700 hover:scale-[1.02]
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                       transition"
            >
                Masuk Dashboard
            </button>
        </form>
    </div>
</x-guest-layout>
