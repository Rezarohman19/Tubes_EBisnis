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
            Keranjang Belanja
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if(session('success')): ?>
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(count($items) === 0): ?>
                <div class="rounded-3xl border border-gray-200 bg-white p-10 text-center text-gray-600 shadow-sm">
                    Keranjang Anda kosong. Silakan kembali ke katalog untuk memilih produk.
                </div>
            <?php else: ?>
                <div class="grid gap-6 lg:grid-cols-[2fr_1fr]">
                    <div class="space-y-4">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900"><?php echo e($item['product']->name); ?></h3>
                                        <p class="mt-1 text-sm text-gray-500">Rp <?php echo e(number_format($item['product']->price,0,',','.')); ?> per unit</p>
                                    </div>

                                    <div class="space-y-3">
                                        <form action="<?php echo e(route('cart.update', $item['product'])); ?>" method="POST" class="grid gap-2 sm:grid-cols-[120px_120px]">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" max="<?php echo e($item['product']->stock); ?>" class="rounded-xl border-gray-300 p-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                                            <button type="submit" class="rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Perbarui</button>
                                        </form>

                                        <form action="<?php echo e(route('cart.remove', $item['product'])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-4 text-sm text-gray-600">
                                    <span>Subtotal</span>
                                    <span class="font-semibold text-gray-900">Rp <?php echo e(number_format($item['subtotal'],0,',','.')); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
                        <div class="mt-5 space-y-4">
                            <div class="flex items-center justify-between text-gray-700">
                                <span>Total</span>
                                <span class="text-xl font-semibold text-gray-900">Rp <?php echo e(number_format($subtotal,0,',','.')); ?></span>
                            </div>
                        </div>

                        <div class="mt-6 space-y-3">
                            <a href="<?php echo e(route('checkout')); ?>" class="block rounded-2xl bg-indigo-600 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-indigo-700">Lanjut ke Checkout</a>
                            <a href="<?php echo e(route('dashboard')); ?>" class="block rounded-2xl border border-gray-200 bg-white px-4 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-100">Kembali ke Katalog</a>
                        </div>
                    </div>
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
<?php endif; ?>
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp\htdocs\tubes_EBisnis\resources\views/cart.blade.php ENDPATH**/ ?>