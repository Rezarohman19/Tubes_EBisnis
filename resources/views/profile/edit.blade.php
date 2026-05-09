<x-app-layout>
    <div class="py-8 animate-fade-in-up bg-slate-900/80">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="mb-8 rounded-[2rem] border border-white/10 bg-slate-900/95 p-8 shadow-2xl shadow-slate-950/20 backdrop-blur-xl">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-300/80">Pengaturan Akun</p>
                        <h1 class="mt-2 text-4xl font-black tracking-tight text-white">Profil Saya</h1>
                    </div>
                    <a href="{{ route('dashboard') }}" class="btn-secondary">Dashboard</a>
                </div>
            </div>

            <div x-data="{ toastText: {{ json_encode(session('status') === 'profile-updated' ? 'Perubahan profil berhasil disimpan' : (session('status') === 'verification-link-sent' ? 'Email verifikasi telah dikirim' : '')) }}, showToast: false }"
                 x-init="if (toastText) { showToast = true; setTimeout(() => showToast = false, 3800) }"
                 class="relative">
                <div x-show="showToast" x-transition.duration.300ms x-cloak class="pointer-events-none absolute right-0 top-0 z-50 mt-2 w-full sm:w-auto">
                    <div class="max-w-sm rounded-[1.75rem] border border-white/10 bg-slate-950/95 p-4 shadow-2xl shadow-slate-950/40 backdrop-blur-xl ring-1 ring-white/10">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-indigo-300">Notifikasi</p>
                        <p class="mt-2 text-sm text-slate-300" x-text="toastText"></p>
                    </div>
                </div>

                <div class="mx-auto max-w-5xl space-y-6">
                    <div class="glass-card overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/90 p-8 shadow-2xl shadow-slate-950/20">
                        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                            <div class="flex items-start gap-4">
                                <div class="flex h-20 w-20 items-center justify-center rounded-[1.75rem] bg-white/10 text-4xl font-black text-white ring-1 ring-white/10">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-300/70">Profil Saya</p>
                                    <h2 class="mt-2 text-3xl font-black text-white">{{ Auth::user()->name }}</h2>
                                    <p class="mt-1 text-sm text-slate-400">{{ Auth::user()->email }}</p>
                                    <p class="mt-3 text-xs uppercase tracking-[0.25em] text-slate-500">Member sejak {{ Auth::user()->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ route('dashboard') }}" class="btn-secondary">Dashboard</a>
                        </div>
                    </div>

                    <div class="glass-card border border-white/10 bg-slate-900/90 p-6 sm:p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-500/10 text-blue-300 ring-1 ring-blue-500/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Informasi Profil</h3>
                                <p class="text-sm text-slate-400">Perbarui nama dan email Anda dengan pengalaman yang halus.</p>
                            </div>
                        </div>
                        <div class="max-w-full">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="glass-card border border-white/10 bg-slate-900/90 p-6 sm:p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-500/10 text-amber-300 ring-1 ring-amber-500/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Ubah Password</h3>
                                <p class="text-sm text-slate-400">Memperkuat keamanan akun Anda dengan password baru.</p>
                            </div>
                        </div>
                        <div class="max-w-full">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="glass-card border border-red-500/10 bg-slate-900/90 p-6 sm:p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-500/10 text-red-300 ring-1 ring-red-500/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-red-400">Hapus Akun</h3>
                                <p class="text-sm text-red-300">Langkah terakhir jika Anda ingin menghapus akun.</p>
                            </div>
                        </div>
                        <div class="max-w-full">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
