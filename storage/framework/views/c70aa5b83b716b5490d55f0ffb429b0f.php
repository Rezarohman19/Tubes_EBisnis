<?php $__env->startSection('content'); ?>
<div class="bg-[#0B0F1A]">
    
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#050916] via-[#071023] to-[#0b1121]" />
        <div class="absolute inset-0 pointer-events-none opacity-70">
            <div class="absolute -left-24 top-12 h-[28rem] w-[28rem] rounded-full bg-blue-500/10 blur-3xl" />
            <div class="absolute right-0 top-1/3 h-[22rem] w-[22rem] rounded-full bg-violet-500/10 blur-3xl" />
            <div class="absolute left-1/2 bottom-4 h-[24rem] w-[24rem] -translate-x-1/2 rounded-full bg-cyan-400/5 blur-3xl" />
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="grid gap-12 xl:grid-cols-[1.05fr_0.95fr] xl:items-center">
                
                <div class="space-y-8 text-white">
                    <div class="hero-title inline-flex flex-wrap items-center gap-3 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-slate-200 backdrop-blur-xl shadow-sm shadow-slate-900/30">
                        <span class="rounded-full bg-gradient-to-r from-blue-500 via-indigo-500 to-violet-500 px-3 py-1 text-xs font-bold uppercase tracking-[0.24em] text-white">Premium Frozen Food</span>
                        <span class="hidden sm:inline">Kesegaran terjaga, paket aman, dan pengiriman ekspres.</span>
                    </div>

                    <div class="space-y-5">
                        <h1 class="hero-title text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl xl:text-7xl leading-[0.98]">
                            Frozen Food
                            <span class="text-gradient">Segar</span>
                            untuk
                            <span class="text-gradient-warm">Keluarga Anda</span>
                        </h1>
                        <p class="hero-subtitle max-w-2xl text-lg leading-8 text-slate-300 sm:text-xl">
                            Temukan koleksi produk beku premium: nugget, sosis, bakso, dan pilihan keluarga siap saji dengan kualitas terbaik dan rasa yang selalu konsisten.
                        </p>
                    </div>

                    <div class="hero-buttons flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-center">
                        <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center justify-center gap-3 rounded-3xl bg-gradient-to-r from-blue-500 via-indigo-500 to-violet-500 px-8 py-4 text-base font-semibold text-white shadow-[0_24px_60px_-30px_rgba(59,130,246,0.8)] transition duration-300 hover:-translate-y-0.5 hover:scale-[1.01] hover:shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-400/40">
                            Belanja Sekarang
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#products" class="inline-flex items-center justify-center gap-2 rounded-3xl border border-white/15 bg-white/5 px-7 py-4 text-base font-semibold text-slate-100 shadow-sm backdrop-blur-md transition duration-300 hover:border-blue-400/30 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-400/30">
                            Lihat Produk
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="hero-search rounded-[32px] border border-white/10 bg-white/5 p-3 shadow-2xl shadow-slate-950/20 backdrop-blur-xl transition duration-500 hover:border-blue-400/30 hover:shadow-blue-500/10">
                        <div class="relative flex items-center gap-3 rounded-3xl bg-[#0B1120]/80 px-4 py-4">
                            <span class="text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2m2.1-5.8a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </span>
                            <label for="hero-search" class="sr-only">Cari produk frozen food</label>
                            <input id="hero-search" name="search" type="text" placeholder="Cari nugget, sosis, bakso premium..." class="input-field border border-transparent bg-transparent px-0 py-0 text-base placeholder:text-slate-500 focus:border-transparent focus:ring-0" />
                            <button type="submit" class="inline-flex items-center justify-center rounded-3xl bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition duration-300 hover:scale-[1.02] hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-400/40">
                                Cari
                            </button>
                        </div>
                    </form>

                    <div class="hero-features grid gap-4 sm:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5 text-center shadow-sm backdrop-blur-md transition duration-300 hover:border-blue-400/20 hover:bg-white/10">
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Quality</p>
                            <p class="mt-3 text-xl font-bold text-white">100% Fresh</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5 text-center shadow-sm backdrop-blur-md transition duration-300 hover:border-blue-400/20 hover:bg-white/10">
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Delivery</p>
                            <p class="mt-3 text-xl font-bold text-white">Pengiriman Cepat</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5 text-center shadow-sm backdrop-blur-md transition duration-300 hover:border-blue-400/20 hover:bg-white/10">
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Support</p>
                            <p class="mt-3 text-xl font-bold text-white">24/7 Ready</p>
                        </div>
                    </div>
                </div>

                
                <div class="relative animate-fade-in-up">
                    <div class="group relative overflow-hidden rounded-[34px] border border-white/10 bg-[#0b152c]/70 p-1 shadow-2xl shadow-indigo-950/30 transition duration-500 hover:-translate-y-1 hover:shadow-indigo-900/30">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.2),transparent_24%),radial-gradient(circle_at_bottom_right,_rgba(168,85,247,0.16),transparent_22%)]" />
                        <div class="relative overflow-hidden rounded-[32px] bg-[#0B0F1A]">
                            <img src="<?php echo e(asset('images/frozen-food.jpeg')); ?>" alt="Frozen food premium" class="h-[420px] w-full object-cover transition duration-700 ease-out group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B0F1A]/85 via-[#0B0F1A]/15 to-transparent" />

                            <div class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-full border border-white/10 bg-slate-950/40 px-4 py-2 text-sm text-slate-100 shadow-lg shadow-slate-950/30 backdrop-blur-md">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-400 shadow-[0_0_18px_rgba(52,211,153,0.6)]"></span>
                                Fresh & Premium
                            </div>

                            <div class="absolute inset-x-5 bottom-5 rounded-[26px] border border-white/10 bg-[#0B1223]/70 p-4 backdrop-blur-xl shadow-xl shadow-slate-950/40">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Eksklusif</p>
                                        <p class="mt-2 text-lg font-semibold text-white">Paket Beku Specialty</p>
                                    </div>
                                    <span class="inline-flex items-center rounded-full bg-blue-500/15 px-3 py-2 text-xs font-semibold text-blue-200 ring-1 ring-blue-500/20">Ready Stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[28px] border border-white/10 bg-gradient-to-r from-blue-600/20 via-indigo-600/20 to-violet-600/20 p-8 sm:p-12 shadow-2xl shadow-indigo-950/30 backdrop-blur-md">
            <div class="absolute -left-20 -top-20 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>
            <div class="absolute -right-20 bottom-0 h-80 w-80 rounded-full bg-violet-500/15 blur-3xl"></div>
            
            <div class="relative">
                <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                    <div class="space-y-5">
                        <div class="inline-flex items-center gap-2 rounded-full border border-blue-400/40 bg-blue-500/15 px-4 py-2">
                            <span class="h-2 w-2 rounded-full bg-blue-400 shadow-[0_0_12px_rgba(96,165,250,0.6)]"></span>
                            <p class="text-sm font-bold uppercase tracking-[0.24em] text-blue-300">Promo Spesial</p>
                        </div>
                        <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl lg:text-5xl">
                            Diskon
                            <span class="text-gradient">Hingga 10%</span>
                        </h2>
                        <p class="text-lg text-slate-300">Dapatkan penawaran terbaik untuk produk frozen food pilihan. Gratis ongkir untuk pembelian pertama Anda!</p>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-blue-500/30 transition-all hover:scale-105 hover:shadow-blue-500/40">
                                Belanja Sekarang
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            <p class="text-sm text-blue-200">Berlaku hingga akhir bulan 🎉</p>
                        </div>
                    </div>
                    
                    <div class="hidden lg:flex justify-center items-center">
                        <div class="relative overflow-hidden rounded-2xl border border-white/20 bg-white/5 backdrop-blur-md shadow-xl shadow-blue-500/20 group">
                            <img src="<?php echo e(asset('images/frozen-food.jpeg')); ?>" alt="Promo diskon 10%" class="h-64 w-64 object-cover transition duration-500 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B0F1A]/60 via-transparent to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="features" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-12 space-y-4 text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 mx-auto">
                <span class="h-2 w-2 rounded-full bg-blue-400 shadow-[0_0_12px_rgba(96,165,250,0.6)]"></span>
                <p class="text-sm font-bold uppercase tracking-[0.24em] text-blue-300">Keunggulan Kami</p>
            </div>
            <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">Mengapa Pilih Frozymart?</h2>
            <p class="mx-auto max-w-2xl text-lg text-slate-400">Kami menyediakan frozen food terbaik dengan standar kualitas internasional dan layanan pelanggan terpercaya.</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-4">
            
            <div class="group relative overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/5 to-transparent p-8 shadow-lg shadow-blue-950/10 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400/40 hover:shadow-blue-500/20">
                <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-blue-500/10 blur-2xl transition group-hover:bg-blue-500/15"></div>
                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500/20 to-indigo-500/20 text-blue-300 ring-1 ring-white/10">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-white">Pengiriman Cepat</h3>
                    <p class="mt-3 text-sm text-slate-400 leading-relaxed">Sampai dalam 24 jam ke seluruh kota bandar lampung dengan packaging beku yang sempurna.</p>
                </div>
            </div>

            
            <div class="group relative overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/5 to-transparent p-8 shadow-lg shadow-indigo-950/10 transition-all duration-300 hover:-translate-y-1 hover:border-indigo-400/40 hover:shadow-indigo-500/20">
                <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-indigo-500/10 blur-2xl transition group-hover:bg-indigo-500/15"></div>
                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 text-indigo-300 ring-1 ring-white/10">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-white">Kualitas Premium</h3>
                    <p class="mt-3 text-sm text-slate-400 leading-relaxed">Semua produk melalui quality control ketat dan tersertifikasi resmi dari otoritas kesehatan.</p>
                </div>
            </div>

            
            <div class="group relative overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/5 to-transparent p-8 shadow-lg shadow-violet-950/10 transition-all duration-300 hover:-translate-y-1 hover:border-violet-400/40 hover:shadow-violet-500/20">
                <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-violet-500/10 blur-2xl transition group-hover:bg-violet-500/15"></div>
                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500/20 to-pink-500/20 text-violet-300 ring-1 ring-white/10">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-white">Harga Terjangkau</h3>
                    <p class="mt-3 text-sm text-slate-400 leading-relaxed">Harga kompetitif dengan promosi menarik setiap hari membuat belanja lebih hemat.</p>
                </div>
            </div>

            
            <div class="group relative overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/5 to-transparent p-8 shadow-lg shadow-cyan-950/10 transition-all duration-300 hover:-translate-y-1 hover:border-cyan-400/40 hover:shadow-cyan-500/20">
                <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-cyan-500/10 blur-2xl transition group-hover:bg-cyan-500/15"></div>
                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500/20 to-blue-500/20 text-cyan-300 ring-1 ring-white/10">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l6 6m-8-6l8 6M5 7a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7z"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-white">Layanan 24/7</h3>
                    <p class="mt-3 text-sm text-slate-400 leading-relaxed">Customer service responsif siap membantu Anda kapan saja melalui WhatsApp dan email.</p>
                </div>
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

                <div class="rounded-3xl border border-slate-700 bg-gradient-to-br from-slate-900/40 via-slate-800/20 to-slate-900/40 p-6 sm:p-8 overflow-hidden">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                    $featured = $products?->take(8) ?? collect();
                    $featuredCount = $featured->count();
                ?>

                <?php if($featuredCount > 0): ?>
                    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $badge = $product->is_best_seller ?? null;
                            $badgeLabel = null;
                            $badgeClass = 'bg-slate-700 text-slate-200';

                            if(isset($product->discount_percentage) && $product->discount_percentage > 0){
                                $badgeLabel = '-' . (int)$product->discount_percentage . '%';
                                $badgeClass = 'bg-[#2563EB] text-white';
                            } elseif(($badge ?? false) === true){
                                $badgeLabel = 'Best Seller';
                                $badgeClass = 'bg-emerald-500/15 text-emerald-300 ring-1 ring-emerald-400/20';
                            } elseif(($product->is_terlaris ?? false) === true){
                                $badgeLabel = 'Terlaris';
                                $badgeClass = 'bg-amber-500/15 text-amber-200 ring-1 ring-amber-400/20';
                            } else {
                                $badgeLabel = 'Promo';
                                $badgeClass = 'bg-slate-700 text-slate-200';
                            }

                            $imgUrl = $product->image_url ?? ($product->image ? asset('storage/' . $product->image) : null);
                        ?>

                        <div class="group overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 transition hover:-translate-y-1 hover:border-blue-500/50 hover:shadow-xl hover:shadow-blue-500/10">
                            <div class="relative overflow-hidden bg-slate-900">
                                <?php if($imgUrl): ?>
                                    <img src="<?php echo e($imgUrl); ?>" alt="<?php echo e($product->name); ?>" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110" />
                                <?php else: ?>
                                    <div class="flex h-56 items-center justify-center bg-slate-700">
                                        <svg class="h-12 w-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                <?php endif; ?>

                                <button class="absolute right-3 top-3 flex h-10 w-10 items-center justify-center rounded-lg bg-slate-900/70 text-slate-300 backdrop-blur transition hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/40" aria-label="Wishlist">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.682l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>
                                </button>

                                <?php if($badgeLabel): ?>
                                    <div class="absolute left-3 top-3 rounded-lg px-3 py-1 text-xs font-bold <?php echo e($badgeClass); ?> ring-1 ring-white/5">
                                        <?php echo e($badgeLabel); ?>

                                    </div>
                                <?php endif; ?>
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
                                            <span class="text-xs text-slate-400 ml-1"><?php echo e($product->rating ?? '4.8'); ?></span>
                                        </div>
                                    </div>
                                    <span class="rounded-lg bg-slate-700 px-2 py-1 text-xs font-semibold text-slate-300">Stok <?php echo e($product->stock); ?></span>
                                </div>

                                <div class="mt-4 grid gap-2">
                                    <?php if(auth()->guard()->check()): ?>
                                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <div class="flex gap-2">
                                                <button type="submit" class="w-full rounded-lg bg-[#2563EB] py-2.5 font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40">Tambah</button>
                                                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="w-full rounded-lg bg-slate-700 py-2.5 text-center font-semibold text-slate-200 transition hover:bg-slate-600">Detail</a>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <div class="flex gap-2">
                                            <a href="<?php echo e(route('login')); ?>" class="w-full rounded-lg bg-[#2563EB] py-2.5 text-center font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40">Keranjang</a>
                                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="w-full rounded-lg bg-slate-700 py-2.5 text-center font-semibold text-slate-200 transition hover:bg-slate-600">Lihat Detail</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    
                    <?php for($s=0;$s<8;$s++): ?>
                        <div class="group overflow-hidden rounded-2xl border border-slate-700 bg-slate-800">
                            <div class="relative bg-slate-900">
                                <div class="h-56 w-full animate-pulse bg-slate-700/60"></div>
                                <div class="absolute left-3 top-3 h-6 w-20 animate-pulse rounded-lg bg-[#2563EB]/30"></div>
                            </div>
                            <div class="p-5">
                                <div class="h-4 w-24 animate-pulse rounded bg-slate-700/60"></div>
                                <div class="mt-3 h-5 w-4/5 animate-pulse rounded bg-slate-700/60"></div>
                                <div class="mt-2 h-4 w-full animate-pulse rounded bg-slate-700/60"></div>
                                <div class="mt-4 flex items-center justify-between gap-3">
                                    <div>
                                        <div class="h-5 w-28 animate-pulse rounded bg-slate-700/60"></div>
                                        <div class="mt-2 flex gap-1">
                                            <?php for($i=0;$i<5;$i++): ?>
                                                <div class="h-3 w-3 animate-pulse rounded-full bg-amber-400/30"></div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <div class="h-6 w-18 animate-pulse rounded bg-slate-700/60"></div>
                                </div>
                                <div class="mt-4 flex gap-2">
                                    <div class="h-10 w-full animate-pulse rounded bg-[#2563EB]/30"></div>
                                    <div class="h-10 w-full animate-pulse rounded bg-slate-700/60"></div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="mt-14 space-y-4">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-white">Katalog Visual Produk</h3>
                    <p class="mt-2 text-sm text-slate-400">Pilih produk favorit Anda dengan cepat dari katalog visual.</p>
                </div>

                <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600/80 to-indigo-600/80 px-4 py-2 font-semibold text-white shadow-lg shadow-blue-500/15 ring-1 ring-white/10 transition hover:shadow-xl hover:shadow-blue-500/25 focus:outline-none focus:ring-2 focus:ring-blue-400/30">
                    Lihat Katalog
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <?php
                $catalog = $products?->take(20) ?? collect();
                $catalogCount = $catalog->count();
                $catalogTarget = 10; // agar carousel tetap terasa penuh
            ?>

            <?php if($catalogCount > 0): ?>
                <div class="relative">
                    
                    <div
                        class="swiper"
                        data-visual-catalog-swiper
                    >
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $imgUrl = $product->image_url ?? ($product->image ? asset('storage/' . $product->image) : null);
                                    $discount = $product->discount_percentage ?? null;
                                    $isBest = $product->is_best_seller ?? false;
                                    $isTerlaris = $product->is_terlaris ?? false;
                                    $label = $discount && $discount > 0 ? ('-' . (int)$discount . '%') : ($isBest ? 'Best Seller' : ($isTerlaris ? 'Terlaris' : null));
                                ?>

                                <div class="swiper-slide">
                                    <div class="group h-full overflow-hidden rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-[0_0_0_1px_rgba(255,255,255,0.04)] transition duration-300 hover:-translate-y-1 hover:border-blue-400/40 hover:shadow-[0_0_18px_rgba(37,99,235,0.18)]">
                                        <div class="relative">
                                            <div class="h-[170px] w-full bg-slate-900">
                                                <?php if($imgUrl): ?>
                                                    <img src="<?php echo e($imgUrl); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
                                                <?php else: ?>
                                                    <div class="flex h-full w-full items-center justify-center bg-slate-800">
                                                        <svg class="h-10 w-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <?php if($label): ?>
                                                <div class="absolute left-3 top-3 rounded-xl px-2.5 py-1 text-[11px] font-bold text-white <?php echo e($discount && $discount > 0 ? 'bg-[#2563EB]' : ($isBest ? 'bg-emerald-500/90' : 'bg-amber-500/90')); ?> shadow-lg shadow-black/20">
                                                    <?php echo e($label); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="p-4">
                                            <p class="text-sm font-bold text-white line-clamp-2"><?php echo e($product->name); ?></p>

                                            <div class="mt-2 flex items-center justify-between gap-2">
                                                <p class="text-sm font-bold text-blue-300">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                            </div>

                                            <div class="mt-2 flex items-center gap-1 text-amber-400">
                                                <?php for($i=0;$i<5;$i++): ?>
                                                    <svg class="h-3.5 w-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                                <?php endfor; ?>
                                                <span class="text-xs text-slate-400 ml-1"><?php echo e($product->rating ?? '4.8'); ?></span>
                                            </div>

                                            <div class="mt-3 grid gap-2">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 py-2 text-xs font-bold text-white transition hover:from-blue-500 hover:to-indigo-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                                                            Tambah
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('login')); ?>" class="block w-full rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 py-2 text-center text-xs font-bold text-white transition hover:from-blue-500 hover:to-indigo-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                                                        Login untuk Keranjang
                                                    </a>
                                                <?php endif; ?>

                                                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="block w-full rounded-xl bg-white/5 py-2 text-center text-xs font-bold text-slate-200 ring-1 ring-white/10 transition hover:bg-white/10">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            <?php if($catalogCount < $catalogTarget): ?>
                                <?php for($k=0;$k<($catalogTarget-$catalogCount);$k++): ?>
                                    <div class="swiper-slide">
                                        <div class="h-full overflow-hidden rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md">
                                            <div class="h-[170px] bg-slate-900">
                                                <div class="h-full w-full animate-pulse bg-slate-700/60"></div>
                                            </div>
                                            <div class="p-4">
                                                <div class="h-5 w-4/5 animate-pulse rounded bg-slate-700/60"></div>
                                                <div class="mt-2 h-4 w-2/3 animate-pulse rounded bg-slate-700/60"></div>
                                                <div class="mt-3 flex gap-1">
                                                    <?php for($i=0;$i<5;$i++): ?>
                                                        <div class="h-3.5 w-3.5 animate-pulse rounded-full bg-amber-400/30"></div>
                                                    <?php endfor; ?>
                                                </div>
                                                <div class="mt-3 grid gap-2">
                                                    <div class="h-9 w-full animate-pulse rounded-xl bg-[#2563EB]/30"></div>
                                                    <div class="h-9 w-full animate-pulse rounded-xl bg-slate-700/60"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>

                        
                        <button
                            type="button"
                            data-swiper-prev
                            class="swiper-button-prev !top-auto !bottom-0 left-0 -translate-x-12 md:-translate-x-10 absolute z-10 h-10 w-10 rounded-xl border border-white/10 bg-[#0B0F1A]/50 backdrop-blur-md text-slate-200 transition hover:border-blue-400/40 hover:bg-[#0B0F1A]/70"
                            aria-label="Previous">
                            <svg class="mx-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>

                        <button
                            type="button"
                            data-swiper-next
                            class="swiper-button-next !top-auto !bottom-0 right-0 translate-x-12 md:translate-x-10 absolute z-10 h-10 w-10 rounded-xl border border-white/10 bg-[#0B0F1A]/50 backdrop-blur-md text-slate-200 transition hover:border-blue-400/40 hover:bg-[#0B0F1A]/70"
                            aria-label="Next">
                            <svg class="mx-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            <?php else: ?>
                
                <div class="relative">
                    <div class="swiper" data-visual-catalog-swiper>
                        <div class="swiper-wrapper">
                            <?php for($s=0;$s<8;$s++): ?>
                                <div class="swiper-slide">
                                    <div class="h-full overflow-hidden rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md">
                                        <div class="h-[170px] bg-slate-900">
                                            <div class="h-full w-full animate-pulse bg-slate-700/60"></div>
                                        </div>
                                        <div class="p-4">
                                            <div class="h-5 w-4/5 animate-pulse rounded bg-slate-700/60"></div>
                                            <div class="mt-2 h-4 w-2/3 animate-pulse rounded bg-slate-700/60"></div>
                                            <div class="mt-3 flex gap-1">
                                                <?php for($i=0;$i<5;$i++): ?>
                                                    <div class="h-3.5 w-3.5 animate-pulse rounded-full bg-amber-400/30"></div>
                                                <?php endfor; ?>
                                            </div>
                                            <div class="mt-3 grid gap-2">
                                                <div class="h-9 w-full animate-pulse rounded-xl bg-[#2563EB]/30"></div>
                                                <div class="h-9 w-full animate-pulse rounded-xl bg-slate-700/60"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
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
                                    <p class="text-sm text-slate-400">Kampung Baru</p>
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
                                    <p class="text-sm text-slate-400">Kemiling</p>
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
                                    <p class="text-sm text-slate-400">Sukarame</p>
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
        <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
            <div class="space-y-6">
                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-[#2563EB] shadow-[0_0_14px_rgba(37,99,235,0.55)]"></span>
                        <p class="text-sm font-bold uppercase tracking-widest text-blue-300">Hubungi Kami</p>
                    </div>

                    <h2 class="text-4xl font-bold leading-tight text-white">
                        Tanya Sesuatu?
                    </h2>
                    <p class="max-w-xl text-lg text-slate-300">
                        Hubungi kami melalui WhatsApp, email, atau kunjungi toko fisik untuk informasi lebih lanjut.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    
                    <a
                        href="https://wa.me/62857-6851-0161"
                        target="_blank"
                        class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-md shadow-sm transition hover:-translate-y-0.5 hover:border-blue-400/40 hover:shadow-[0_0_18px_rgba(37,99,235,0.18)]"
                    >
                        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-500/10 blur-2xl transition group-hover:bg-blue-500/15"></div>
                        <div class="relative flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600/20 to-indigo-600/20 ring-1 ring-white/10">
                                <svg class="h-6 w-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 13.5c-.25-.12-1.48-.73-1.7-.81-.23-.08-.4-.12-.57.12-.17.24-.7.81-.86.98-.16.17-.32.19-.58.07-.26-.12-1.1-.41-2.1-1.3-.78-.69-1.3-1.54-1.45-1.8-.15-.25-.01-.38.11-.5.11-.1.25-.27.37-.41.12-.13.16-.23.25-.38.08-.14.04-.27-.02-.38-.06-.12-.57-1.4-.78-1.92-.2-.51-.4-.44-.58-.45-.15-.01-.33-.01-.51-.01-.17 0-.45.06-.69.27-.24.21-.9.88-.9 2.15 0 1.27.92 2.5 1.05 2.67.12.17 1.82 2.8 4.4 3.92.62.27 1.11.43 1.49.55.63.2 1.2.17 1.65.1.5-.08 1.48-.6 1.69-1.18.21-.58.21-1.08.15-1.18-.06-.1-.22-.16-.47-.27z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.477 2 2 6.477 2 12c0 1.98.62 3.81 1.68 5.31L2 22l4.84-1.58A9.954 9.954 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z" />
                                </svg>
                            </div>

                            <div class="relative">
                                <p class="text-sm font-semibold text-slate-300">Chat WhatsApp</p>
                                <p class="mt-1 text-lg font-bold text-white">+62857-6851-0161</p>
                                <p class="mt-2 text-xs text-blue-200/90">Klik untuk mulai percakapan</p>
                            </div>
                        </div>
                    </a>

                    
                    <a
                        href="mailto:frozymart@gmail.com"
                        class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-md shadow-sm transition hover:-translate-y-0.5 hover:border-blue-400/40 hover:shadow-[0_0_18px_rgba(37,99,235,0.18)]"
                    >
                        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-indigo-500/10 blur-2xl transition group-hover:bg-indigo-500/15"></div>
                        <div class="relative flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600/20 to-blue-600/20 ring-1 ring-white/10">
                                <svg class="h-6 w-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <div class="relative">
                                <p class="text-sm font-semibold text-slate-300">Kirim Email</p>
                                <p class="mt-1 text-lg font-bold text-white">frozymart@gmail.com</p>
                                <p class="mt-2 text-xs text-blue-200/90">Balasan cepat & informatif</p>
                            </div>
                        </div>
                    </a>
                </div>

                
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-md shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600/20 to-indigo-600/20 ring-1 ring-white/10">
                            <svg class="h-6 w-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-300">Jam Operasional</p>
                            <p class="mt-2 text-white">Senin - Sabtu, 08:00 - 18:00</p>
                            <p class="mt-1 text-sm text-slate-400">Minggu libur</p>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-3">
                    <p class="text-sm font-semibold text-slate-300">Ikuti Media Sosial Kami</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://www.instagram.com/frozy.mart?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="group flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-300 transition hover:-translate-y-0.5 hover:border-pink-400/40 hover:bg-pink-500/10">
                            <svg class="h-6 w-6 text-pink-300" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5A4.25 4.25 0 0020.5 16.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm8.75 2.75a.75.75 0 110 1.5.75.75 0 010-1.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/></svg>
                        </a>
                        <a href="https://www.tiktok.com/@frozy.mart?is_from_webapp=1&sender_device=pc" target="_blank" class="group flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-300 transition hover:-translate-y-0.5 hover:border-slate-500/40 hover:bg-slate-500/10">
                            <svg class="h-6 w-6 text-slate-200" fill="currentColor" viewBox="0 0 24 24"><path d="M18.4 3.2h-2.3c-.16 0-.3.13-.3.3v5.36c0 1.6-1.04 2.94-2.66 3.36-.82.22-1.54.10-2.08-.12V15c.42.28.92.4 1.45.4 1.86 0 3.4-1.5 3.4-3.38V5.13h1.22c.16 0 .3-.14.3-.3V3.5c0-.16-.14-.3-.3-.3z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="h-[360px] sm:h-[420px] lg:h-[520px] overflow-hidden rounded-[22px] border border-white/10 bg-white/5 backdrop-blur-md shadow-sm">
                <iframe
                    class="h-full w-full"
                    src="https://www.google.com/maps?q=Bandar%20Lampung&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Google Map - Bandar Lampung"
                ></iframe>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/dashboard.blade.php ENDPATH**/ ?>