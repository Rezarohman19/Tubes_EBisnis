<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <nav class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-gray-900 tracking-tight">Frozy<span class="text-blue-600">mart</span></h1>
                    <p class="text-[10px] font-medium uppercase tracking-widest text-gray-400">Premium Frozen Food</p>
                </div>
            </div>
            <div class="hidden items-center gap-1 md:flex">
                <a href="<?php echo e(route('dashboard')); ?>" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="<?php echo e(route('products.index')); ?>" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Katalog
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="<?php echo e(route('cart.index')); ?>" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Keranjang
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="<?php echo e(route('orders.index')); ?>" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Pesanan
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="<?php echo e(route('payment.history')); ?>" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Pembayaran
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
            </div>
            <button class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 md:hidden">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </nav>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <?php if(session('success')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-green-200/80 bg-gradient-to-r from-green-50 to-emerald-50 p-4 shadow-lg shadow-green-500/10">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">
                        <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="flex-1 text-sm font-semibold text-green-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>

            
            <div class="relative mb-8 overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-8 md:p-12">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMtOS45NCAwLTE4IDguMDYtMTggMzhzOC4wNiAzOCAxOCAzOCAxOC04LjA2IDE4LTM4LTguMDYtMzgtMTgtMzh6bTAgMGMtMTEuMTIgMC0yMCA4Ljg4LTIwIDIwcTguODggMjAgMjAgMjAgMjAtOC44OCAyMC0yMC04Ljg4LTIwLTIwLTIwem0zNiAwYzExLjEyIDAgMjAtOC44OCAyMC0yMC04Ljg4LTIwLTIwLTIwLTIwIDguODgtMjAgMjAtOC44OCAyMC0yMCAyMHoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvZz48L3N2Zz4=')] opacity-50"></div>
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>
                <div class="absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
                
                <div class="relative z-10 flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
                    <div class="max-w-xl">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-1.5">
                            <span class="h-2 w-2 animate-pulse rounded-full bg-blue-500"></span>
                            <span class="text-xs font-bold uppercase tracking-wider text-blue-400">Free Shopping Min. Rp 150rb</span>
                        </div>
                        <h2 class="text-4xl font-extrabold leading-tight text-white md:text-5xl">
                            Belanja <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">Frozen Food</span><br>
                            Lebih Mudah!
                        </h2>
                        <p class="mt-4 text-base text-slate-400">Koleksi lengkap makanan beku berkualitas tinggi dengan harga terbaik. Dikirim segar ke pintu rumah Anda.</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#products" class="group inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3.5 text-sm font-bold text-white shadow-xl shadow-blue-500/30 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/40">
                                Mulai Belanja
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            <a href="<?php echo e(route('orders.index')); ?>" class="inline-flex items-center gap-2 rounded-2xl border border-slate-600 bg-slate-800/50 px-6 py-3.5 text-sm font-bold text-white backdrop-blur transition-all hover:border-slate-500 hover:bg-slate-800">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Lihat Pesanan
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="relative">
                            <div class="absolute -left-6 -top-6 h-32 w-32 rounded-2xl bg-gradient-to-br from-blue-400 to-indigo-400 blur-2xl opacity-50"></div>
                            <div class="relative grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-slate-800/80 p-4 backdrop-blur-sm">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/20">
                                        <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <p class="mt-3 text-2xl font-extrabold text-white"><?php echo e($products->count()); ?></p>
                                    <p class="text-xs font-medium text-slate-400">Produk</p>
                                </div>
                                <div class="rounded-2xl bg-slate-800/80 p-4 backdrop-blur-sm">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500/20">
                                        <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <p class="mt-3 text-2xl font-extrabold text-white">%</p>
                                    <p class="text-xs font-medium text-slate-400">Promo Aktif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="mb-8 grid grid-cols-2 gap-4 lg:hidden">
                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50">
                        <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <p class="mt-2 text-xl font-extrabold text-gray-900"><?php echo e($products->count()); ?></p>
                    <p class="text-xs font-medium text-gray-500">Produk Tersedia</p>
                </div>
                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50">
                        <svg class="h-5 w-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="mt-2 text-xl font-extrabold text-gray-900">0</p>
                    <p class="text-xs font-medium text-gray-500">Promo Berjalan</p>
                </div>
            </div>

            
            <div id="products" class="mb-6 flex items-end justify-between">
                <div>
                    <h3 class="text-2xl font-extrabold text-gray-900">Katalog Produk</h3>
                    <p class="mt-1 text-sm font-medium text-gray-500"><?php echo e($products->count()); ?> produk tersedia hari ini</p>
                </div>
                <div class="hidden items-center gap-2 sm:flex">
                    <button class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-bold text-gray-700 shadow-sm">Semua</button>
                    <button class="rounded-xl px-4 py-2 text-sm font-bold text-gray-500 hover:bg-gray-50">Terbaru</button>
                    <button class="rounded-xl px-4 py-2 text-sm font-bold text-gray-500 hover:bg-gray-50">Terlaris</button>
                </div>
            </div>

            
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group relative overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        
                        <?php if($product->price > 50000): ?>
                            <div class="absolute left-3 top-3 z-10">
                                <span class="inline-flex items-center rounded-xl bg-red-500 px-2.5 py-1 text-xs font-bold text-white">
                                    HOT
                                </span>
                            </div>
                        <?php endif; ?>

                        
                        <div class="absolute right-3 top-3 z-10">
                            <?php if($product->stock > 10): ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-2.5 py-1 text-xs font-bold text-green-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    Ready
                                </span>
                            <?php elseif($product->stock > 0): ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-2.5 py-1 text-xs font-bold text-yellow-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                                    Terbatas
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-1 text-xs font-bold text-gray-500">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                    Sold Out
                                </span>
                            <?php endif; ?>
                        </div>

                        
                        <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <?php if($product->image): ?>
                                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                            <?php else: ?>
                                <div class="flex h-full flex-col items-center justify-center gap-2">
                                    <svg class="h-20 w-20 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-xs font-medium text-gray-300">No Image</span>
                                </div>
                            <?php endif; ?>
                            
                            
                            <div class="absolute inset-x-0 bottom-0 translate-y-full bg-gradient-to-t from-black/60 to-transparent p-4 transition-transform duration-300 group-hover:translate-y-0">
                                <a href="<?php echo e(route('products.show', $product)); ?>" class="flex w-full items-center justify-center gap-2 rounded-xl bg-white/90 py-2.5 text-sm font-bold text-gray-900 backdrop-blur-sm hover:bg-white">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Quick View
                                </a>
                            </div>
                        </div>

                        
                        <div class="p-4">
                            <h4 class="text-base font-extrabold text-gray-900 line-clamp-2 leading-tight"><?php echo e($product->name); ?></h4>
                            <p class="mt-1.5 text-xs font-medium text-gray-500 line-clamp-2 leading-relaxed"><?php echo e($product->description); ?></p>
                            
                            <div class="mt-4 flex items-end justify-between">
                                <div>
                                    <span class="text-xl font-extrabold text-gray-900">Rp <?php echo e(number_format($product->price,0,',','.')); ?></span>
                                    <p class="text-xs font-medium text-gray-400">Stok: <?php echo e($product->stock); ?></p>
                                </div>
                            </div>

                            
                            <div class="mt-4">
                                <?php if($product->stock > 0): ?>
                                    <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="flex gap-2">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="w-16 flex-none rounded-xl border border-gray-200 px-2 py-2.5 text-center text-sm font-bold text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200" />
                                        <button type="submit" class="flex-1 flex items-center justify-center gap-1.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 py-2.5 text-sm font-bold text-white shadow-md transition-all hover:shadow-lg hover:shadow-blue-500/30">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                            Add
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <button disabled class="w-full flex items-center justify-center gap-2 rounded-xl bg-gray-100 py-2.5 text-sm font-bold text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 18.364m0 0L12 21m0 0l-7.364 7.364M12 21v-7.364"/>
                                        </svg>
                                        Stok Habis
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full">
                        <div class="flex flex-col items-center justify-center rounded-3xl border border-gray-100 bg-white py-20 text-center">
                            <div class="mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-gray-50 to-gray-100">
                                <svg class="h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-extrabold text-gray-900">Belum Ada Produk</h4>
                            <p class="mt-2 max-w-sm text-sm font-medium text-gray-500">Saat ini katalog produk masih kosong. Silakan tambah produk terlebih dahulu.</p>
                            <button class="mt-6 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/30">
                                Tambah Produk
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex h-14 w-14 flex-none items-center justify-center rounded-2xl bg-blue-50">
                        <svg class="h-7 w-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-gray-900">Gratis Ongkir</p>
                        <p class="text-xs font-medium text-gray-500">Min. pembelian Rp 150rb</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex h-14 w-14 flex-none items-center justify-center rounded-2xl bg-indigo-50">
                        <svg class="h-7 w-7 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-gray-900">Pengiriman Cepat</p>
                        <p class="text-xs font-medium text-gray-500">Same day delivery</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex h-14 w-14 flex-none items-center justify-center rounded-2xl bg-green-50">
                        <svg class="h-7 w-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-gray-900">Produk Berkualitas</p>
                        <p class="text-xs font-medium text-gray-500">100% fresh & frozen</p>
                    </div>
                </div>
            </div>

            
            <div class="mt-12 border-t border-gray-100 pt-8">
                <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-extrabold text-gray-900">Frozymart</span>
                            <p class="text-xs font-medium text-gray-400">Premium Frozen Food</p>
                        </div>
                    </div>
                    <p class="text-sm font-medium text-gray-400">© 2026 Frozymart. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down {
            animation: slide-down 0.3s ease-out;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/dashboard.blade.php ENDPATH**/ ?>