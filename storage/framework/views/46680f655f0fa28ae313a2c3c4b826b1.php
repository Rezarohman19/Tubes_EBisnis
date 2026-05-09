<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frozymart — Premium Frozen Food</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-50">


<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-extrabold text-gray-900">Frozy<span class="text-blue-600">mart</span></span>
                    <p class="hidden text-[9px] font-medium uppercase tracking-widest text-gray-400 sm:block">Premium Frozen Food</p>
                </div>
            </a>

            
            <nav class="hidden items-center gap-1 md:flex">
                <a href="<?php echo e(route('home')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold text-blue-600 bg-blue-50">Beranda</a>
                <a href="<?php echo e(route('products.index')); ?>" class="rounded-xl px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-50">Katalog</a>
            </nav>

            
            <div class="flex items-center gap-3">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('cart.index')); ?>" class="relative flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 hover:bg-gray-50">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <?php if(session('cart') && count(session('cart')) > 0): ?>
                            <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600 text-[10px] font-bold text-white"><?php echo e(count(session('cart'))); ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="<?php echo e(route('dashboard')); ?>" class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-sm font-semibold text-white">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="rounded-xl border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-sm font-semibold text-white">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>


<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20 md:py-28">
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle at 20% 50%, #3b82f6 0%, transparent 50%), radial-gradient(circle at 80% 50%, #6366f1 0%, transparent 50%)"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-2">
                <span class="h-2 w-2 animate-pulse rounded-full bg-blue-400"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-400">Gratis Ongkir Min. Rp 150rb</span>
            </div>
            <h1 class="text-4xl font-extrabold leading-tight text-white md:text-5xl lg:text-6xl">
                Frozen Food<br>
                <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">Berkualitas Tinggi</span>
            </h1>
            <p class="mt-6 text-lg text-slate-400">Dikirim segar ke pintu rumahmu. Pilihan lengkap, harga terbaik.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="#products" class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 text-sm font-bold text-white shadow-xl shadow-blue-500/30 transition-all hover:scale-105">
                    Lihat Produk
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center gap-2 rounded-2xl border border-slate-600 bg-slate-800/50 px-8 py-4 text-sm font-bold text-white backdrop-blur transition-all hover:border-slate-500">
                        Daftar Gratis
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section id="products" class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    
    <?php if(session('success')): ?>
        <div class="mb-6 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
            <svg class="h-5 w-5 flex-none text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('info')): ?>
        <div class="mb-6 flex items-center gap-3 rounded-2xl border border-blue-200 bg-blue-50 p-4 text-blue-800">
            <svg class="h-5 w-5 flex-none text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>

    
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900">Katalog Produk</h2>
            <p class="mt-1 text-sm text-gray-500"><?php echo e($products->count()); ?> produk tersedia</p>
        </div>
        <form method="GET" action="<?php echo e(route('home')); ?>" class="flex flex-wrap gap-2">
            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                placeholder="Cari produk..."
                class="rounded-xl border-gray-300 px-4 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
            >
            <select name="stock_filter" class="rounded-xl border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Semua Stok</option>
                <option value="available" <?php echo e(request('stock_filter') === 'available' ? 'selected' : ''); ?>>Tersedia</option>
                <option value="out"       <?php echo e(request('stock_filter') === 'out'       ? 'selected' : ''); ?>>Habis</option>
            </select>
            <select name="sort" class="rounded-xl border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="newest"     <?php echo e(request('sort') === 'newest'     ? 'selected' : ''); ?>>Terbaru</option>
                <option value="price_asc"  <?php echo e(request('sort') === 'price_asc'  ? 'selected' : ''); ?>>Harga: Murah → Mahal</option>
                <option value="price_desc" <?php echo e(request('sort') === 'price_desc' ? 'selected' : ''); ?>>Harga: Mahal → Murah</option>
            </select>
            <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">Cari</button>
            <?php if(request()->hasAny(['search','stock_filter','sort'])): ?>
                <a href="<?php echo e(route('home')); ?>" class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-50">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    
    <?php if($products->isEmpty()): ?>
        <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-gray-200 bg-white py-20 text-center">
            <svg class="h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <h3 class="mt-4 text-lg font-bold text-gray-900">Produk tidak ditemukan</h3>
            <p class="mt-2 text-sm text-gray-500">Coba ubah kata kunci atau filter pencarian</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    
                    <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                        <?php if($product->image): ?>
                            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <?php else: ?>
                            <div class="flex h-full flex-col items-center justify-center gap-2">
                                <svg class="h-16 w-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-300">No Image</span>
                            </div>
                        <?php endif; ?>

                        
                        <div class="absolute right-3 top-3">
                            <?php if($product->stock > 10): ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-2.5 py-1 text-xs font-bold text-green-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span> Ready
                                </span>
                            <?php elseif($product->stock > 0): ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-2.5 py-1 text-xs font-bold text-yellow-700">
                                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-yellow-500"></span> Terbatas
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-bold text-red-600">
                                    Habis
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 line-clamp-2 leading-snug"><?php echo e($product->name); ?></h3>
                        <p class="mt-1 text-xs text-gray-500 line-clamp-2"><?php echo e($product->description); ?></p>
                        <div class="mt-3 flex items-end justify-between">
                            <div>
                                <p class="text-lg font-extrabold text-gray-900">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                <p class="text-xs text-gray-400">Stok: <?php echo e($product->stock); ?></p>
                            </div>
                        </div>

                        
                        <div class="mt-4">
                            <?php if($product->stock > 0): ?>
                                <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="flex gap-2">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>"
                                        class="w-16 rounded-xl border border-gray-200 px-2 py-2.5 text-center text-sm font-bold text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                                    <button type="submit" class="flex flex-1 items-center justify-center gap-1.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 py-2.5 text-sm font-bold text-white transition-all hover:shadow-lg hover:shadow-blue-500/30">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Beli
                                    </button>
                                </form>
                            <?php else: ?>
                                <button disabled class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-100 py-2.5 text-sm font-bold text-gray-400 cursor-not-allowed">
                                    Stok Habis
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</section>


<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <?php $__currentLoopData = [
            ['icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4', 'title' => 'Gratis Ongkir', 'desc' => 'Min. pembelian Rp 150.000', 'color' => 'blue'],
            ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Pengiriman Cepat', 'desc' => 'Same day delivery tersedia', 'color' => 'indigo'],
            ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Produk Terjamin', 'desc' => '100% fresh & berkualitas', 'color' => 'green'],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex h-12 w-12 flex-none items-center justify-center rounded-2xl bg-<?php echo e($feat['color']); ?>-50">
                <svg class="h-6 w-6 text-<?php echo e($feat['color']); ?>-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($feat['icon']); ?>"/>
                </svg>
            </div>
            <div>
                <p class="font-bold text-gray-900"><?php echo e($feat['title']); ?></p>
                <p class="text-xs text-gray-500"><?php echo e($feat['desc']); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>


<footer class="border-t border-gray-200 bg-white py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <span class="font-extrabold text-gray-900">Frozy<span class="text-blue-600">mart</span></span>
                    <p class="text-xs text-gray-400">Premium Frozen Food</p>
                </div>
            </div>
            <p class="text-sm text-gray-400">© <?php echo e(date('Y')); ?> Frozymart. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/home.blade.php ENDPATH**/ ?>