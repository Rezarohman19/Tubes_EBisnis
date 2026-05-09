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
    <body class="font-sans antialiased bg-[#0B0F1A]">
        <div class="min-h-screen flex flex-col">
            
            <header class="sticky top-0 z-50 border-b border-white/5 bg-[#0B0F1A]/80 backdrop-blur-2xl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        
                        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                            <div class="relative flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-600 shadow-lg shadow-blue-500/25 transition-transform duration-300 group-hover:scale-110">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 transition-opacity group-hover:opacity-100"></div>
                            </div>
                            <div>
                                <span class="text-lg font-black tracking-tight text-white">Frozy<span class="text-gradient">mart</span></span>
                                <p class="hidden text-[9px] font-bold uppercase tracking-[0.2em] text-slate-500 sm:block">Premium Frozen Food</p>
                            </div>
                        </a>

                        
                        <nav class="hidden items-center gap-1 md:flex">
                            <a href="<?php echo e(route('home')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('home') || request()->routeIs('dashboard') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?> transition-all duration-200">
                                Beranda
                            </a>
                            <a href="<?php echo e(route('products.index')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('products.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?> transition-all duration-200">
                                Katalog
                            </a>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('cart.index')); ?>" class="relative rounded-xl px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('cart.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?> transition-all duration-200">
                                    Keranjang
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
                                        <span class="absolute -right-0.5 -top-0.5 flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 text-[10px] font-black text-white shadow-lg shadow-rose-500/30"><?php echo e(count(session('cart'))); ?></span>
                                    <?php endif; ?>
                                </a>
                                <a href="<?php echo e(route('orders.index')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold <?php echo e(request()->routeIs('orders.*') ? 'text-[#2563EB] bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?> transition-all duration-200">
                                    Pesanan
                                </a>
                            <?php endif; ?>
                        </nav>

                        
                        <div class="flex items-center gap-3">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('cart.index')); ?>" class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-400 transition-all hover:border-white/20 hover:text-white hover:bg-white/10 md:hidden">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
                                        <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 text-[9px] font-black text-white"><?php echo e(count(session('cart'))); ?></span>
                                    <?php endif; ?>
                                </a>

                                
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-sm font-semibold text-white transition-all hover:border-white/20 hover:bg-white/10">
                                        <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-500 text-[10px] font-black text-white">
                                            <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                                        </div>
                                        <span class="hidden sm:inline"><?php echo e(Auth::user()->name); ?></span>
                                        <svg class="h-4 w-4 text-gray-400 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 -translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-56 origin-top-right rounded-2xl border border-white/10 bg-[#161B29] p-2 shadow-2xl" style="display: none;">

                                        <div class="px-3 py-2 mb-1">
                                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Akun</p>
                                        </div>

                                        <?php if(Auth::user()->role === 'admin'): ?>
                                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-indigo-600 transition-all hover:bg-indigo-50">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                Admin Panel
                                            </a>
                                            <div class="my-1 border-t border-gray-100"></div>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-300 transition-all hover:bg-white/5 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            Profil Saya
                                        </a>

                                        <a href="<?php echo e(route('payment.history')); ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-300 transition-all hover:bg-white/5 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                            Riwayat Bayar
                                        </a>

                                        <div class="my-1 border-t border-white/5"></div>

                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-red-600 transition-all hover:bg-red-50">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                                Keluar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-400 transition-all hover:text-white hover:bg-white/5">Masuk</a>
                                <a href="<?php echo e(route('register')); ?>" class="btn-primary !py-2 !px-5 !text-xs !rounded-xl">Daftar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>

            
            <main class="flex-1">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            
            <footer class="border-t border-white/5 bg-[#0B0F1A]">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div class="md:col-span-2">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-lg font-black text-white">Frozy<span class="text-gradient">mart</span></span>
                                    <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-500">Premium Frozen Food</p>
                                </div>
                            </div>
                            <p class="mt-4 max-w-md text-sm leading-relaxed text-gray-500">Frozen food berkualitas tinggi dengan pengiriman cepat. Kami berkomitmen menyajikan produk segar dan terjamin ke pintu rumah Anda.</p>
                        </div>

                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400">Navigasi</h4>
                            <div class="mt-4 flex flex-col gap-2.5">
                                <a href="<?php echo e(route('home')); ?>" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">Beranda</a>
                                <a href="<?php echo e(route('products.index')); ?>" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">Katalog</a>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400">Informasi</h4>
                            <div class="mt-4 flex flex-col gap-2.5">
                                <span class="text-sm font-medium text-gray-600">Gratis Ongkir Min. Rp150rb</span>
                                <span class="text-sm font-medium text-gray-600">Same-day Delivery</span>
                                <span class="text-sm font-medium text-gray-600">100% Fresh & Frozen</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-white/5 pt-8 md:flex-row">
                        <p class="text-xs font-medium text-slate-500">© <?php echo e(date('Y')); ?> Frozymart. All rights reserved.</p>
                        <div class="flex items-center gap-4">
                            <span class="text-xs font-medium text-slate-500">Made with ❤️ in Indonesia</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>