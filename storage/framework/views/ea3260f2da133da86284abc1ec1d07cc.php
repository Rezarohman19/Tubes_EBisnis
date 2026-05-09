<?php $__env->startSection('content'); ?>
<div class="animate-fade-in-up">
    
    <section class="relative overflow-hidden bg-gradient-to-br from-[#0B0F1A] via-[#161B29] to-[#0B0F1A]">
        
        <div class="absolute inset-0">
            <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl animate-blob"></div>
            <div class="absolute -right-32 -bottom-32 h-96 w-96 rounded-full bg-violet-600/20 blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute left-1/2 top-1/2 h-64 w-64 -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-500/10 blur-3xl animate-blob animation-delay-4000"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wMykiLz48L3N2Zz4=')] opacity-60"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 md:py-24 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                
                <div>
                    <div class="mb-6 inline-flex items-center gap-2.5 rounded-full border border-blue-400/20 bg-blue-500/10 px-5 py-2 backdrop-blur-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-blue-400"></span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">🚚 Gratis Ongkir Min. Rp 150rb</span>
                    </div>

                    <h1 class="text-4xl font-black leading-[1.1] text-white md:text-5xl lg:text-6xl">
                        Frozen Food<br>
                        <span class="bg-gradient-to-r from-blue-400 via-indigo-400 to-violet-400 bg-clip-text text-transparent">Berkualitas</span> Tinggi
                    </h1>

                    <p class="mt-6 max-w-lg text-base leading-relaxed text-slate-400 md:text-lg">
                        Dikirim segar langsung ke pintu rumahmu. Pilihan lengkap dengan harga terbaik dan jaminan kualitas.
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="#products" class="btn-primary !px-8 !py-4 !text-sm">
                            Mulai Belanja
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-8 py-4 text-sm font-bold text-white backdrop-blur-sm transition-all hover:bg-white/10 hover:border-white/20">
                                Daftar Gratis
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-blue-500/10 to-violet-500/10 blur-2xl"></div>
                        <div class="relative grid grid-cols-2 gap-4">
                            <div class="glass-card-dark rounded-3xl p-6 transition-transform hover:-translate-y-1">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-500/20">
                                    <svg class="h-7 w-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <p class="mt-4 text-3xl font-black text-white"><?php echo e($products->count()); ?></p>
                                <p class="mt-1 text-sm font-medium text-slate-400">Total Produk</p>
                            </div>
                            <div class="glass-card-dark rounded-3xl p-6 transition-transform hover:-translate-y-1">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-500/20">
                                    <svg class="h-7 w-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <p class="mt-4 text-3xl font-black text-white">100%</p>
                                <p class="mt-1 text-sm font-medium text-slate-400">Fresh & Frozen</p>
                            </div>
                            <div class="glass-card-dark rounded-3xl p-6 transition-transform hover:-translate-y-1">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-500/20">
                                    <svg class="h-7 w-7 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <p class="mt-4 text-3xl font-black text-white">24h</p>
                                <p class="mt-1 text-sm font-medium text-slate-400">Fast Delivery</p>
                            </div>
                            <div class="glass-card-dark rounded-3xl p-6 transition-transform hover:-translate-y-1">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-500/20">
                                    <svg class="h-7 w-7 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                </div>
                                <p class="mt-4 text-3xl font-black text-white">⭐ 4.9</p>
                                <p class="mt-1 text-sm font-medium text-slate-400">Rating Toko</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 60L48 55C96 50 192 40 288 35C384 30 480 30 576 33.3C672 36.7 768 43.3 864 45C960 46.7 1056 43.3 1152 40C1248 36.7 1344 33.3 1392 31.7L1440 30V60H1392C1344 60 1248 60 1152 60C1056 60 960 60 864 60C768 60 672 60 576 60C480 60 384 60 288 60C192 60 96 60 48 60H0Z" fill="#0B0F1A"/>
            </svg>
        </div>
    </section>

    
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php if(session('success')): ?>
            <div class="mt-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p class="text-sm font-semibold text-emerald-800"><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>
        <?php if(session('info')): ?>
            <div class="mt-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-blue-200/60 bg-gradient-to-r from-blue-50 to-indigo-50 p-4 shadow-lg shadow-blue-500/5">
                <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-blue-100">
                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-sm font-semibold text-blue-800"><?php echo e(session('info')); ?></p>
            </div>
        <?php endif; ?>
    </div>

    
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <?php $__currentLoopData = [
                ['icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4', 'title' => 'Gratis Ongkir', 'desc' => 'Min. pembelian Rp 150.000', 'from' => 'from-blue-500', 'to' => 'to-indigo-500', 'bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
                ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Pengiriman Cepat', 'desc' => 'Same-day delivery tersedia', 'from' => 'from-violet-500', 'to' => 'to-purple-500', 'bg' => 'bg-violet-50', 'text' => 'text-violet-600'],
                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Produk Terjamin', 'desc' => '100% fresh & berkualitas', 'from' => 'from-emerald-500', 'to' => 'to-teal-500', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group flex items-center gap-4 rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-900/20">
                    <div class="flex h-14 w-14 flex-none items-center justify-center rounded-2xl <?php echo e($feat['bg']); ?> transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-7 w-7 <?php echo e($feat['text']); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($feat['icon']); ?>"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white"><?php echo e($feat['title']); ?></p>
                        <p class="mt-0.5 text-xs font-medium text-slate-500"><?php echo e($feat['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section id="products" class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
        
        <div class="mb-8 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h2 class="section-heading">🛒 Katalog Produk</h2>
                <p class="section-subheading"><?php echo e($products->count()); ?> produk tersedia untuk Anda</p>
            </div>

            <form method="GET" action="<?php echo e(route('dashboard')); ?>" class="flex flex-wrap items-center gap-2">
                <div class="relative flex-1 min-w-[180px]">
                    <svg class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari produk..." class="input-field !pl-10 !py-2.5 !rounded-xl !text-sm">
                </div>
                <select name="stock_filter" class="input-field !w-auto !py-2.5 !rounded-xl !text-sm">
                    <option value="">Semua Stok</option>
                    <option value="available" <?php echo e(request('stock_filter') === 'available' ? 'selected' : ''); ?>>Tersedia</option>
                    <option value="out" <?php echo e(request('stock_filter') === 'out' ? 'selected' : ''); ?>>Habis</option>
                </select>
                <select name="sort" class="input-field !w-auto !py-2.5 !rounded-xl !text-sm">
                    <option value="newest" <?php echo e(request('sort') === 'newest' ? 'selected' : ''); ?>>Terbaru</option>
                    <option value="price_asc" <?php echo e(request('sort') === 'price_asc' ? 'selected' : ''); ?>>Termurah</option>
                    <option value="price_desc" <?php echo e(request('sort') === 'price_desc' ? 'selected' : ''); ?>>Termahal</option>
                </select>
                <button type="submit" class="btn-primary !py-2.5 !px-5 !rounded-xl !text-xs">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <?php if(request()->hasAny(['search','stock_filter','sort'])): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn-ghost !py-2.5 !px-4 !rounded-xl !text-xs">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        
        <?php if($products->isEmpty()): ?>
            <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-white/5 bg-[#161B29] py-24 text-center">
                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A]">
                    <svg class="h-12 w-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-white">Produk tidak ditemukan</h3>
                <p class="mt-2 text-sm text-slate-500">Coba ubah kata kunci atau filter pencarian</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-card group">
                        
                        <?php if($product->price > 50000): ?>
                            <div class="absolute left-3 top-3 z-10">
                                <span class="badge-hot">🔥 HOT</span>
                            </div>
                        <?php endif; ?>
                        <div class="absolute right-3 top-3 z-10">
                            <?php if($product->stock > 10): ?>
                                <span class="badge-success">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Ready
                                </span>
                            <?php elseif($product->stock > 0): ?>
                                <span class="badge-warning">
                                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-500"></span> Terbatas
                                </span>
                            <?php else: ?>
                                <span class="badge-danger">Habis</span>
                            <?php endif; ?>
                        </div>

                        
                        <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <?php if($product->image): ?>
                                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <?php else: ?>
                                <div class="flex h-full flex-col items-center justify-center gap-3">
                                    <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-gray-100">
                                        <svg class="h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-400">No Image</span>
                                </div>
                            <?php endif; ?>

                            
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                <a href="<?php echo e(route('products.show', $product)); ?>" class="m-3 flex w-full items-center justify-center gap-2 rounded-2xl bg-white/95 py-3 text-sm font-bold text-gray-900 backdrop-blur transition-all hover:bg-white">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        
                        <div class="p-5">
                            <h4 class="text-sm font-bold text-white line-clamp-2 leading-snug"><?php echo e($product->name); ?></h4>
                            <p class="mt-2 text-xs text-slate-500 line-clamp-2 leading-relaxed"><?php echo e($product->description); ?></p>

                            <div class="mt-4 flex items-end justify-between">
                                <div>
                                    <p class="text-xl font-black text-white">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                    <p class="mt-0.5 text-xs font-medium text-slate-500">Stok: <?php echo e($product->stock); ?></p>
                                </div>
                            </div>

                            
                            <div class="mt-4">
                                <?php if($product->stock > 0): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="flex gap-2">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="w-16 flex-none rounded-xl border-0 bg-[#0B0F1A] px-2 py-2.5 text-center text-sm font-bold text-white ring-1 ring-white/10 focus:ring-2 focus:ring-blue-500" />
                                            <button type="submit" class="btn-primary flex-1 !py-2.5 !rounded-xl !text-xs !shadow-md">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                                Beli
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="btn-primary w-full !py-2.5 !rounded-xl !text-xs !shadow-md">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                            Login untuk Beli
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button disabled class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-100 py-2.5 text-xs font-bold text-gray-400 cursor-not-allowed">
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/dashboard.blade.php ENDPATH**/ ?>