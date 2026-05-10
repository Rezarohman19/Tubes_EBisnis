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
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="hover:text-blue-500 transition-colors">Daftar Pesanan</a> / #<?php echo e($order->id); ?>

     <?php $__env->endSlot(); ?>

    <div class="mt-4 grid grid-cols-1 gap-6 lg:grid-cols-3">

        
        <div class="lg:col-span-2 space-y-5">

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Status Pesanan</p>
                        <?php
                            $statusColors = [
                                'Menunggu Pembayaran'     => 'text-yellow-400',
                                'Pembayaran Dikonfirmasi' => 'text-blue-400',
                                'Diproses'                => 'text-indigo-400',
                                'Dikirim'                 => 'text-purple-400',
                                'Selesai'                 => 'text-emerald-400',
                                'Dibatalkan'              => 'text-red-400',
                            ];
                            $sc = $statusColors[$order->status] ?? 'text-slate-400';
                        ?>
                        <h2 class="text-xl font-black <?php echo e($sc); ?> uppercase mt-1"><?php echo e($order->status); ?></h2>
                    </div>
                    <?php
                        $psColors = [
                            'paid'           => 'bg-emerald-500/10 text-emerald-400',
                            'proof_uploaded' => 'bg-blue-500/10 text-blue-400',
                            'rejected'       => 'bg-red-500/10 text-red-400',
                            'pending'        => 'bg-yellow-500/10 text-yellow-400',
                        ];
                        $pc = $psColors[$order->payment_status] ?? 'bg-slate-500/10 text-slate-400';
                    ?>
                    <span class="inline-flex items-center rounded-full <?php echo e($pc); ?> px-3 py-1 text-xs font-black uppercase">
                        <?php echo e($order->payment_status_label); ?>

                    </span>
                </div>

                
                <form action="<?php echo e(route('admin.orders.update-status', $order)); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Status Pesanan</label>
                            <select name="status" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-sm font-bold text-white focus:ring-blue-500 px-3 py-2 ring-1 ring-white/5">
                                <?php $__currentLoopData = ['Menunggu Pembayaran', 'Pembayaran Dikonfirmasi', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($st); ?>" <?php echo e($order->status === $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Kurir</label>
                            <input type="text" name="courier" value="<?php echo e($order->courier); ?>" placeholder="JNE, J&T, SiCepat..." class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-sm text-white focus:ring-blue-500 ring-1 ring-white/5 px-3 py-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Nomor Resi</label>
                            <input type="text" name="tracking_number" value="<?php echo e($order->tracking_number); ?>" placeholder="Isi nomor resi setelah pesanan dikirim" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-sm text-white focus:ring-blue-500 ring-1 ring-white/5 px-3 py-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Alasan Pembatalan (jika dibatalkan)</label>
                            <input type="text" name="cancel_reason" value="<?php echo e($order->cancel_reason); ?>" placeholder="Opsional" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-sm text-white focus:ring-blue-500 ring-1 ring-white/5 px-3 py-2">
                        </div>
                    </div>
                    <button type="submit" class="btn-primary !py-2.5 !px-6 !rounded-xl !text-xs !font-black">UPDATE STATUS PESANAN</button>
                </form>
            </div>

            
            <?php if($order->payment_proof): ?>
                <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-white mb-4">📎 Bukti Pembayaran</h3>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                        <a href="<?php echo e(route('admin.orders.view-proof', $order)); ?>" target="_blank" class="group flex-none">
                            <img
                                src="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>"
                                alt="Bukti Pembayaran"
                                class="h-48 w-48 rounded-xl object-cover ring-2 ring-white/5 transition group-hover:ring-blue-500/50"
                            >
                        </a>
                        <div class="flex-1 space-y-3">
                            <div class="rounded-xl bg-[#0B0F1A] p-3 border border-white/5">
                                <p class="text-[10px] font-bold text-slate-500 uppercase">Dikirim pada</p>
                                <p class="text-sm font-bold text-white mt-0.5"><?php echo e($order->payment_proof_uploaded_at?->format('d M Y, H:i')); ?></p>
                            </div>
                            <div class="rounded-xl bg-[#0B0F1A] p-3 border border-white/5">
                                <p class="text-[10px] font-bold text-slate-500 uppercase">Metode Bayar</p>
                                <p class="text-sm font-bold text-white mt-0.5"><?php echo e($order->payment_method_label); ?></p>
                            </div>
                            <div class="rounded-xl bg-[#0B0F1A] p-3 border border-white/5">
                                <p class="text-[10px] font-bold text-slate-500 uppercase">Jumlah</p>
                                <p class="text-lg font-black text-white mt-0.5">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                            </div>

                            
                            <?php if($order->payment_status === 'proof_uploaded'): ?>
                                <div class="flex gap-2">
                                    <form action="<?php echo e(route('admin.orders.confirm-payment', $order)); ?>" method="POST" class="flex-1">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="w-full rounded-xl bg-emerald-500/10 px-4 py-2.5 text-xs font-black text-emerald-400 hover:bg-emerald-500/20 transition border border-emerald-500/20">
                                            ✓ KONFIRMASI PEMBAYARAN
                                        </button>
                                    </form>
                                    <button
                                        onclick="document.getElementById('rejectForm').classList.toggle('hidden')"
                                        class="flex-1 rounded-xl bg-red-500/10 px-4 py-2.5 text-xs font-black text-red-400 hover:bg-red-500/20 transition border border-red-500/20">
                                        ✕ TOLAK
                                    </button>
                                </div>

                                
                                <form id="rejectForm" action="<?php echo e(route('admin.orders.reject-payment', $order)); ?>" method="POST" class="hidden space-y-2">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="rejection_reason" placeholder="Alasan penolakan..." class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-sm text-white focus:ring-red-500 ring-1 ring-white/5 px-3 py-2" required>
                                    <button type="submit" class="w-full rounded-xl bg-red-500/20 py-2 text-xs font-black text-red-400 hover:bg-red-500/30 transition">Kirim Penolakan</button>
                                </form>
                            <?php elseif($order->payment_status === 'paid'): ?>
                                <div class="rounded-xl bg-emerald-500/10 border border-emerald-500/20 p-3 text-center">
                                    <p class="text-xs font-black text-emerald-400">✓ PEMBAYARAN TELAH DIKONFIRMASI</p>
                                    <?php if($order->paid_at): ?>
                                        <p class="text-[10px] text-emerald-400/60 mt-1"><?php echo e($order->paid_at->format('d M Y, H:i')); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php elseif($order->payment_status === 'rejected'): ?>
                                <div class="rounded-xl bg-red-500/10 border border-red-500/20 p-3">
                                    <p class="text-xs font-black text-red-400">✕ BUKTI DITOLAK</p>
                                    <?php if($order->payment_rejection_reason): ?>
                                        <p class="text-[10px] text-red-400/70 mt-1"><?php echo e($order->payment_rejection_reason); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php elseif(!$order->isCod() && $order->payment_status === 'pending'): ?>
                <div class="rounded-2xl border border-yellow-500/20 bg-yellow-500/5 p-5">
                    <p class="text-sm font-bold text-yellow-400">⏳ Menunggu bukti pembayaran dari pelanggan</p>
                </div>
            <?php endif; ?>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] overflow-hidden shadow-sm">
                <div class="px-5 py-4 border-b border-white/5 bg-white/[0.02]">
                    <h3 class="text-xs font-bold text-white uppercase tracking-widest">Item Pesanan</h3>
                </div>
                <table class="w-full text-sm">
                    <tbody class="divide-y divide-white/5">
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <?php if($item->product && $item->product->image): ?>
                                            <img src="<?php echo e($item->product->image_url); ?>" class="h-12 w-12 rounded-xl object-cover ring-1 ring-white/5">
                                        <?php else: ?>
                                            <div class="h-12 w-12 rounded-xl bg-[#0B0F1A] flex items-center justify-center border border-white/5">
                                                <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <p class="font-bold text-white"><?php echo e($item->product->name ?? 'Produk Dihapus'); ?></p>
                                            <p class="text-xs text-slate-500"><?php echo e($item->quantity); ?> × Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-right font-black text-white">
                                    Rp <?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot class="bg-white/[0.02] border-t border-white/5">
                        <tr>
                            <td class="px-5 py-3 text-right text-xs text-slate-500">Subtotal</td>
                            <td class="px-5 py-3 text-right font-black text-white">Rp <?php echo e(number_format($order->items->sum(fn($i) => $i->price * $i->quantity), 0, ',', '.')); ?></td>
                        </tr>
                        <?php if($order->discount > 0): ?>
                            <tr>
                                <td class="px-5 py-3 text-right text-xs text-emerald-400">Diskon <?php echo e($order->coupon_code ? "({$order->coupon_code})" : ''); ?></td>
                                <td class="px-5 py-3 text-right font-black text-emerald-400">- Rp <?php echo e(number_format($order->discount, 0, ',', '.')); ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="px-5 py-3 text-right text-xs text-slate-500">Ongkos Kirim</td>
                            <td class="px-5 py-3 text-right font-bold <?php echo e($order->shipping_cost == 0 ? 'text-emerald-400' : 'text-white'); ?>">
                                <?php echo e($order->shipping_cost == 0 ? 'GRATIS' : 'Rp ' . number_format($order->shipping_cost, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr class="border-t border-white/10">
                            <td class="px-5 py-4 text-right font-black text-white">TOTAL</td>
                            <td class="px-5 py-4 text-right font-black text-white text-xl">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        
        <div class="space-y-5">
            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-4">Pelanggan</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-full bg-blue-500/10 border border-blue-500/20">
                        <span class="text-blue-400 font-black text-sm"><?php echo e(substr($order->user->name, 0, 1)); ?></span>
                    </div>
                    <div>
                        <p class="font-bold text-white text-sm"><?php echo e($order->user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($order->user->email); ?></p>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.users.show', $order->user)); ?>" class="btn-secondary w-full !py-2 !text-[10px] !rounded-xl !font-black">LIHAT PROFIL</a>
            </div>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-1">Info Pesanan</h3>
                <?php $__currentLoopData = [
                    ['label' => 'No. Pesanan', 'value' => '#' . $order->id],
                    ['label' => 'Tanggal', 'value' => $order->created_at->format('d M Y, H:i')],
                    ['label' => 'Metode Bayar', 'value' => $order->payment_method_label],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl bg-[#0B0F1A] p-3 border border-white/5">
                        <p class="text-[10px] text-slate-500 uppercase tracking-wider"><?php echo e($info['label']); ?></p>
                        <p class="text-sm font-bold text-white mt-0.5"><?php echo e($info['value']); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->paid_at): ?>
                    <div class="rounded-xl bg-emerald-500/10 p-3 border border-emerald-500/20">
                        <p class="text-[10px] text-emerald-400/60 uppercase tracking-wider">Dibayar pada</p>
                        <p class="text-sm font-bold text-emerald-400 mt-0.5"><?php echo e($order->paid_at->format('d M Y, H:i')); ?></p>
                    </div>
                <?php endif; ?>
                <?php if($order->tracking_number): ?>
                    <div class="rounded-xl bg-blue-500/10 p-3 border border-blue-500/20">
                        <p class="text-[10px] text-blue-400/60 uppercase tracking-wider">Nomor Resi (<?php echo e($order->courier); ?>)</p>
                        <p class="text-sm font-mono font-black text-blue-400 mt-0.5"><?php echo e($order->tracking_number); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-3">Alamat Pengiriman</h3>
                <div class="rounded-xl bg-[#0B0F1A] p-4 border border-white/5">
                    <p class="text-sm text-white leading-relaxed"><?php echo e($order->shipping_address); ?></p>
                </div>
            </div>

            <?php if($order->cancel_reason): ?>
                <div class="rounded-2xl border border-red-500/20 bg-red-500/10 p-5">
                    <p class="text-xs font-bold text-red-400 uppercase tracking-wider mb-1">Alasan Pembatalan</p>
                    <p class="text-sm text-red-400/80"><?php echo e($order->cancel_reason); ?></p>
                </div>
            <?php endif; ?>
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