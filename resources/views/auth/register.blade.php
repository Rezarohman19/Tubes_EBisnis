<x-guest-layout>
    <div class="animate-fade-in-up">
        <div class="mb-8">
            <h2 class="text-3xl font-black text-gray-900 tracking-tight">Buat Akun Baru 🚀</h2>
            <p class="mt-2 text-sm font-medium text-gray-500">Gabung dengan ribuan pelanggan Frozymart</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkap Anda" class="input-field !pl-12">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Email</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                    </div>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" class="input-field !pl-12">
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
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Min. 8 karakter" class="input-field !pl-12">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" class="input-field !pl-12">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-primary w-full !py-3.5 !rounded-2xl !text-sm">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Daftar Sekarang
            </button>
        </form>

        <!-- Divider -->
        <div class="my-8 flex items-center gap-4">
            <div class="h-px flex-1 bg-gray-200"></div>
            <span class="text-xs font-bold uppercase tracking-wider text-gray-400">atau</span>
            <div class="h-px flex-1 bg-gray-200"></div>
        </div>

        <!-- Login Link -->
        <p class="text-center text-sm font-medium text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-500 transition-colors">Masuk di sini →</a>
        </p>
    </div>
</x-guest-layout>
