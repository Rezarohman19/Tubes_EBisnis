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
                <h2 class="section-heading">💳 Riwayat Pembayaran</h2>
                <p class="section-subheading">Lihat semua transaksi dan status pembayaran Anda</p>
            </div>

            <?php if($orders->isEmpty()): ?>
                <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-gray-200 bg-white py-24 text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-violet-50 to-purple-50">
                        <svg class="h-12 w-12 text-violet-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-gray-900">Belum Ada Pembayaran</h3>
                    <p class="mt-2 max-w-sm text-sm text-gray-500">Anda belum memiliki riwayat pembayaran. Mulai belanja sekarang!</p>
                    <a href="<?php echo e(route('home')); ?>" class="btn-primary mt-6 !text-xs">Mulai Belanja</a>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                            
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Nomor Pesanan</p>
                                    <p class="mt-1 text-lg font-black text-gray-900">#<?php echo e($order->id); ?></p>
                                </div>
                                <div class="text-right">
                                    <?php if($order->payment_status === 'paid'): ?>
                                        <span class="badge-success">
                                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                            Lunas
                                        </span>
                                    <?php else: ?>
                                        <span class="badge-warning">
                                            <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                            Menunggu
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div class="mt-4 grid grid-cols-1 gap-4 border-t border-gray-50 pt-4 md:grid-cols-3">
                                <div class="rounded-xl bg-gray-50 p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Total</p>
                                    <p class="mt-1 text-xl font-black text-gray-900">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                                </div>
                                <div class="rounded-xl bg-gray-50 p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Metode</p>
                                    <p class="mt-1 text-sm font-bold text-gray-900"><?php echo e($order->payment_method_label); ?></p>
                                </div>
                                <div class="rounded-xl bg-gray-50 p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Tanggal</p>
                                    <p class="mt-1 text-sm font-bold text-gray-900"><?php echo e($order->created_at->format('d M Y, H:i')); ?></p>
                                </div>
                            </div>

                            
                            <div class="mt-4 flex flex-wrap gap-3 border-t border-gray-50 pt-4">
                                <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn-ghost !text-xs !py-2 !px-4 !rounded-xl !bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    Detail Pesanan
                                </a>
                                <?php if($order->payment_status !== 'paid'): ?>
                                    <a href="<?php echo e(route('payment.index', $order)); ?>" class="btn-primary !text-xs !py-2 !px-4 !rounded-xl !shadow-sm">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                        Bayar Sekarang
                                    </a>
                                <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/payment/history/index.blade.php ENDPATH**/ ?>