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

            
            <?php $__currentLoopData = ['success' => 'emerald', 'error' => 'red', 'info' => 'blue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(session($type)): ?>
                    <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-<?php echo e($color); ?>-500/20 bg-<?php echo e($color); ?>-500/10 p-4">
                        <svg class="h-5 w-5 flex-none text-<?php echo e($color); ?>-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <?php if($type === 'error'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            <?php else: ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            <?php endif; ?>
                        </svg>
                        <p class="text-sm font-semibold text-<?php echo e($color); ?>-400"><?php echo e(session($type)); ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                        'Menunggu Pembayaran'     => ['bg' => 'bg-[#F59E0B]/10', 'text' => 'text-[#F59E0B]', 'ring' => 'ring-[#F59E0B]/20', 'dot' => 'bg-[#F59E0B]'],
                                        'Pembayaran Dikonfirmasi' => ['bg' => 'bg-blue-500/10',   'text' => 'text-blue-500',   'ring' => 'ring-blue-500/20',   'dot' => 'bg-blue-500'],
                                        'Diproses'                => ['bg' => 'bg-blue-500/10',   'text' => 'text-blue-500',   'ring' => 'ring-blue-500/20',   'dot' => 'bg-blue-500'],
                                        'Dikirim'                 => ['bg' => 'bg-indigo-500/10', 'text' => 'text-indigo-500', 'ring' => 'ring-indigo-500/20', 'dot' => 'bg-indigo-500'],
                                        'Selesai'                 => ['bg' => 'bg-[#10B981]/10',  'text' => 'text-[#10B981]',  'ring' => 'ring-[#10B981]/20',  'dot' => 'bg-[#10B981]'],
                                        'Dibatalkan'              => ['bg' => 'bg-[#EF4444]/10',  'text' => 'text-[#EF4444]',  'ring' => 'ring-[#EF4444]/20',  'dot' => 'bg-[#EF4444]'],
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
                                <?php elseif($order->payment_status === 'proof_uploaded'): ?>
                                    <span class="badge-info">⏳ Menunggu Verifikasi</span>
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

                    
                    <?php if($order->payment_proof): ?>
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <h3 class="text-sm font-bold text-white mb-4">📎 Bukti Pembayaran</h3>
                            <div class="flex items-start gap-4">
                                <a href="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>"
                                         alt="Bukti Pembayaran"
                                         class="h-32 w-32 rounded-xl object-cover ring-2 ring-white/5 hover:ring-blue-500/50 transition">
                                </a>
                                <div class="space-y-2">
                                    <?php if($order->payment_proof_uploaded_at): ?>
                                        <p class="text-xs text-slate-500">Dikirim: <?php echo e($order->payment_proof_uploaded_at->format('d M Y, H:i')); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->payment_status === 'proof_uploaded'): ?>
                                        <span class="badge-info text-[10px]">⏳ Menunggu Verifikasi Admin</span>
                                    <?php elseif($order->payment_status === 'paid'): ?>
                                        <span class="badge-success text-[10px]">✓ Dikonfirmasi</span>
                                    <?php elseif($order->payment_status === 'rejected'): ?>
                                        <div>
                                            <span class="badge-danger text-[10px]">✕ Ditolak</span>
                                            <?php if($order->payment_rejection_reason): ?>
                                                <p class="mt-1 text-xs text-red-400"><?php echo e($order->payment_rejection_reason); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">📦 Informasi Pengiriman</h3>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
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
                        <?php if($order->status === 'Dikirim'): ?>
                            <form action="<?php echo e(route('orders.complete', $order)); ?>" method="POST" class="flex-1"
                                  onsubmit="return confirm('Konfirmasi pesanan sudah diterima?')">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 py-3 text-xs font-bold text-white shadow-lg shadow-emerald-500/30 transition-all hover:shadow-xl">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Pesanan Sudah Diterima
                                </button>
                            </form>
                        <?php endif; ?>
                        <?php if($order->canUploadProof()): ?>
                            <a href="<?php echo e(route('payment.index', $order)); ?>"
                               class="btn-primary flex-1 !py-3 !rounded-xl !text-xs text-center">
                                💳 Bayar / Upload Bukti
                            </a>
                        <?php elseif($order->payment_status !== 'paid' && !$order->isCod() && $order->status !== 'Dibatalkan'): ?>
                            <a href="<?php echo e(route('payment.index', $order)); ?>"
                               class="btn-secondary flex-1 !py-3 !rounded-xl !text-xs text-center">
                                Lihat Info Pembayaran
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if($order->status === 'Dibatalkan' && $order->cancel_reason): ?>
                        <div class="rounded-2xl border border-red-500/20 bg-red-500/10 p-5">
                            <p class="text-xs font-bold text-red-400">⚠ Alasan Pembatalan:</p>
                            <p class="mt-1 text-sm text-red-400/80"><?php echo e($order->cancel_reason); ?></p>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($order->status === 'Selesai'): ?>
                        <?php
                            $reviewedIds = $order->items
                                ->filter(fn($i) => $i->product)
                                ->map(fn($i) => $i->product_id)
                                ->filter(fn($pid) => \App\Models\Review::where('order_id', $order->id)
                                    ->where('user_id', Auth::id())
                                    ->where('product_id', $pid)
                                    ->exists()
                                )->values()->toArray();

                            $allReviewed = $order->items
                                ->filter(fn($i) => $i->product)
                                ->every(fn($i) => in_array($i->product_id, $reviewedIds));

                            $hasAnyReview = count($reviewedIds) > 0;
                        ?>

                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <div class="flex items-center justify-between mb-5">
                                <div>
                                    <h3 class="text-sm font-bold text-white">⭐ Ulasan Produk</h3>
                                    <p class="text-xs text-slate-500 mt-1">
                                        <?php if($allReviewed): ?>
                                            Semua produk sudah diulas. Terima kasih!
                                        <?php elseif($hasAnyReview): ?>
                                            <?php echo e(count($reviewedIds)); ?> dari <?php echo e($order->items->filter(fn($i)=>$i->product)->count()); ?> produk sudah diulas.
                                        <?php else: ?>
                                            Bagikan pengalaman Anda tentang produk ini.
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php if(!$allReviewed): ?>
                                    <a href="<?php echo e(route('reviews.create', $order)); ?>"
                                       class="btn-primary !text-xs !py-2 !px-5 !rounded-xl">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <?php echo e($hasAnyReview ? 'Lanjut Ulas' : 'Beri Ulasan'); ?>

                                    </a>
                                <?php endif; ?>
                            </div>

                            
                            <?php if($hasAnyReview): ?>
                                <div class="space-y-3">
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!$item->product): ?> <?php continue; ?> <?php endif; ?>
                                        <?php
                                            $review = \App\Models\Review::where('order_id', $order->id)
                                                ->where('user_id', Auth::id())
                                                ->where('product_id', $item->product_id)
                                                ->first();
                                        ?>
                                        <?php if($review): ?>
                                            <div class="rounded-xl bg-[#0B0F1A] p-4 border border-white/5">
                                                <div class="flex items-start gap-3">
                                                    <?php if($item->product->image): ?>
                                                        <img src="<?php echo e($item->product->image_url); ?>" class="h-10 w-10 rounded-lg object-cover flex-none">
                                                    <?php endif; ?>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-bold text-white"><?php echo e($item->product->name); ?></p>
                                                        <div class="mt-1 flex items-center gap-1">
                                                            <?php for($star = 1; $star <= 5; $star++): ?>
                                                                <svg class="h-4 w-4 <?php echo e($star <= $review->rating ? 'fill-amber-400 text-amber-400' : 'fill-slate-700 text-slate-700'); ?>" viewBox="0 0 20 20">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                                </svg>
                                                            <?php endfor; ?>
                                                            <span class="ml-1 text-xs text-slate-500"><?php echo e($review->created_at->format('d M Y')); ?></span>
                                                        </div>
                                                        <?php if($review->comment): ?>
                                                            <p class="mt-2 text-sm text-slate-400"><?php echo e($review->comment); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($allReviewed): ?>
                                <div class="mt-4 flex items-center gap-2 rounded-xl bg-emerald-500/10 border border-emerald-500/20 p-3">
                                    <svg class="h-5 w-5 flex-none text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <p class="text-xs font-bold text-emerald-400">Terima kasih sudah memberikan ulasan!</p>
                                </div>
                            <?php endif; ?>
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
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Ongkos Kirim</span>
                                <span class="font-bold <?php echo e(($order->shipping_cost ?? 0) == 0 ? 'text-[#10B981]' : 'text-white'); ?>">
                                    <?php echo e(($order->shipping_cost ?? 0) == 0 ? 'GRATIS' : 'Rp ' . number_format($order->shipping_cost, 0, ',', '.')); ?>

                                </span>
                            </div>
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