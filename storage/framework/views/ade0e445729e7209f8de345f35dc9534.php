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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Frozymart - Katalog Frozen Food
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if(session('success')): ?>
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="mb-8 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Selamat datang di Frozymart</h3>
                <p class="mt-2 text-sm text-gray-600">Belanja frozen food berkualitas dengan mudah. Pilih produk, tambahkan ke keranjang, lalu checkout dengan metode pembayaran pilihan Anda.</p>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                        <?php if($product->image): ?>
                            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-48 w-full rounded-2xl object-cover" />
                        <?php else: ?>
                            <div class="mb-4 flex h-48 items-center justify-center rounded-2xl bg-gray-100 text-gray-400">Tidak ada foto</div>
                        <?php endif; ?>
                        <h3 class="mt-6 text-xl font-semibold text-gray-900"><?php echo e($product->name); ?></h3>
                        <p class="mt-2 text-sm text-gray-600"><?php echo e(\Illuminate\Support\Str::limit($product->description, 120)); ?></p>
                        <div class="mt-4 flex items-center justify-between gap-2">
                            <span class="text-lg font-bold text-indigo-600">Rp <?php echo e(number_format($product->price,0,',','.')); ?></span>
                            <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Stok: <?php echo e($product->stock); ?></span>
                        </div>

                        <div class="mt-6 space-y-3">
                            <a href="<?php echo e(route('products.show', $product)); ?>" class="inline-flex w-full justify-center rounded-xl border border-indigo-600 px-4 py-3 text-sm font-semibold text-indigo-600 hover:bg-indigo-50">Lihat Detail</a>

                            <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="grid gap-2">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <div class="grid gap-2 sm:grid-cols-[1fr_120px]">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="rounded-lg border-gray-300 p-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                                    <button type="submit" class="rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Tambah Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 rounded-3xl border border-gray-200 bg-white p-10 text-center text-gray-500 shadow-sm">
                        Belum ada produk tersedia. Silakan tambahkan produk ke katalog terlebih dahulu.
                    </div>
                <?php endif; ?>
            </div>
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
<?php endif; ?>
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp\htdocs\tubes_EBisnis\resources\views/dashboard.blade.php ENDPATH**/ ?>