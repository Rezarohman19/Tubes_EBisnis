<x-guest-layout>
    <div class="animate-fade-in-up">
        <div class="mb-8">
            <h2 class="text-3xl font-black text-gray-900 tracking-tight">Selamat Datang 👋</h2>
            <p class="mt-2 text-sm font-medium text-gray-500">Masuk ke akun Frozymart Anda untuk mulai belanja</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Email</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                    </div>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" class="input-field !pl-12">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Password</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="input-field !pl-12">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center gap-2 cursor-pointer group">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded-md border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500/50">
                    <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-blue-600 hover:text-blue-500 transition-colors">Lupa password?</a>
                @endif
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-primary w-full !py-3.5 !rounded-2xl !text-sm">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                Masuk Sekarang
            </button>
        </form>

        <!-- Divider -->
        <div class="my-8 flex items-center gap-4">
            <div class="h-px flex-1 bg-gray-200"></div>
            <span class="text-xs font-bold uppercase tracking-wider text-gray-400">atau</span>
            <div class="h-px flex-1 bg-gray-200"></div>
        </div>

        <!-- Register Link -->
        <p class="text-center text-sm font-medium text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500 transition-colors">Daftar Gratis →</a>
        </p>
    </div>
</x-guest-layout>
