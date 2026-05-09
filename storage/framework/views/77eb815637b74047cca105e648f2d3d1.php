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
                <a href="<?php echo e(route('orders.index')); ?>" class="font-medium text-gray-400 hover:text-blue-600 transition-colors">Pesanan</a>
                <svg class="h-4 w-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-gray-900">Pembayaran #<?php echo e($order->id); ?></span>
            </div>

            
            <div class="mb-8">
                <h2 class="section-heading">💳 Pembayaran</h2>
                <p class="section-subheading">Selesaikan pembayaran untuk pesanan #<?php echo e($order->id); ?></p>
            </div>

            
            <?php if($order->payment_status === 'paid'): ?>
                <div class="mb-8 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-6">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100">
                            <svg class="h-7 w-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <p class="text-lg font-black text-emerald-800">Pembayaran Berhasil! ✓</p>
                            <p class="text-sm text-emerald-600">Pesanan Anda sedang diproses. Terima kasih!</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid gap-8 lg:grid-cols-[1fr_400px]">

                
                <div class="space-y-5">
                    <form action="<?php echo e(route('payment.process', $order->id)); ?>" method="POST" class="space-y-5">
                        <?php echo csrf_field(); ?>

                        
                        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50">
                                    <svg class="h-5 w-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">Pilih Metode Pembayaran</h3>
                                    <p class="text-xs text-gray-500">Pilih metode yang paling nyaman untuk Anda</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="payment-option group flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-4 transition-all
                                        <?php echo e(old('payment_method', $order->payment_method) === $method ? 'border-blue-500 bg-blue-50 shadow-lg shadow-blue-500/10' : 'border-gray-200 hover:border-blue-300 hover:shadow-sm'); ?>">
                                        <input type="radio" name="payment_method" value="<?php echo e($method); ?>" class="sr-only" <?php echo e(old('payment_method', $order->payment_method) === $method ? 'checked' : ''); ?> required>
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
                                        <span class="text-xs font-bold text-gray-800"><?php echo e($label); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="col-span-2 text-xs text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm">
                            <h4 class="text-sm font-bold text-gray-900 mb-4">📋 Informasi Pembayaran</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between rounded-xl bg-gray-50 p-3">
                                    <span class="text-gray-500">No. Pesanan</span>
                                    <span class="font-bold text-gray-900">#<?php echo e($order->id); ?></span>
                                </div>
                                <div class="flex justify-between rounded-xl bg-gray-50 p-3">
                                    <span class="text-gray-500">Tanggal</span>
                                    <span class="font-medium text-gray-900"><?php echo e($order->created_at->format('d F Y, H:i')); ?></span>
                                </div>
                                <div class="flex justify-between rounded-xl p-3 <?php echo e($order->payment_status === 'paid' ? 'bg-emerald-50' : 'bg-amber-50'); ?>">
                                    <span class="<?php echo e($order->payment_status === 'paid' ? 'text-emerald-600' : 'text-amber-600'); ?>">Status</span>
                                    <span class="font-bold <?php echo e($order->payment_status === 'paid' ? 'text-emerald-700' : 'text-amber-700'); ?>">
                                        <?php echo e($order->payment_status === 'paid' ? '✓ Lunas' : '⏳ Menunggu'); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php if($order->payment_status !== 'paid'): ?>
                            <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-sm !shadow-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Konfirmasi Pembayaran
                            </button>
                        <?php endif; ?>
                    </form>
                </div>

                
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-gray-400 mb-4">Detail Pesanan</h3>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center justify-between gap-4 rounded-xl bg-gray-50 p-3">
                                    <div>
                                        <p class="text-sm font-bold text-gray-900"><?php echo e($item->product->name); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($item->quantity); ?> × Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                                    </div>
                                    <p class="text-sm font-black text-gray-900">Rp <?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-5 border-t border-gray-100 pt-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-gray-900">Total Pembayaran</span>
                                <span class="text-2xl font-black text-gray-900">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                            </div>
                        </div>

                        <div class="mt-5 rounded-2xl bg-blue-50 p-4">
                            <p class="text-xs text-blue-700">
                                <strong>📝 Catatan:</strong> Setelah pembayaran, pesanan akan segera diproses. Anda dapat melihat status di halaman pesanan.
                            </p>
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
<?php endif; ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/payment/index.blade.php ENDPATH**/ ?>