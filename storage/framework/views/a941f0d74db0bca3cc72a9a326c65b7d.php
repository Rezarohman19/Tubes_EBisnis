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
            
            <header class="sticky top-0 z-50 border-b border-white/5 bg-[#0B0F1A]/85 shadow-xl shadow-black/30 backdrop-blur-2xl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between gap-8">
                        
                        <a href="<?php echo e(route('home')); ?>" class="group flex items-center gap-3 flex-shrink-0">
                            <div class="relative flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 via-indigo-500 to-violet-500 shadow-lg shadow-blue-500/30 transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="hidden sm:block">
                                <span class="text-xl font-black tracking-tight text-white">Frozy<span class="bg-gradient-to-r from-blue-400 to-violet-400 bg-clip-text text-transparent">mart</span></span>
                                <p class="text-[7px] font-bold uppercase tracking-[0.24em] text-slate-500">Premium Frozen Food</p>
                            </div>
                        </a>

                        
                        <nav class="hidden items-center gap-2 lg:flex">
                            <a href="<?php echo e(route('home')); ?>" class="rounded-xl px-4 py-2.5 text-sm font-semibold transition-all duration-200 <?php echo e(request()->routeIs('home') || request()->routeIs('dashboard') ? 'text-white bg-gradient-to-r from-blue-500/20 to-indigo-500/20 border border-blue-400/30' : 'text-slate-300 hover:text-white hover:bg-white/5'); ?>">
                                Beranda
                            </a>
                            <a href="<?php echo e(route('products.index')); ?>" class="rounded-xl px-4 py-2.5 text-sm font-semibold transition-all duration-200 <?php echo e(request()->routeIs('products.*') ? 'text-white bg-gradient-to-r from-blue-500/20 to-indigo-500/20 border border-blue-400/30' : 'text-slate-300 hover:text-white hover:bg-white/5'); ?>">
                                Katalog
                            </a>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('cart.index')); ?>" class="relative rounded-xl px-4 py-2.5 text-sm font-semibold transition-all duration-200 <?php echo e(request()->routeIs('cart.*') ? 'text-white bg-gradient-to-r from-blue-500/20 to-indigo-500/20 border border-blue-400/30' : 'text-slate-300 hover:text-white hover:bg-white/5'); ?>">
                                    Keranjang
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
                                        <span class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 text-[9px] font-bold text-white shadow-lg shadow-blue-500/40"><?php echo e(count(session('cart'))); ?></span>
                                    <?php endif; ?>
                                </a>
                                <a href="<?php echo e(route('orders.index')); ?>" class="rounded-xl px-4 py-2.5 text-sm font-semibold transition-all duration-200 <?php echo e(request()->routeIs('orders.*') ? 'text-white bg-gradient-to-r from-blue-500/20 to-indigo-500/20 border border-blue-400/30' : 'text-slate-300 hover:text-white hover:bg-white/5'); ?>">
                                    Pesanan
                                </a>
                            <?php endif; ?>
                        </nav>

                        
                        <div class="flex items-center gap-4 ml-auto">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('cart.index')); ?>" class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-400 transition-all hover:border-blue-400/50 hover:text-blue-300 hover:bg-blue-500/10 lg:hidden">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
                                        <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 text-[8px] font-bold text-white"><?php echo e(count(session('cart'))); ?></span>
                                    <?php endif; ?>
                                </a>

                                
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" class="flex items-center gap-2.5 rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-sm font-semibold text-slate-300 transition-all duration-200 hover:border-blue-400/30 hover:bg-blue-500/10 hover:text-white">
                                        <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-500 text-[9px] font-bold text-white">
                                            <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                                        </div>
                                        <span class="hidden sm:inline"><?php echo e(Auth::user()->name); ?></span>
                                        <svg class="h-4 w-4 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 -translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-3 w-64 origin-top-right rounded-xl border border-white/10 bg-gradient-to-br from-slate-800/95 to-slate-900/95 shadow-2xl shadow-black/50 backdrop-blur-md" style="display: none;">

                                        <div class="px-5 py-4 border-b border-white/5">
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.24em]">Menu Akun</p>
                                        </div>

                                        <?php if(Auth::user()->role === 'admin'): ?>
                                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-semibold text-blue-300 transition-all hover:bg-blue-500/10 border-b border-white/5">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                Admin Panel
                                            </a>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-semibold text-slate-300 transition-all hover:bg-white/5 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            Profil Saya
                                        </a>

                                        <a href="<?php echo e(route('payment.history')); ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-semibold text-slate-300 transition-all hover:bg-white/5 hover:text-white">
                                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                            Riwayat Bayar
                                        </a>

                                        <div class="border-t border-white/5"></div>

                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="flex w-full items-center gap-3 px-5 py-3 text-sm font-semibold text-red-400 transition-all hover:bg-red-500/10 hover:text-red-300">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                                Keluar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-300 transition-all hover:text-white hover:bg-white/5">Masuk</a>
                                <a href="<?php echo e(route('register')); ?>" class="rounded-xl bg-gradient-to-r from-blue-500 to-indigo-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition-all hover:scale-105 hover:shadow-blue-500/30">Daftar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>

            
            <main class="flex-1">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            
            <footer class="border-t border-white/5 bg-gradient-to-b from-[#0B0F1A] via-[#050916] to-black text-slate-300">
                <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                    
                    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-5">
                        
                        <div class="space-y-5 lg:col-span-2">
                            <div class="inline-flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 via-indigo-500 to-violet-500 shadow-lg shadow-blue-500/20 transition-all duration-300 group-hover:shadow-blue-500/40">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-black text-white">Frozy<span class="bg-gradient-to-r from-blue-400 to-violet-400 bg-clip-text text-transparent">mart</span></h3>
                                    <p class="text-[11px] font-bold uppercase tracking-[0.24em] text-slate-500">Premium Frozen</p>
                                </div>
                            </div>
                            <p class="max-w-xs text-sm leading-relaxed text-slate-400">Koleksi frozen food premium dengan kualitas terbaik, pengiriman cepat, dan harga kompetitif untuk keluarga Indonesia.</p>
                            
                            
                            <div class="flex gap-2.5 pt-3">
                                <a href="https://www.instagram.com/frozy.mart" target="_blank" rel="noopener noreferrer" class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-white/5 to-white/[0.02] text-slate-400 shadow-sm shadow-white/5 transition-all duration-300 hover:-translate-y-1 hover:border-pink-400/50 hover:bg-pink-500/10 hover:text-pink-300 hover:shadow-lg hover:shadow-pink-500/20">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5A4.25 4.25 0 0020.5 16.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm8.75 2.75a.75.75 0 110 1.5.75.75 0 010-1.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/></svg>
                                </a>
                                <a href="https://www.facebook.com/frozymart" target="_blank" rel="noopener noreferrer" class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-white/5 to-white/[0.02] text-slate-400 shadow-sm shadow-white/5 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400/50 hover:bg-blue-500/10 hover:text-blue-300 hover:shadow-lg hover:shadow-blue-500/20">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="https://wa.me/62857-6851-0161" target="_blank" rel="noopener noreferrer" class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-white/5 to-white/[0.02] text-slate-400 shadow-sm shadow-white/5 transition-all duration-300 hover:-translate-y-1 hover:border-green-400/50 hover:bg-green-500/10 hover:text-green-300 hover:shadow-lg hover:shadow-green-500/20">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.47 4.8C15.64 3 13.24 2 10.5 2 5.82 2 2 5.82 2 10.5c0 1.87.59 3.6 1.58 5.05L2 22l6.93-2.22A8.5 8.5 0 0010.5 21c4.68 0 8.5-3.82 8.5-8.5 0-2.73-1-5.14-2.83-7.07zM10.5 19.5c-1.46 0-2.89-.38-4.12-1.08l-.3-.17-3.1 1 1-3.08-.2-.31A6.5 6.5 0 1110.5 19.5zm3.57-4.88c-.2-.1-1.17-.57-1.35-.64-.18-.07-.31-.1-.44.1-.13.2-.5.64-.61.77-.11.13-.22.15-.42.05-.2-.1-.84-.31-1.6-.99-.59-.53-1-1.18-1.1-1.38-.13-.2-.01-.31.1-.41.1-.09.2-.23.3-.34.1-.1.13-.18.2-.3.06-.13.03-.24-.03-.34-.07-.1-.44-1.06-.6-1.45-.16-.38-.32-.33-.44-.33-.11 0-.24-.01-.37-.01-.13 0-.33.1-.5.48-.18.38-.68 1.3-.68 3.17 0 1.86 1.1 3.68 1.25 3.94.15.25 2.1 3.21 5.09 4.5 1.49.64 2.65.81 3.58.67 1.09-.16 2.13-1.1 2.65-2.15.25-.52.4-1.14.44-1.78.03-.64-.03-1.16-.3-1.45-.27-.29-.75-.47-1.55-.66z"/></svg>
                                </a>
                                <a href="https://www.tiktok.com/@frozy.mart" target="_blank" rel="noopener noreferrer" class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-white/5 to-white/[0.02] text-slate-400 shadow-sm shadow-white/5 transition-all duration-300 hover:-translate-y-1 hover:border-slate-300/50 hover:bg-white/10 hover:text-white hover:shadow-lg hover:shadow-white/10">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25A4.85 4.85 0 0 0 12 2a4.88 4.88 0 0 0-4.82 5.5A4.9 4.9 0 0 1 5 12a4.9 4.9 0 0 0 2.18 4.05A4.82 4.82 0 0 1 8 20.5a4.88 4.88 0 0 0 4 2 4.86 4.86 0 0 0 4.82-5.5c.125.936.84 1.875 1.77 2.25.14.08.3.125.47.1a4.88 4.88 0 0 0 4.05-4.9v-.5a4.9 4.9 0 0 1-8.05-4.55z"/></svg>
                                </a>
                            </div>
                        </div>

                        
                        <div class="space-y-5">
                            <h4 class="text-xs font-bold uppercase tracking-[0.24em] text-white">Navigasi</h4>
                            <ul class="space-y-3">
                                <li><a href="<?php echo e(route('home')); ?>" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 opacity-0 transition-opacity group-hover:opacity-100"></span>
                                    Beranda
                                </a></li>
                                <li><a href="<?php echo e(route('products.index')); ?>" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 opacity-0"></span>
                                    Katalog Produk
                                </a></li>
                                <li><a href="<?php echo e(route('home')); ?>#features" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 opacity-0"></span>
                                    Keunggulan
                                </a></li>
                                <li><a href="<?php echo e(route('home')); ?>#contact" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 opacity-0"></span>
                                    Hubungi Kami
                                </a></li>
                            </ul>
                        </div>

                        
                        <div class="space-y-5">
                            <h4 class="text-xs font-bold uppercase tracking-[0.24em] text-white">Hubungi</h4>
                            <ul class="space-y-3.5">
                                <li>
                                    <a href="https://wa.me/62857-6851-0161" target="_blank" rel="noopener noreferrer" class="flex items-start gap-2.5 text-sm transition-all duration-200 group">
                                        <div class="mt-0.5 flex h-5 w-5 items-center justify-center rounded-lg border border-white/10 bg-gradient-to-br from-green-500/20 to-emerald-500/10 text-green-300 transition-all duration-300 group-hover:border-green-400/40 group-hover:bg-green-500/20 group-hover:shadow-lg group-hover:shadow-green-500/20">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.98C18.44 1.9 15.3 0 12 0 5.82 0 0.76 5.06 0.76 11.24c0 2 0.64 3.86 1.7 5.42L0 24l6.62-2.12A11.24 11.24 0 0012 22.5c6.18 0 11.24-5.06 11.24-11.24 0-3.01-1.33-5.73-3.72-7.28zm-8.52 21.26c-1.56 0-3.09-.41-4.42-.92l-.32-.17-3.33.85.85-3.33-.17-.32c-1.36-2.27-2.15-4.92-2.15-7.68 0-8.07 6.57-14.64 14.64-14.64 3.87 0 7.52 1.75 10 4.51 2.48 2.75 3.84 6.4 3.84 10.13 0 8.07-6.57 14.64-14.64 14.64z"/></svg>
                                        </div>
                                        <div class="text-slate-400 transition-all group-hover:text-green-300">
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">WhatsApp</p>
                                            <p class="mt-0.5 text-sm">+62 857-6851-0161</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:frozymart@gmail.com" class="flex items-start gap-2.5 text-sm transition-all duration-200 group">
                                        <div class="mt-0.5 flex h-5 w-5 items-center justify-center rounded-lg border border-white/10 bg-gradient-to-br from-blue-500/20 to-indigo-500/10 text-blue-300 transition-all duration-300 group-hover:border-blue-400/40 group-hover:bg-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/20">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" stroke="currentColor" stroke-width="2" fill="none"/><path d="M2 6l10 7 10-7" stroke="currentColor" stroke-width="1.5"/></svg>
                                        </div>
                                        <div class="text-slate-400 transition-all group-hover:text-blue-300">
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Email</p>
                                            <p class="mt-0.5 text-sm">frozymart@gmail.com</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-start gap-2.5 text-sm">
                                        <div class="mt-0.5 flex h-5 w-5 items-center justify-center rounded-lg border border-white/10 bg-gradient-to-br from-amber-500/20 to-orange-500/10 text-amber-300">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="1" fill="currentColor"/><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm0 1.5a8.5 8.5 0 100 17 8.5 8.5 0 000-17z" stroke="currentColor" stroke-width="0.5" fill="none"/><path d="M12 6v6l4 2.4" stroke="currentColor" stroke-width="1.2"/></svg>
                                        </div>
                                        <div class="text-slate-400">
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Jam Operasional</p>
                                            <p class="mt-0.5 text-sm">Senin - Sabtu</p>
                                            <p class="text-sm">08:00 - 18:00 WIB</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        
                        <div class="space-y-5">
                            <h4 class="text-xs font-bold uppercase tracking-[0.24em] text-white">Informasi</h4>
                            <ul class="space-y-3">
                                <li><a href="#" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-violet-400 to-purple-400 opacity-0"></span>
                                    Kebijakan Privasi
                                </a></li>
                                <li><a href="#" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-violet-400 to-purple-400 opacity-0"></span>
                                    Syarat & Ketentuan
                                </a></li>
                                <li><a href="#" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-violet-400 to-purple-400 opacity-0"></span>
                                    Kebijakan Pengembalian
                                </a></li>
                                <li><a href="#" class="text-sm text-slate-400 transition-all duration-200 hover:text-white hover:translate-x-0.5 inline-flex items-center gap-1.5">
                                    <span class="h-1 w-1 rounded-full bg-gradient-to-r from-violet-400 to-purple-400 opacity-0"></span>
                                    FAQ
                                </a></li>
                            </ul>
                        </div>
                    </div>

                    
                    <div class="my-10 border-t border-gradient-to-r from-white/0 via-white/10 to-white/0"></div>

                    
                    <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                        <p class="text-sm text-slate-400">© 2026 <span class="font-semibold text-white">Frozymart</span>. Semua hak dilindungi.</p>
                        <p class="text-xs text-slate-500">Dibuat dengan <span class="bg-gradient-to-r from-red-400 to-pink-400 bg-clip-text text-transparent inline-block font-semibold">❤️ Passion</span> untuk keluarga Indonesia</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\userl\Desktop\Tubes_EBisnis\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>