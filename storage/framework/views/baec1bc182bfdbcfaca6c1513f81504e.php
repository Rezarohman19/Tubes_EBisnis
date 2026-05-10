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
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <?php if(session('success')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>

            
            <div class="mb-8">
                <h2 class="section-heading">📦 Katalog Produk</h2>
                <p class="section-subheading">Jelajahi koleksi lengkap frozen food berkualitas kami</p>
            </div>

            
            <?php if($products->isEmpty()): ?>
                <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-white/5 bg-[#161B29] py-24 text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A]">
                        <svg class="h-12 w-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Produk Tidak Tersedia</h3>
                    <p class="mt-2 text-sm text-slate-500">Saat ini belum ada produk. Silakan cek kembali nanti.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-card group">
                            
                            <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                <?php if($product->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <?php else: ?>
                                    <div class="flex h-full flex-col items-center justify-center gap-3">
                                        <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-[#0B0F1A]">
                                            <svg class="h-10 w-10 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-500">No Image</span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="absolute top-3 right-3">
                                    <?php if($product->stock > 10): ?>
                                        <span class="badge-success"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Stok: <?php echo e($product->stock); ?></span>
                                    <?php elseif($product->stock > 0): ?>
                                        <span class="badge-warning"><span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-500"></span> Sisa: <?php echo e($product->stock); ?></span>
                                    <?php else: ?>
                                        <span class="badge-danger">Habis</span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                    <a href="<?php echo e(route('products.show', $product)); ?>" class="m-3 flex w-full items-center justify-center gap-2 rounded-2xl bg-white/95 py-3 text-sm font-bold text-gray-900 backdrop-blur transition-all hover:bg-white">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>

                            
                            <div class="p-5">
                                <h3 class="text-sm font-bold text-white line-clamp-1 leading-snug"><?php echo e($product->name); ?></h3>
                                <p class="mt-2 text-xs text-slate-500 line-clamp-2 leading-relaxed"><?php echo e($product->description); ?></p>
                                <div class="mt-4">
                                    <p class="text-xl font-black text-white">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                </div>
                                <div class="mt-4">
                                    <?php if($product->stock > 0): ?>
                                        <?php if(auth()->guard()->check()): ?>
                                            <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn-primary w-full !py-2.5 !rounded-xl !text-xs !shadow-md">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                                    Tambah ke Keranjang
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" class="btn-primary w-full !py-2.5 !rounded-xl !text-xs !shadow-md">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                                Login untuk Beli
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button disabled class="flex w-full items-center justify-center gap-2 rounded-xl bg-white/5 py-2.5 text-xs font-bold text-slate-600 cursor-not-allowed border border-white/5">Stok Habis</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\userl\Desktop\Tubes_EBisnis\resources\views/products/index.blade.php ENDPATH**/ ?>