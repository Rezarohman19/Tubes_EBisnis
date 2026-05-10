<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="description" content="Frozymart — Premium Frozen Food Store">

        <title><?php echo e(config('app.name', 'Frozymart')); ?> — Premium Frozen Food</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased bg-slate-900 text-slate-100">
        <div class="min-h-screen flex flex-col">
            
            <header class="sticky top-0 z-50 border-b border-slate-800/50 bg-slate-900/80 backdrop-blur-xl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        
                        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
<div class="relative flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-600 shadow-lg shadow-blue-500/25 transition-transform duration-300 group-hover:scale-110">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div>
<span class="text-lg font-bold tracking-tight text-white">Frozy<span class="text-[#2563EB]">mart</span></span>
                                <p class="hidden text-[8px] font-bold uppercase tracking-widest text-slate-400 sm:block">Frozen Food</p>
                            </div>
                        </a>

                        
                        <nav class="hidden items-center gap-1 md:flex">
<a href="<?php echo e(route('home')); ?>" class="rounded-lg px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('home') || request()->routeIs('dashboard') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-800'); ?> transition-all duration-200">
                                Beranda
                            </a>
<a href="<?php echo e(route('products.index')); ?>" class="rounded-lg px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('products.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-800'); ?> transition-all duration-200">
                                Katalog
                            </a>
                            <?php if(auth()->guard()->check()): ?>
<a href="<?php echo e(route('cart.index')); ?>" class="relative rounded-lg px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('cart.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-800'); ?> transition-all duration-200">
                                    Keranjang
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
<span class="absolute -right-0.5 -top-0.5 flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-[10px] font-bold text-white shadow-lg shadow-blue-500/30">
                                    <?php endif; ?>
                                </a>
<a href="<?php echo e(route('orders.index')); ?>" class="rounded-lg px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('orders.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-800'); ?> transition-all duration-200">
                                    Pesanan
                                </a>
                            <?php endif; ?>
                        </nav>

                        
                        <div class="flex items-center gap-3">
                            <?php if(auth()->guard()->check()): ?>
<a href="<?php echo e(route('cart.index')); ?>" class="relative flex h-10 w-10 items-center justify-center rounded-lg border border-slate-700 bg-slate-800 text-slate-400 transition-all hover:border-blue-500/50 hover:text-[#2563EB] md:hidden">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
<span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-[9px] font-bold text-white">
                                    <?php endif; ?>
                                </a>

                                
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" class="flex items-center gap-2 rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm font-semibold text-slate-300 transition-all hover:border-slate-600 hover:bg-slate-700 hover:text-white">
<div class="flex h-6 w-6 items-center justify-center rounded-md bg-gradient-to-br from-blue-500 to-indigo-500 text-[10px] font-bold text-white">
                                            <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                                        </div>
                                        <span class="hidden sm:inline"><?php echo e(Auth::user()->name); ?></span>
                                        <svg class="h-4 w-4 text-slate-500 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 -translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-56 origin-top-right rounded-xl border border-slate-700 bg-slate-800 shadow-2xl shadow-black/50" style="display: none;">

                                        <div class="px-4 py-3 border-b border-slate-700">
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Akun</p>
                                        </div>

                                        <?php if(Auth::user()->role === 'admin'): ?>
class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-[#2563EB] transition-all hover:bg-slate-700/50"
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                Admin Panel
                                            </a>
                                            <div class="border-t border-slate-700"></div>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-300 transition-all hover:bg-slate-700/50 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            Profil Saya
                                        </a>

                                        <a href="<?php echo e(route('payment.history')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-300 transition-all hover:bg-slate-700/50 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                            Riwayat Bayar
                                        </a>

                                        <div class="border-t border-slate-700"></div>

                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm font-medium text-red-400 transition-all hover:bg-red-500/10">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                                Keluar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="rounded-lg px-4 py-2 text-sm font-semibold text-slate-300 transition-all hover:text-white hover:bg-slate-800">Masuk</a>
<a href="<?php echo e(route('register')); ?>" class="rounded-lg bg-[#2563EB] px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">Daftar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>

            
            <main class="flex-1">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            
            <footer class="border-t border-slate-800/50 bg-slate-950 text-slate-400">
                <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div class="md:col-span-2">
                            <div class="flex items-center gap-3">
<div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-600">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
<span class="text-lg font-bold text-white">Frozy<span class="text-[#2563EB]">mart</span></span>
                                    <p class="text-[8px] font-bold uppercase tracking-widest text-slate-500">Premium Frozen Food</p>
                                </div>
                            </div>
                            <p class="mt-4 max-w-md text-sm leading-relaxed text-slate-400">Frozen food berkualitas tinggi dengan pengiriman cepat. Nikmati kemudahan berbelanja dan kualitas terjamin.</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-bold text-white uppercase tracking-wider">Menu</h4>
                            <ul class="mt-4 space-y-2">
<li><a href="<?php echo e(route('home')); ?>" class="transition hover:text-[#2563EB]">Beranda</a></li>
<li><a href="<?php echo e(route('products.index')); ?>" class="transition hover:text-[#2563EB]">Katalog</a></li>
<li><a href="<?php echo e(route('login')); ?>" class="transition hover:text-[#2563EB]">Masuk</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-sm font-bold text-white uppercase tracking-wider">Kontak</h4>
                            <ul class="mt-4 space-y-2 text-sm">
<a href="https://wa.me/62857-6851-0161" target="_blank" class="transition hover:text-[#2563EB]">WhatsApp: +62 857-6851-0161</a>
<a href="mailto:frozymart@gmail.com" class="transition hover:text-[#2563EB]">Email: frozymart@gmail.com</a>
                                <li class="pt-2 border-t border-slate-800">Senin - Sabtu, 08:00 - 18:00</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-slate-800 pt-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <p class="text-sm text-slate-500">© 2026 Frozymart. All rights reserved.</p>
                        <div class="flex gap-4">
<a href="https://www.instagram.com/frozy.mart?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="transition hover:text-[#2563EB]">Instagram</a>
<a href="https://www.tiktok.com/@frozy.mart?is_from_webapp=1&sender_device=pc" target="_blank" class="transition hover:text-[#2563EB]">TikTok</a>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>