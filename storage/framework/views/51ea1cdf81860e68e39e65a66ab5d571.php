<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Detail Pesanan #<?php echo e($order->id); ?> <?php $__env->endSlot(); ?>
     <?php $__env->slot('breadcrumb', null, []); ?> 
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="hover:text-blue-500 transition-colors">Pesanan</a> / #<?php echo e($order->id); ?>

     <?php $__env->endSlot(); ?>

    
    <?php if(session('success')): ?>
        <div class="mt-4 flex items-center gap-3 rounded-xl border border-emerald-500/20 bg-emerald-500/10 p-4">
            <svg class="h-5 w-5 flex-none text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <p class="text-sm font-semibold text-emerald-400"><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="mt-4 flex items-center gap-3 rounded-xl border border-red-500/20 bg-red-500/10 p-4">
            <svg class="h-5 w-5 flex-none text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            <p class="text-sm font-semibold text-red-400"><?php echo e(session('error')); ?></p>
        </div>
    <?php endif; ?>

    <div class="mt-4 grid gap-6 lg:grid-cols-[1.6fr_1fr]">

        
        <div class="space-y-5">

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Nomor Pesanan</p>
                        <p class="mt-1 text-3xl font-black text-white">#<?php echo e($order->id); ?></p>
                        <p class="mt-1 text-sm text-slate-500"><?php echo e($order->created_at->format('d F Y, H:i')); ?> WIB</p>
                        <p class="mt-1 text-sm text-slate-500">Pelanggan: <span class="font-bold text-white"><?php echo e($order->user->name); ?></span> (<?php echo e($order->user->email); ?>)</p>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <?php
                            $stColor = match($order->status) {
                                'Menunggu Pembayaran'     => 'bg-yellow-500/10 text-yellow-400 ring-yellow-500/20',
                                'Pembayaran Dikonfirmasi' => 'bg-blue-500/10 text-blue-400 ring-blue-500/20',
                                'Diproses'                => 'bg-indigo-500/10 text-indigo-400 ring-indigo-500/20',
                                'Dikirim'                 => 'bg-purple-500/10 text-purple-400 ring-purple-500/20',
                                'Selesai'                 => 'bg-emerald-500/10 text-emerald-400 ring-emerald-500/20',
                                'Dibatalkan'              => 'bg-red-500/10 text-red-400 ring-red-500/20',
                                default                   => 'bg-slate-500/10 text-slate-400 ring-slate-500/20',
                            };
                            $psColor = match($order->payment_status) {
                                'paid'           => 'bg-emerald-500/10 text-emerald-400 ring-emerald-500/20',
                                'proof_uploaded' => 'bg-blue-500/10 text-blue-400 ring-blue-500/20',
                                'rejected'       => 'bg-red-500/10 text-red-400 ring-red-500/20',
                                default          => 'bg-yellow-500/10 text-yellow-400 ring-yellow-500/20',
                            };
                        ?>
                        <span class="inline-flex items-center rounded-full <?php echo e($stColor); ?> ring-1 px-3 py-1 text-xs font-black">
                            <?php echo e($order->status); ?>

                        </span>
                        <span class="inline-flex items-center rounded-full <?php echo e($psColor); ?> ring-1 px-3 py-1 text-xs font-black">
                            <?php echo e($order->payment_status_label); ?>

                            <?php if($order->payment_status === 'proof_uploaded'): ?>
                                <span class="ml-1.5 h-2 w-2 rounded-full bg-blue-400 animate-pulse"></span>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>

            
            <?php if($order->payment_status === 'proof_uploaded'): ?>
                <div class="rounded-2xl border border-blue-500/30 bg-blue-500/10 p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-blue-300 mb-4">⏳ Bukti Pembayaran Menunggu Konfirmasi</h3>

                    
                    <?php if($order->payment_proof): ?>
                        <div class="mb-5">
                            <p class="text-xs text-slate-400 mb-2">Foto bukti transfer:</p>
                            <a href="<?php echo e(route('admin.orders.view-proof', $order)); ?>" target="_blank">
                                <img src="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>"
                                     alt="Bukti Pembayaran"
                                     class="h-40 rounded-xl object-cover ring-2 ring-blue-500/30 hover:ring-blue-500/60 transition cursor-pointer">
                            </a>
                            <?php if($order->payment_proof_uploaded_at): ?>
                                <p class="mt-1 text-xs text-slate-500">Dikirim: <?php echo e($order->payment_proof_uploaded_at->format('d M Y, H:i')); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        
                        <form action="<?php echo e(route('admin.orders.confirm-payment', $order)); ?>" method="POST" class="flex-1"
                              onsubmit="return confirm('Konfirmasi pembayaran pesanan #<?php echo e($order->id); ?>?')">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                    class="w-full rounded-xl bg-emerald-500 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-500/20 hover:bg-emerald-400 transition-all">
                                ✓ Konfirmasi Pembayaran
                            </button>
                        </form>

                        
                        <div class="flex-1" x-data="{ open: false }">
                            <button @click="open = true"
                                    class="w-full rounded-xl bg-red-500/20 border border-red-500/30 py-3 text-sm font-bold text-red-400 hover:bg-red-500/30 transition-all">
                                ✕ Tolak Bukti
                            </button>

                            
                            <div x-show="open" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
                                 @keydown.escape.window="open = false">
                                <div class="w-full max-w-md rounded-2xl border border-white/10 bg-[#161B29] p-6 shadow-2xl"
                                     @click.stop>
                                    <h3 class="text-base font-bold text-white mb-4">Tolak Bukti Pembayaran</h3>
                                    <form action="<?php echo e(route('admin.orders.reject-payment', $order)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Alasan Penolakan</label>
                                            <textarea name="rejection_reason" rows="3" required
                                                      placeholder="Misal: Nominal tidak sesuai, foto buram, dll."
                                                      class="w-full rounded-xl border border-white/10 bg-[#0B0F1A] px-4 py-3 text-sm text-white placeholder-slate-600 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/20 resize-none"></textarea>
                                        </div>
                                        <div class="mt-4 flex gap-3">
                                            <button type="submit"
                                                    class="flex-1 rounded-xl bg-red-500 py-2.5 text-sm font-bold text-white hover:bg-red-400 transition">
                                                Tolak Bukti
                                            </button>
                                            <button type="button" @click="open = false"
                                                    class="flex-1 rounded-xl border border-white/10 bg-white/5 py-2.5 text-sm font-bold text-slate-400 hover:bg-white/10 transition">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php if($order->payment_proof && $order->payment_status !== 'proof_uploaded'): ?>
                <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                    <h3 class="text-sm font-bold text-white mb-3">📎 Bukti Pembayaran</h3>
                    <div class="flex items-start gap-4">
                        <a href="<?php echo e(route('admin.orders.view-proof', $order)); ?>" target="_blank">
                            <img src="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>"
                                 alt="Bukti Pembayaran"
                                 class="h-24 w-24 rounded-xl object-cover ring-1 ring-white/10 hover:ring-blue-500/40 transition cursor-pointer">
                        </a>
                        <div class="space-y-1.5">
                            <?php if($order->payment_proof_uploaded_at): ?>
                                <p class="text-xs text-slate-500">Dikirim: <?php echo e($order->payment_proof_uploaded_at->format('d M Y, H:i')); ?></p>
                            <?php endif; ?>
                            <?php if($order->payment_status === 'paid'): ?>
                                <span class="inline-flex items-center rounded-full bg-emerald-500/10 text-emerald-400 ring-1 ring-emerald-500/20 px-2.5 py-0.5 text-[10px] font-black">✓ Dikonfirmasi</span>
                            <?php elseif($order->payment_status === 'rejected'): ?>
                                <span class="inline-flex items-center rounded-full bg-red-500/10 text-red-400 ring-1 ring-red-500/20 px-2.5 py-0.5 text-[10px] font-black">✕ Ditolak</span>
                                <?php if($order->payment_rejection_reason): ?>
                                    <p class="text-xs text-red-400/70">Alasan: <?php echo e($order->payment_rejection_reason); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm" x-data="{ status: '<?php echo e($order->status); ?>' }">
                <h3 class="text-sm font-bold text-white mb-5">🔄 Ubah Status Pesanan</h3>

                <form action="<?php echo e(route('admin.orders.update-status', $order)); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Status Pesanan</label>
                        <select name="status" x-model="status"
                                class="w-full rounded-xl border border-white/10 bg-[#0B0F1A] px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <?php $__currentLoopData = ['Menunggu Pembayaran','Pembayaran Dikonfirmasi','Diproses','Dikirim','Selesai','Dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($st); ?>" <?php echo e($order->status === $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div x-show="status === 'Dikirim'" x-transition class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Nomor Resi</label>
                            <input type="text" name="tracking_number" value="<?php echo e($order->tracking_number); ?>"
                                   placeholder="Cth: JNE123456789"
                                   class="w-full rounded-xl border border-white/10 bg-[#0B0F1A] px-4 py-3 text-sm text-white placeholder-slate-600 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Kurir</label>
                            <input type="text" name="courier" value="<?php echo e($order->courier); ?>"
                                   placeholder="JNE, TIKI, SiCepat, dll."
                                   class="w-full rounded-xl border border-white/10 bg-[#0B0F1A] px-4 py-3 text-sm text-white placeholder-slate-600 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                        </div>
                    </div>

                    
                    <div x-show="status === 'Dibatalkan'" x-transition>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Alasan Pembatalan</label>
                        <textarea name="cancel_reason" rows="2"
                                  placeholder="Sampaikan alasan pembatalan kepada pelanggan..."
                                  class="w-full rounded-xl border border-white/10 bg-[#0B0F1A] px-4 py-3 text-sm text-white placeholder-slate-600 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/20 resize-none"><?php echo e($order->cancel_reason); ?></textarea>
                    </div>

                    <button type="submit"
                            onclick="return confirm('Update status pesanan #<?php echo e($order->id); ?>?')"
                            class="w-full rounded-xl bg-blue-600 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 hover:bg-blue-500 transition-all">
                        Simpan Perubahan Status
                    </button>
                </form>
            </div>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <h3 class="text-sm font-bold text-white mb-4">📦 Informasi Pengiriman</h3>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="rounded-xl bg-[#0B0F1A] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat Pengiriman</p>
                        <p class="mt-1 text-sm font-medium text-white"><?php echo e($order->shipping_address); ?></p>
                    </div>
                    <div class="rounded-xl bg-[#0B0F1A] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Metode Pembayaran</p>
                        <p class="mt-1 text-sm font-medium text-white"><?php echo e($order->payment_method_label); ?></p>
                    </div>
                    <?php if($order->tracking_number): ?>
                        <div class="rounded-xl bg-blue-500/10 p-4">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Nomor Resi</p>
                            <p class="mt-1 text-sm font-mono font-bold text-blue-400"><?php echo e($order->tracking_number); ?></p>
                        </div>
                        <div class="rounded-xl bg-blue-500/10 p-4">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Kurir</p>
                            <p class="mt-1 text-sm font-medium text-blue-400"><?php echo e($order->courier); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($order->paid_at): ?>
                        <div class="rounded-xl bg-emerald-500/10 p-4">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-emerald-500/60">Tanggal Lunas</p>
                            <p class="mt-1 text-sm font-medium text-emerald-400"><?php echo e($order->paid_at->format('d M Y, H:i')); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($order->status === 'Dibatalkan' && $order->cancel_reason): ?>
                        <div class="sm:col-span-2 rounded-xl bg-red-500/10 p-4">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-red-500/60">Alasan Pembatalan</p>
                            <p class="mt-1 text-sm text-red-400"><?php echo e($order->cancel_reason); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="lg:sticky lg:top-24 space-y-5">

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Info Pelanggan</h3>
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/20 text-sm font-black text-blue-400">
                        <?php echo e(strtoupper(substr($order->user->name, 0, 1))); ?>

                    </div>
                    <div>
                        <p class="text-sm font-bold text-white"><?php echo e($order->user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($order->user->email); ?></p>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.users.show', $order->user)); ?>"
                   class="mt-4 flex w-full items-center justify-center gap-1 rounded-xl bg-white/5 border border-white/5 py-2 text-xs font-bold text-slate-400 hover:bg-white/10 hover:text-white transition">
                    Lihat Profil Pelanggan →
                </a>
            </div>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Item Pesanan</h3>
                <div class="space-y-3">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start justify-between gap-3 rounded-xl bg-[#0B0F1A] p-3">
                            <div class="flex min-w-0 items-center gap-3">
                                <?php if($item->product && $item->product->image): ?>
                                    <img src="<?php echo e($item->product->image_url); ?>" class="h-10 w-10 flex-none rounded-lg object-cover">
                                <?php else: ?>
                                    <div class="h-10 w-10 flex-none rounded-lg bg-white/5 flex items-center justify-center border border-white/5">
                                        <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
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

                
                <div class="mt-4 space-y-2 border-t border-white/5 pt-4">
                    <?php $subtotal = $order->items->sum(fn($i) => $i->price * $i->quantity); ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">Subtotal</span>
                        <span class="font-medium text-white">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                    </div>
                    <?php if(($order->discount ?? 0) > 0): ?>
                        <div class="flex justify-between text-sm text-emerald-400">
                            <span>Diskon<?php echo e($order->coupon_code ? " ({$order->coupon_code})" : ''); ?></span>
                            <span>- Rp <?php echo e(number_format($order->discount, 0, ',', '.')); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">Ongkos Kirim</span>
                        <span class="font-bold <?php echo e(($order->shipping_cost ?? 0) == 0 ? 'text-emerald-400' : 'text-white'); ?>">
                            <?php echo e(($order->shipping_cost ?? 0) == 0 ? 'GRATIS' : 'Rp ' . number_format($order->shipping_cost, 0, ',', '.')); ?>

                        </span>
                    </div>
                    <div class="flex justify-between border-t border-white/10 pt-3">
                        <span class="text-sm font-bold text-white">Total Bayar</span>
                        <span class="text-xl font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                    </div>
                </div>
            </div>

            <a href="<?php echo e(route('admin.orders.index')); ?>"
               class="flex w-full items-center justify-center gap-2 rounded-xl border border-white/5 bg-white/5 py-3 text-sm font-bold text-slate-400 hover:bg-white/10 hover:text-white transition">
                ← Kembali ke Daftar Pesanan
            </a>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>