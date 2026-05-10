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
                <a href="<?php echo e(route('orders.index')); ?>" class="font-medium text-slate-500 hover:text-blue-500 transition-colors">Pesanan</a>
                <svg class="h-4 w-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-white">Detail #<?php echo e($order->id); ?></span>
            </div>

            
            <?php if(session('success')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-red-200/60 bg-gradient-to-r from-red-50 to-rose-50 p-4 shadow-lg shadow-red-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-red-100">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-red-800"><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('info')): ?>
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-blue-200/60 bg-gradient-to-r from-blue-50 to-indigo-50 p-4 shadow-lg shadow-blue-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-blue-100">
                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-blue-800"><?php echo e(session('info')); ?></p>
                </div>
            <?php endif; ?>

            <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr]">

                
                <div class="space-y-5">

                    
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Nomor Pesanan</p>
                                <p class="mt-1 text-3xl font-black text-white">#<?php echo e($order->id); ?></p>
                                <p class="mt-1 text-sm text-slate-500"><?php echo e($order->created_at->format('d F Y, H:i')); ?> WIB</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
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
                                <span class="inline-flex items-center gap-1.5 rounded-full <?php echo e($s['bg']); ?> px-3 py-1.5 text-xs font-bold <?php echo e($s['text']); ?> ring-1 <?php echo e($s['ring']); ?>">
                                    <span class="h-2 w-2 rounded-full <?php echo e($s['dot']); ?>"></span>
                                    <?php echo e($order->status); ?>

                                </span>
                                <?php if($order->payment_status === 'paid'): ?>
                                    <span class="badge-success">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        Lunas
                                    </span>
                                <?php else: ?>
                                    <span class="badge-warning">Belum Dibayar</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <?php
                            $steps = ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai'];
                            $currentStep = array_search($order->status, $steps);
                            if ($currentStep === false) $currentStep = -1;
                        ?>
                        <?php if($order->status !== 'Dibatalkan'): ?>
                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex flex-col items-center <?php echo e($i < count($steps) - 1 ? 'flex-1' : ''); ?>">
                                            <div class="flex items-center w-full">
                                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-full text-xs font-bold transition-all
                                                    <?php echo e($i <= $currentStep ? 'bg-blue-500 text-white shadow-lg shadow-blue-500/30' : 'bg-[#0B0F1A] text-slate-700 border border-white/5'); ?>">
                                                    <?php if($i < $currentStep): ?>
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                                    <?php else: ?>
                                                        <?php echo e($i + 1); ?>

                                                    <?php endif; ?>
                                                </div>
                                                <?php if($i < count($steps) - 1): ?>
                                                    <div class="flex-1 h-0.5 mx-2 rounded-full <?php echo e($i < $currentStep ? 'bg-blue-500' : 'bg-white/5'); ?> transition-all"></div>
                                                <?php endif; ?>
                                            </div>
                                            <p class="mt-2 text-center text-[10px] font-bold <?php echo e($i <= $currentStep ? 'text-blue-500' : 'text-slate-700'); ?>">
                                                <?php echo e($step); ?>

                                            </p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">📦 Informasi Pengiriman</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-xl bg-[#0B0F1A] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat</p>
                                <p class="mt-1 text-sm font-medium text-white"><?php echo e($order->shipping_address); ?></p>
                            </div>
                            <div class="rounded-xl bg-[#0B0F1A] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Metode Bayar</p>
                                <p class="mt-1 text-sm font-medium text-white"><?php echo e($order->payment_method_label); ?></p>
                            </div>
                            <?php if($order->tracking_number): ?>
                                <div class="rounded-xl bg-blue-500/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Nomor Resi</p>
                                    <p class="mt-1 text-sm font-mono font-bold text-blue-500"><?php echo e($order->tracking_number); ?></p>
                                </div>
                                <div class="rounded-xl bg-blue-500/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Kurir</p>
                                    <p class="mt-1 text-sm font-medium text-blue-500"><?php echo e($order->courier); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if($order->paid_at): ?>
                                <div class="rounded-xl bg-[#10B981]/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#10B981]/60">Tanggal Bayar</p>
                                    <p class="mt-1 text-sm font-medium text-[#10B981]"><?php echo e($order->paid_at->format('d M Y, H:i')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <?php if($order->payment_status !== 'paid'): ?>
                            <form action="<?php echo e(route('orders.payment.confirm', $order)); ?>" method="POST" class="flex-1">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn-primary w-full !py-3 !rounded-xl !text-xs">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Konfirmasi Pembayaran
                                </button>
                            </form>
                        <?php endif; ?>
                        <?php if($order->status === 'Dikirim'): ?>
                            <form action="<?php echo e(route('orders.complete', $order)); ?>" method="POST" class="flex-1" onsubmit="return confirm('Konfirmasi pesanan sudah diterima?')">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 py-3 text-xs font-bold text-white shadow-lg shadow-emerald-500/30 transition-all hover:shadow-xl">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Pesanan Sudah Diterima
                                </button>
                            </form>
                        <?php endif; ?>
                        <?php if($order->payment_status !== 'paid' && $order->status !== 'Dibatalkan'): ?>
                            <a href="<?php echo e(route('payment.index', $order)); ?>" class="btn-secondary flex-1 !py-3 !rounded-xl !text-xs">Bayar Sekarang</a>
                        <?php endif; ?>
                    </div>

                    <?php if($order->status === 'Dibatalkan' && $order->cancel_reason): ?>
                        <div class="rounded-2xl border border-red-200/60 bg-red-50 p-5">
                            <p class="text-xs font-bold text-red-800">⚠ Alasan Pembatalan:</p>
                            <p class="mt-1 text-sm text-red-700"><?php echo e($order->cancel_reason); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">Item Pesanan</h3>
                        <div class="mt-4 space-y-3">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-[#0B0F1A] p-3">
                                    <div class="flex min-w-0 items-center gap-3">
                                        <?php if($item->product && $item->product->image): ?>
                                            <img src="<?php echo e($item->product->image_url); ?>" class="h-12 w-12 rounded-xl object-cover flex-none">
                                        <?php else: ?>
                                            <div class="h-12 w-12 flex-none rounded-xl bg-white/5 flex items-center justify-center border border-white/5">
                                                <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        <?php endif; ?>
                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-white line-clamp-1"><?php echo e($item->product->name ?? 'Produk dihapus'); ?></p>
                                            <p class="text-xs text-slate-500"><?php echo e($item->quantity); ?> × Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                                        </div>
                                    </div>
                                    <p class="flex-none text-sm font-black text-white">Rp <?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <div class="mt-5 space-y-2 border-t border-white/5 pt-4">
                            <?php $subtotal = $order->items->sum(fn($i) => $i->price * $i->quantity); ?>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Subtotal</span>
                                <span class="font-medium text-white">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <?php if($order->discount > 0): ?>
                                <div class="flex justify-between text-sm text-[#10B981]">
                                    <span>Diskon<?php echo e($order->coupon_code ? " ({$order->coupon_code})" : ''); ?></span>
                                    <span>- Rp <?php echo e(number_format($order->discount, 0, ',', '.')); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-between border-t border-white/10 pt-3">
                                <span class="text-sm font-bold text-white">Total Bayar</span>
                                <span class="text-xl font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
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
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/orders/show.blade.php ENDPATH**/ ?>