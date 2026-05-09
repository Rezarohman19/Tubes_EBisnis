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
                    <p class="text-[10px] font-medium uppercase tracking-widest text-gray-400">Checkout</p>
                </div>
            </div>
            <a href="<?php echo e(route('cart.index')); ?>" class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                ← Kembali ke Keranjang
            </a>
        </nav>
     <?php $__env->endSlot(); ?>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <?php if(session('success')): ?>
                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                    <svg class="h-5 w-5 flex-none text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('coupon_error')): ?>
                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                    <svg class="h-5 w-5 flex-none text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?php echo e(session('coupon_error')); ?>

                </div>
            <?php endif; ?>

            <div class="grid gap-6 lg:grid-cols-[2fr_1.2fr]">

                
                <div class="space-y-5">

                    
                    <form id="checkoutForm" action="<?php echo e(route('checkout.place')); ?>" method="POST" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                            <h3 class="text-base font-bold text-gray-900">1. Alamat Pengiriman</h3>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Alamat lengkap</label>
                                <textarea name="shipping_address" rows="3"
                                    class="mt-2 w-full rounded-xl border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Jl. Contoh No. 1, Kota, Provinsi, Kode Pos"
                                    required><?php echo e(old('shipping_address')); ?></textarea>
                                <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                            <h3 class="text-base font-bold text-gray-900">2. Metode Pembayaran</h3>
                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="payment-option flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-3 transition-all
                                        <?php echo e(old('payment_method') === $method ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-blue-300'); ?>">
                                        <input type="radio" name="payment_method" value="<?php echo e($method); ?>"
                                            class="sr-only"
                                            <?php echo e(old('payment_method') === $method ? 'checked' : ''); ?> required>
                                        <div class="flex h-9 w-9 flex-none items-center justify-center rounded-xl bg-white shadow-sm border border-gray-100">
                                            <?php switch($method):
                                                case ('dana'): ?>    <span class="text-sm font-extrabold text-blue-600">D</span>  <?php break; ?>
                                                <?php case ('gopay'): ?>   <span class="text-sm font-extrabold text-green-600">Go</span> <?php break; ?>
                                                <?php case ('ovo'): ?>     <span class="text-sm font-extrabold text-purple-600">OV</span><?php break; ?>
                                                <?php case ('shopee_pay'): ?> <span class="text-sm font-extrabold text-orange-500">S</span> <?php break; ?>
                                                <?php case ('qris'): ?>
                                                    <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h6v6H3V3zm12 0h6v6h-6V3zM3 15h6v6H3v-6zm12 0h6v6h-6v-6zM9 9h6v6H9V9z"/></svg>
                                                    <?php break; ?>
                                                <?php case ('bank_transfer'): ?>
                                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                    <?php break; ?>
                                            <?php endswitch; ?>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-800 leading-tight"><?php echo e($label); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 py-4 text-sm font-bold text-white shadow-lg shadow-blue-500/30 transition-all hover:scale-[1.01] hover:shadow-xl">
                            Buat Pesanan & Bayar →
                        </button>
                    </form>
                </div>

                
                <div class="space-y-5">

                    
                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Punya Kode Kupon?</h3>
                        <?php if($couponCode): ?>
                            <div class="mt-3 flex items-center justify-between rounded-xl bg-green-50 border border-green-200 px-4 py-3">
                                <div>
                                    <p class="text-sm font-bold text-green-800"><?php echo e($couponCode); ?></p>
                                    <p class="text-xs text-green-600">Diskon: Rp <?php echo e(number_format($discount, 0, ',', '.')); ?></p>
                                </div>
                                <form action="<?php echo e(route('checkout.coupon.remove')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="rounded-lg bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-200">Hapus</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <form action="<?php echo e(route('checkout.coupon')); ?>" method="POST" class="mt-3 flex gap-2">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="coupon_code" placeholder="Masukkan kode kupon"
                                    class="flex-1 rounded-xl border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-blue-500">
                                <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">Pakai</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    
                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Ringkasan Pesanan</h3>
                        <div class="mt-4 space-y-3">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-gray-50 p-3">
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 line-clamp-1"><?php echo e($item['product']->name); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($item['quantity']); ?> × Rp <?php echo e(number_format($item['product']->price, 0, ',', '.')); ?></p>
                                    </div>
                                    <p class="flex-none text-sm font-bold text-gray-900">Rp <?php echo e(number_format($item['subtotal'], 0, ',', '.')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-4 space-y-2 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <?php if($discount > 0): ?>
                                <div class="flex justify-between text-sm text-green-600">
                                    <span>Diskon Kupon (<?php echo e($couponCode); ?>)</span>
                                    <span>- Rp <?php echo e(number_format($discount, 0, ',', '.')); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Ongkos Kirim</span>
                                <span class="text-green-600 font-semibold"><?php echo e($grandTotal >= 150000 ? 'GRATIS' : 'Rp 15.000'); ?></span>
                            </div>
                            <div class="flex justify-between border-t border-gray-200 pt-3 text-base font-extrabold text-gray-900">
                                <span>Total Bayar</span>
                                <span>Rp <?php echo e(number_format($grandTotal, 0, ',', '.')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Highlight payment method saat dipilih
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-50');
                    label.classList.add('border-gray-200');
                });
                radio.closest('.payment-option').classList.add('border-blue-500', 'bg-blue-50');
                radio.closest('.payment-option').classList.remove('border-gray-200');
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/checkout.blade.php ENDPATH**/ ?>