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

            
            <div class="mb-6 flex items-center gap-2 text-sm">
                <a href="<?php echo e(route('cart.index')); ?>" class="font-medium text-gray-400 hover:text-blue-600 transition-colors">Keranjang</a>
                <svg class="h-4 w-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-gray-900">Checkout</span>
            </div>

            
            <?php if(session('success')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('coupon_error')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-red-200/60 bg-gradient-to-r from-red-50 to-rose-50 p-4 shadow-lg shadow-red-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-red-100">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-red-800"><?php echo e(session('coupon_error')); ?></p>
                </div>
            <?php endif; ?>

            
            <div class="mb-8">
                <h2 class="section-heading">💳 Checkout</h2>
                <p class="section-subheading">Lengkapi informasi untuk menyelesaikan pesanan</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-[1fr_400px]">

                
                <div class="space-y-5">
                    <form id="checkoutForm" action="<?php echo e(route('checkout.place')); ?>" method="POST" class="space-y-5">
                        <?php echo csrf_field(); ?>

                        
                        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-xs font-bold text-white shadow-lg shadow-blue-500/30">1</div>
                                <h3 class="text-sm font-bold text-gray-900">Alamat Pengiriman</h3>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Alamat Lengkap</label>
                                <textarea name="shipping_address" rows="3" class="input-field !rounded-xl !text-sm" placeholder="Jl. Contoh No. 1, Kota, Provinsi, Kode Pos" required><?php echo e(old('shipping_address')); ?></textarea>
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

                        
                        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-xs font-bold text-white shadow-lg shadow-blue-500/30">2</div>
                                <h3 class="text-sm font-bold text-gray-900">Metode Pembayaran</h3>
                            </div>
                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mb-3 text-xs text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="payment-option group flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-4 transition-all
                                        <?php echo e(old('payment_method') === $method ? 'border-blue-500 bg-blue-50 shadow-lg shadow-blue-500/10' : 'border-gray-200 hover:border-blue-300 hover:shadow-sm'); ?>">
                                        <input type="radio" name="payment_method" value="<?php echo e($method); ?>" class="sr-only" <?php echo e(old('payment_method') === $method ? 'checked' : ''); ?> required>
                                        <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-white shadow-sm border border-gray-100 transition-all group-hover:shadow-md">
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
                                        <span class="text-xs font-bold text-gray-800 leading-tight"><?php echo e($label); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-sm !shadow-lg">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Buat Pesanan & Bayar
                        </button>
                    </form>
                </div>

                
                <div class="lg:sticky lg:top-24 space-y-5">

                    
                    <div class="rounded-2xl border border-gray-100/80 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">🎟️ Kode Kupon</h3>
                        <?php if($couponCode): ?>
                            <div class="flex items-center justify-between rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3">
                                <div>
                                    <p class="text-sm font-bold text-emerald-800"><?php echo e($couponCode); ?></p>
                                    <p class="text-xs text-emerald-600">Diskon: Rp <?php echo e(number_format($discount, 0, ',', '.')); ?></p>
                                </div>
                                <form action="<?php echo e(route('checkout.coupon.remove')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="rounded-lg bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700 hover:bg-red-200 transition-colors">Hapus</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <form action="<?php echo e(route('checkout.coupon')); ?>" method="POST" class="flex gap-2">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="coupon_code" placeholder="Masukkan kode" class="input-field flex-1 !rounded-xl !text-sm !py-2.5">
                                <button type="submit" class="btn-primary !py-2.5 !px-4 !rounded-xl !text-xs">Pakai</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    
                    <div class="rounded-2xl border border-gray-100/80 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-gray-400 mb-4">Ringkasan</h3>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-gray-50 p-3">
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-gray-900 line-clamp-1"><?php echo e($item['product']->name); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($item['quantity']); ?> × Rp <?php echo e(number_format($item['product']->price, 0, ',', '.')); ?></p>
                                    </div>
                                    <p class="flex-none text-sm font-black text-gray-900">Rp <?php echo e(number_format($item['subtotal'], 0, ',', '.')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-4 space-y-2 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Subtotal</span>
                                <span class="font-medium">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <?php if($discount > 0): ?>
                                <div class="flex justify-between text-sm text-emerald-600">
                                    <span>Diskon (<?php echo e($couponCode); ?>)</span>
                                    <span>- Rp <?php echo e(number_format($discount, 0, ',', '.')); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Ongkos Kirim</span>
                                <span class="font-bold <?php echo e($grandTotal >= 150000 ? 'text-emerald-600' : ''); ?>"><?php echo e($grandTotal >= 150000 ? 'GRATIS' : 'Rp 15.000'); ?></span>
                            </div>
                            <div class="flex justify-between border-t border-gray-200 pt-3">
                                <span class="text-sm font-bold text-gray-900">Total Bayar</span>
                                <span class="text-xl font-black text-gray-900">Rp <?php echo e(number_format($grandTotal, 0, ',', '.')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-50', 'shadow-lg', 'shadow-blue-500/10');
                    label.classList.add('border-gray-200');
                });
                radio.closest('.payment-option').classList.add('border-blue-500', 'bg-blue-50', 'shadow-lg', 'shadow-blue-500/10');
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
<?php endif; ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/checkout.blade.php ENDPATH**/ ?>