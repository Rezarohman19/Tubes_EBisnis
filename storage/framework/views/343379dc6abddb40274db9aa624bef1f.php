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
                                    <div class="mt-4 grid grid-cols-2 gap-3">
                                        <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="flex items-center gap-3 rounded-2xl border p-4 hover:border-indigo-500 cursor-pointer <?php echo e(old('payment_method') === $method ? 'border-indigo-500 bg-indigo-50' : ''); ?>">
                                                <input type="radio" name="payment_method" value="<?php echo e($method); ?>" class="sr-only" <?php echo e(old('payment_method') === $method ? 'checked' : ''); ?> required>
                                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white shadow-sm">
                                                    <?php switch($method):
                                                        case ('dana'): ?>
                                                            <span class="text-lg font-bold text-blue-600">D</span>
                                                            <?php break; ?>
                                                        <?php case ('qris'): ?>
                                                            <svg class="h-6 w-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h6v6H3V3zm12 0h6v6h-6V3zM3 15h6v6H3v-6zm12 0h6v6h-6v-6zM9 9h6v6H9V9z"/></svg>
                                                            <?php break; ?>
                                                        <?php case ('gopay'): ?>
                                                            <span class="text-lg font-bold text-green-600">Go</span>
                                                            <?php break; ?>
                                                        <?php case ('ovo'): ?>
                                                            <span class="text-lg font-bold text-purple-600">OV</span>
                                                            <?php break; ?>
                                                        <?php case ('shopee_pay'): ?>
                                                            <span class="text-lg font-bold text-orange-500">S</span>
                                                            <?php break; ?>
                                                        <?php case ('bank_transfer'): ?>
                                                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                            <?php break; ?>
                                                    <?php endswitch; ?>
                                                </div>
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
<?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/checkout.blade.php ENDPATH**/ ?>