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
            <?php echo e($product->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[1.4fr_1fr]">
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    <?php if($product->image): ?>
                        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-96 w-full rounded-3xl object-cover" />
                    <?php else: ?>
                        <div class="mb-6 flex h-96 items-center justify-center rounded-3xl bg-gray-100 text-gray-400">Tidak ada foto produk</div>
                    <?php endif; ?>

                    <div class="mt-8 space-y-5">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900"><?php echo e($product->name); ?></h3>
                            <p class="mt-3 text-gray-600"><?php echo e($product->description); ?></p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-gray-50 p-5">
                                <p class="text-sm text-gray-500">Harga</p>
                                <p class="mt-2 text-2xl font-semibold text-gray-900">Rp <?php echo e(number_format($product->price,0,',','.')); ?></p>
                            </div>
                            <div class="rounded-2xl bg-gray-50 p-5">
                                <p class="text-sm text-gray-500">Ketersediaan</p>
                                <p class="mt-2 text-xl font-semibold text-gray-900"><?php echo e($product->stock); ?> pcs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="space-y-6">
                        <div class="rounded-3xl bg-indigo-50 p-5">
                            <h3 class="text-lg font-semibold text-indigo-900">Selesaikan pembelian</h3>
                            <p class="mt-2 text-sm text-indigo-700">Tambahkan produk ini ke keranjang dan lanjutkan ke checkout.</p>
                        </div>

                        <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="space-y-4">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <div>
                                <label class="text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="mt-2 w-full rounded-xl border-gray-300 p-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                            <button type="submit" class="w-full rounded-2xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Tambah ke Keranjang</button>
                        </form>

                        <a href="<?php echo e(route('cart.index')); ?>" class="block rounded-2xl border border-gray-200 bg-white px-4 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50">Lihat Keranjang</a>
                    </div>
                </div>
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
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp\htdocs\tubes_EBisnis\resources\views/products/show.blade.php ENDPATH**/ ?>