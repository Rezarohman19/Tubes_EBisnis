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
            Checkout
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 rounded-2xl border border-indigo-100 bg-indigo-50 p-6">
                        <h3 class="text-lg font-semibold text-indigo-900">Konfirmasi Pesanan</h3>
                        <p class="mt-2 text-sm text-indigo-700">Pilih metode pembayaran dan alamat pengiriman untuk pesanan Frozymart Anda.</p>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-[2fr_1.1fr]">
                        <div class="space-y-6">
                            <form action="<?php echo e(route('checkout.place')); ?>" method="POST" class="space-y-6">
                                <?php echo csrf_field(); ?>

                                <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                                    <h4 class="text-lg font-semibold text-gray-900">Alamat Pengiriman</h4>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Alamat lengkap</label>
                                        <textarea name="shipping_address" rows="4" class="mt-2 w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required><?php echo e(old('shipping_address')); ?></textarea>
                                        <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                                    <h4 class="text-lg font-semibold text-gray-900">Metode Pembayaran</h4>
                                    <div class="mt-4 space-y-3">
                                        <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="flex items-center gap-3 rounded-2xl border p-4 hover:border-indigo-500">
                                                <input type="radio" name="payment_method" value="<?php echo e($method); ?>" class="h-4 w-4 text-indigo-600" <?php echo e(old('payment_method') === $method ? 'checked' : ''); ?> required>
                                                <span class="text-sm font-medium text-gray-800"><?php echo e($label); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <button type="submit" class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-white font-semibold hover:bg-indigo-700">Bayar Sekarang</button>
                            </form>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900">Detail Keranjang</h4>
                            <div class="mt-4 space-y-4">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4">
                                        <div>
                                            <p class="font-semibold text-gray-900"><?php echo e($item['product']->name); ?></p>
                                            <p class="text-sm text-gray-500"><?php echo e($item['quantity']); ?> x Rp <?php echo e(number_format($item['product']->price,0,',','.')); ?></p>
                                        </div>
                                        <p class="font-semibold text-gray-900">Rp <?php echo e(number_format($item['subtotal'],0,',','.')); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="mt-6 border-t border-gray-200 pt-4">
                                <div class="flex items-center justify-between text-gray-700">
                                    <span>Total</span>
                                    <span class="text-lg font-semibold text-gray-900">Rp <?php echo e(number_format($subtotal,0,',','.')); ?></span>
                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp\htdocs\tubes_EBisnis\resources\views/checkout.blade.php ENDPATH**/ ?>