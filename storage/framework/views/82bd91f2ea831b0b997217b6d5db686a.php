

<?php $__env->startSection('content'); ?>
<div class="bg-[#0B0F1A]">
    
    <section class="relative overflow-hidden bg-gradient-to-br from-[#0B0F1A] via-[#161B29] to-[#0B0F1A]">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute -left-20 top-10 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
            <div class="absolute -right-20 bottom-20 h-80 w-80 rounded-full bg-indigo-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-3 rounded-full bg-blue-500/10 px-4 py-2 ring-1 ring-blue-500/30">
                        <span class="rounded-full bg-[#2563EB] px-3 py-1 text-xs font-bold uppercase tracking-wider text-white">Promo Terbatas</span>
                        <p class="text-sm font-semibold text-blue-200">Diskon 10% untuk pembelian pertama Anda</p>
                    </div>

                    <div class="space-y-6">
                        <h1 class="text-5xl font-bold tracking-tight text-white sm:text-6xl lg:text-7xl leading-tight">Frozen Food Segar untuk Keluarga Anda</h1>
                        <p class="text-lg leading-relaxed text-slate-300">Temukan nugget, sosis, bakso, dan produk beku pilihan dengan kualitas premium, pengiriman cepat, dan harga terjangkau.</p>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row">
                        <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 px-8 py-4 font-semibold text-white shadow-lg shadow-blue-500/20 hover:shadow-xl transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-400/40">
                            Belanja Sekarang
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </a>
                    </div>

                    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="rounded-2xl border border-slate-700 bg-slate-800/50 p-4 backdrop-blur-sm">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                            <div class="relative flex-1">
                                <label for="home-search" class="sr-only">Cari produk</label>
                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </span>
                                <input id="home-search" type="text" name="search" placeholder="Cari nugget, sosis, bakso..." class="w-full rounded-lg border border-slate-600 bg-slate-700 px-12 py-3 text-sm text-white placeholder-slate-400 transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <button type="submit" class="rounded-lg bg-[#2563EB] px-6 py-3 font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-slate-800 to-slate-900 p-4 ring-1 ring-slate-700/50">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(37,99,235,0.35),transparent_55%)] opacity-60"></div>
<img src="<?php echo e(asset('images/frozen-food.jpeg')); ?>" alt="Frozen food collage" class="relative h-96 w-full rounded-xl object-cover shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    
    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-2xl border border-blue-500/20 bg-slate-800/50 p-8 ring-1 ring-blue-500/10">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Flash Sale</p>
                        <h3 class="mt-2 text-xl font-bold text-white">Hemat hingga 10%</h3>
                    </div>
                </div>
                <p class="mt-4 text-sm text-slate-400">Nikmati diskon spesial setiap hari untuk produk pilihan frozen food favorit Anda.</p>
            </div>

            <div class="rounded-2xl border border-slate-700 bg-slate-800/50 p-8">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pengiriman Cepat</p>
                        <h3 class="mt-2 text-xl font-bold text-white">24 Jam Tiba</h3>
                    </div>
                </div>
                <p class="mt-4 text-sm text-slate-400">Pesanan Anda akan tiba dalam kondisi beku sempurna dengan packaging berkualitas tinggi.</p>
            </div>

            <div class="rounded-2xl border border-slate-700 bg-slate-800/50 p-8">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Terjamin</p>
                        <h3 class="mt-2 text-xl font-bold text-white">Kualitas Premium</h3>
                    </div>
                </div>
                <p class="mt-4 text-sm text-slate-400">Semua produk telah melalui quality control ketat dan sertifikasi resmi dari otoritas.</p>
            </div>
        </div>
    </section>

    
    <section id="products" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-12 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-blue-400">Produk Unggulan</p>
                <h2 class="mt-3 text-4xl font-bold text-white">Pilihan Favorit Pelanggan</h2>
                <p class="mt-3 text-slate-400">Produk-produk terpopuler dengan rating tertinggi dan stok terjamin.</p>
            </div>
            <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-2 rounded-lg bg-[#2563EB] px-6 py-3 font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                Lihat Semua Produk
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <?php $__currentLoopData = $products->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 transition hover:border-blue-500/50 hover:shadow-[0_0_0_1px_rgba(37,99,235,0.25)]">
                    <div class="relative overflow-hidden bg-slate-900">
                        <?php if($product->image): ?>
                            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110" />
                        <?php else: ?>
                            <div class="flex h-56 items-center justify-center bg-slate-700">
                                <svg class="h-12 w-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        <?php endif; ?>

                        <button class="absolute right-3 top-3 flex h-10 w-10 items-center justify-center rounded-lg bg-slate-900/70 text-slate-300 backdrop-blur transition hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.682l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>
                        </button>

                        <div class="absolute left-3 top-3 rounded-lg bg-[#2563EB] px-3 py-1 text-xs font-bold text-white">-15%</div>
                    </div>

                    <div class="p-5">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500"><?php echo e(Str::limit($product->category ?? 'Frozen', 12)); ?></p>
                        <h3 class="mt-2 text-lg font-bold text-white line-clamp-2"><?php echo e($product->name); ?></h3>
                        <p class="mt-2 text-sm text-slate-400 line-clamp-2"><?php echo e(Str::limit($product->description, 50)); ?></p>

                        <div class="mt-4 flex items-center justify-between gap-3">
                            <div>
                                <p class="text-lg font-bold text-blue-300">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                <div class="mt-1 flex items-center gap-1">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <svg class="h-3.5 w-3.5 fill-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                    <?php endfor; ?>
                                    <span class="text-xs text-slate-400 ml-1">4.8</span>
                                </div>
                            </div>
                            <span class="rounded-lg bg-slate-700 px-2 py-1 text-xs font-semibold text-slate-300">Stok <?php echo e($product->stock); ?></span>
                        </div>

                        <div class="mt-4 grid gap-2">
                            <?php if(auth()->guard()->check()): ?>
                                <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <button type="submit" class="w-full rounded-lg bg-[#2563EB] py-2.5 font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40">Keranjang</button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="block rounded-lg bg-slate-700 py-2.5 text-center font-semibold text-slate-300 transition hover:bg-slate-600">Masuk</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-12 space-y-4">
            <h3 class="text-2xl font-bold text-white">Katalog Visual Produk</h3>
            <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide">
<?php $__currentLoopData = $products->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="flex-shrink-0 group">
                        <div class="relative h-40 w-40 overflow-hidden rounded-xl border-2 border-slate-700 bg-slate-900/40 ring-1 ring-white/5 transition hover:border-blue-500 hover:ring-blue-500/20">
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-110" />
                            <?php else: ?>
                                <div class="flex h-full w-full items-center justify-center bg-slate-700">
                                    <svg class="h-8 w-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            <?php endif; ?>

                            
                            <div class="absolute inset-0 flex items-end opacity-0 transition group-hover:opacity-100">
                                <div class="w-full bg-gradient-to-t from-black to-transparent p-3">
                                    <p class="text-xs font-semibold text-white line-clamp-2"><?php echo e($product->name); ?></p>
                                    <p class="text-xs text-blue-300 font-bold">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div class="space-y-6">
                <div>
                    <p class="text-sm font-bold uppercase tracking-widest text-blue-400">Testimoni</p>
                    <h2 class="mt-3 text-4xl font-bold text-white">Kepuasan Pelanggan</h2>
                </div>
                <p class="text-lg text-slate-300">Ribuan pelanggan telah merasakan kualitas dan layanan terbaik dari Frozymart. Inilah kata-kata mereka.</p>

                <div x-data="{ current: 0, testimonials: 3 }" class="space-y-6">
                    
                    <div class="space-y-5">
                        
                        <div x-show="current === 0" x-transition class="rounded-2xl border border-slate-700 bg-slate-800 p-8">
                            <div class="flex gap-1 text-blue-300 mb-4">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></path></svg>
                                <?php endfor; ?>
                            </div>
                            <p class="text-slate-300 leading-relaxed">"Paket nugget dan sosis tiba dalam kondisi beku sempurna. Rasanya enak dan praktis untuk masak cepat. Rekomendasi banget untuk semua orang!"</p>
                            <div class="mt-5 flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-white font-bold">A</div>
                                <div>
                                    <p class="font-semibold text-white">Andi Wijaya</p>
                                    <p class="text-sm text-slate-400">Jakarta Timur</p>
                                </div>
                            </div>
                        </div>

                        
                        <div x-show="current === 1" x-transition class="rounded-2xl border border-slate-700 bg-slate-800 p-8">
                            <div class="flex gap-1 text-blue-300 mb-4">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></path></svg>
                                <?php endfor; ?>
                            </div>
                            <p class="text-slate-300 leading-relaxed">"Harganya sangat kompetitif dan promo selalu update. Produk bisa disimpan lama di freezer tanpa mengurangi cita rasa. Terus bertahan ya Frozymart!"</p>
                            <div class="mt-5 flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-white font-bold">R</div>
                                <div>
                                    <p class="font-semibold text-white">Rina Susanto</p>
                                    <p class="text-sm text-slate-400">Bandung</p>
                                </div>
                            </div>
                        </div>

                        
                        <div x-show="current === 2" x-transition class="rounded-2xl border border-slate-700 bg-slate-800 p-8">
                            <div class="flex gap-1 text-blue-300 mb-4">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></path></svg>
                                <?php endfor; ?>
                            </div>
                            <p class="text-slate-300 leading-relaxed">"Customer service-nya responsif dan membantu. Pengiriman selalu on time dan packaging sangat aman. Ini toko frozen food terbaik yang pernah saya gunakan!"</p>
                            <div class="mt-5 flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-white font-bold">S</div>
                                <div>
                                    <p class="font-semibold text-white">Siti Nurhaliza</p>
                                    <p class="text-sm text-slate-400">Surabaya</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex items-center gap-3">
                        <button @click="current = current === 0 ? testimonials - 1 : current - 1" class="p-2 rounded-lg bg-slate-800 text-slate-400 transition hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/40" aria-label="Previous testimonial">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="flex gap-2 flex-1">
                            <template x-for="i in testimonials">
                                <button @click="current = i - 1" :class="current === i - 1 ? 'bg-[#2563EB]' : 'bg-slate-700'" class="h-2 flex-1 rounded-full transition" aria-label="Select testimonial"></button>
                            </template>
                        </div>
                        <button @click="current = current === testimonials - 1 ? 0 : current + 1" class="p-2 rounded-lg bg-slate-800 text-slate-400 transition hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/40" aria-label="Next testimonial">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            
            <div class="space-y-6">
                <div class="rounded-2xl border border-slate-700 bg-gradient-to-br from-slate-800 to-slate-900 p-8">
                    <div class="grid gap-6">
                        <div class="border-b border-slate-700 pb-6">
                            <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Rating Pelanggan</p>
                            <p class="mt-2 text-5xl font-bold text-blue-300">4.9<span class="text-xl text-slate-400">/5</span></p>
                            <p class="mt-2 text-sm text-slate-400">Berdasarkan 10,000+ ulasan pelanggan</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-slate-300">Produk selalu segar dan berkualitas</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-slate-300">Pengiriman cepat dan aman</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-slate-300">Layanan pelanggan responsif</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-slate-300">Promo menarik setiap minggu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2">
            <div class="space-y-6">
                <div>
                    <p class="text-sm font-bold uppercase tracking-widest text-blue-400">Hubungi Kami</p>
                    <h2 class="mt-3 text-4xl font-bold text-white">Tanya Sesuatu?</h2>
                </div>
                <p class="text-lg text-slate-400">Hubungi kami melalui WhatsApp, email, atau kunjungi toko fisik kami untuk informasi lebih lanjut.</p>

                <div class="space-y-4">
                    <a href="https://wa.me/62857-6851-0161" target="_blank" class="flex items-center gap-4 rounded-xl border border-slate-700 bg-slate-800/50 p-5 transition hover:border-blue-500/50 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 13.5c-.25-.12-1.48-.73-1.7-.81-.23-.08-.4-.12-.57.12-.17.24-.7.81-.86.98-.16.17-.32.19-.58.07-.26-.12-1.1-.41-2.1-1.3-.78-.69-1.3-1.54-1.45-1.8-.15-.25-.01-.38.11-.5.11-.1.25-.27.37-.41.12-.13.16-.23.25-.38.08-.14.04-.27-.02-.38-.06-.12-.57-1.4-.78-1.92-.2-.51-.4-.44-.58-.45-.15-.01-.33-.01-.51-.01-.17 0-.45.06-.69.27-.24.21-.9.88-.9 2.15 0 1.27.92 2.5 1.05 2.67.12.17 1.82 2.8 4.4 3.92.62.27 1.11.43 1.49.55.63.2 1.2.17 1.65.1.5-.08 1.48-.6 1.69-1.18.21-.58.21-1.08.15-1.18-.06-.1-.22-.16-.47-.27zM12 2C6.477 2 2 6.477 2 12c0 1.98.62 3.81 1.68 5.31L2 22l4.84-1.58A9.954 9.954 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-400">WhatsApp</p>
                            <p class="mt-1 text-lg font-bold text-white">+62857-6851-0161</p>
                        </div>
                    </a>

                    <a href="mailto:frozymart@gmail.com" class="flex items-center gap-4 rounded-xl border border-slate-700 bg-slate-800/50 p-5 transition hover:border-blue-500/50 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-400">Email</p>
                            <p class="mt-1 text-lg font-bold text-white">frozymart@gmail.com</p>
                        </div>
                    </a>

                    <div class="rounded-xl border border-slate-700 bg-slate-800/50 p-5">
                        <p class="text-sm font-semibold text-slate-400">Jam Operasional</p>
                        <p class="mt-2 text-white">Senin - Sabtu, 08:00 - 18:00</p>
                        <p class="mt-1 text-sm text-slate-400">Minggu libur</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-sm font-semibold text-slate-400">Ikuti Media Sosial Kami</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://www.instagram.com/frozy.mart?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-800 text-slate-400 transition hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500/20">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5A4.25 4.25 0 0020.5 16.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm8.75 2.75a.75.75 0 110 1.5.75.75 0 010-1.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/></svg>
                        </a>
                        <a href="https://www.tiktok.com/@frozy.mart?is_from_webapp=1&sender_device=pc" target="_blank" class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-800 text-slate-400 transition hover:bg-slate-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-slate-500/30">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.4 3.2h-2.3c-.16 0-.3.13-.3.3v5.36c0 1.6-1.04 2.94-2.66 3.36-.82.22-1.54.10-2.08-.12V15c.42.28.92.4 1.45.4 1.86 0 3.4-1.5 3.4-3.38V5.13h1.22c.16 0 .3-.14.3-.3V3.5c0-.16-.14-.3-.3-.3z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="h-96 overflow-hidden rounded-2xl border border-slate-700 bg-slate-800">
<iframe
                class="h-full w-full"
src="https://www.google.com/maps?q=Bandar%20Lampung&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Tubes_EBisnis\resources\views/dashboard.blade.php ENDPATH**/ ?>