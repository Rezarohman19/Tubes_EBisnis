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

            
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h2 class="section-heading">📋 Pesanan Saya</h2>
                    <p class="section-subheading">Pantau status pesanan dan lakukan pembayaran</p>
                </div>
                <a href="<?php echo e(route('home')); ?>" class="btn-primary !text-xs !py-2 !px-5 !rounded-xl">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Belanja Lagi
                </a>
            </div>

            <?php if($orders->isEmpty()): ?>
                <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-white/5 bg-[#161B29] py-24 text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A]">
                        <svg class="h-12 w-12 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Belum Ada Pesanan</h3>
                    <p class="mt-2 text-sm text-slate-500">Mulai belanja untuk membuat pesanan pertama Anda!</p>
                    <a href="<?php echo e(route('home')); ?>" class="btn-primary mt-6 !text-xs">Belanja Sekarang</a>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $statusMap = [
                                'Menunggu Pembayaran' => ['bg' => 'bg-[#F59E0B]/10', 'text' => 'text-[#F59E0B]', 'ring' => 'ring-[#F59E0B]/20', 'dot' => 'bg-[#F59E0B]'],
                                'Diproses' => ['bg' => 'bg-blue-500/10', 'text' => 'text-blue-500', 'ring' => 'ring-blue-500/20', 'dot' => 'bg-blue-500'],
                                'Dikirim' => ['bg' => 'bg-indigo-500/10', 'text' => 'text-indigo-500', 'ring' => 'ring-indigo-500/20', 'dot' => 'bg-indigo-500'],
                                'Selesai' => ['bg' => 'bg-[#10B981]/10', 'text' => 'text-[#10B981]', 'ring' => 'ring-[#10B981]/20', 'dot' => 'bg-[#10B981]'],
                                'Dibatalkan' => ['bg' => 'bg-[#EF4444]/10', 'text' => 'text-[#EF4444]', 'ring' => 'ring-[#EF4444]/20', 'dot' => 'bg-[#EF4444]'],
                            ];
                            $s = $statusMap[$order->status] ?? ['bg' => 'bg-slate-500/10', 'text' => 'text-slate-500', 'ring' => 'ring-slate-500/20', 'dot' => 'bg-slate-500'];
                        ?>
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm transition-all hover:shadow-xl hover:border-white/10">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <h4 class="text-lg font-black text-white">Pesanan #<?php echo e($order->id); ?></h4>
                                        <span class="inline-flex items-center gap-1.5 rounded-full <?php echo e($s['bg']); ?> px-3 py-1 text-xs font-bold <?php echo e($s['text']); ?> ring-1 <?php echo e($s['ring']); ?>">
                                            <span class="h-1.5 w-1.5 rounded-full <?php echo e($s['dot']); ?>"></span>
                                            <?php echo e($order->status); ?>

                                        </span>
                                    </div>
                                    <p class="mt-1 text-xs text-slate-500"><?php echo e($order->created_at->format('d M Y, H:i')); ?> • <?php echo e($order->payment_method_label); ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-slate-500">Total Pembayaran</p>
                                    <p class="text-xl font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                                    <?php if($order->payment_status === 'paid'): ?>
                                        <span class="badge-success mt-1 !text-[10px]">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            Lunas
                                        </span>
                                    <?php else: ?>
                                        <span class="badge-warning mt-1 !text-[10px]">Belum Bayar</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-col gap-3 border-t border-white/5 pt-4 sm:flex-row sm:items-center sm:justify-end">
                                <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn-primary !text-xs !py-2 !px-5 !rounded-xl !shadow-sm">Lihat Detail</a>
                                <?php if($order->payment_status !== 'paid' && $order->status !== 'Dibatalkan'): ?>
                                    <a href="<?php echo e(route('payment.index', $order)); ?>" class="btn-secondary !text-xs !py-2 !px-5 !rounded-xl">Bayar Sekarang</a>
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
<?php endif; ?>
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/orders/index.blade.php ENDPATH**/ ?>