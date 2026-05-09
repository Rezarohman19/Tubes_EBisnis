<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h2 class="section-heading">👤 Profil Saya</h2>
                    <p class="section-subheading">Kelola informasi akun dan keamanan Anda</p>
                </div>
            </div>

            {{-- Profile Card --}}
            <div class="mb-8 rounded-2xl border border-white/5 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 p-8 shadow-lg">
                <div class="flex items-center gap-5">
                    <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white/10 text-3xl font-black text-white backdrop-blur-sm ring-4 ring-white/10">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-white">{{ Auth::user()->name }}</h3>
                        <p class="mt-1 text-sm font-medium text-white/70">{{ Auth::user()->email }}</p>
                        <p class="mt-2 text-xs font-bold text-white/40 uppercase tracking-wider">Member sejak {{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                {{-- Update Profile --}}
                <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/10">
                            <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Informasi Profil</h3>
                            <p class="text-xs text-slate-500">Perbarui nama dan email akun Anda</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/10">
                            <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Ubah Password</h3>
                            <p class="text-xs text-slate-500">Pastikan password Anda aman dan kuat</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete Account --}}
                <div class="rounded-2xl border border-red-500/10 bg-[#161B29] p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/10">
                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-red-500">Hapus Akun</h3>
                            <p class="text-xs text-red-500/60">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
