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
     <?php $__env->slot('title', null, []); ?> Daftar Pesanan <?php $__env->endSlot(); ?>

    
    <?php if($summary['pending_proof'] > 0): ?>
        <div class="mt-4 flex items-center gap-3 rounded-2xl border border-blue-500/30 bg-blue-500/10 p-4">
            <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-blue-500/20 text-blue-400">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            </div>
            <p class="text-sm font-bold text-blue-400">
                Ada <span class="text-white"><?php echo e($summary['pending_proof']); ?></span> bukti pembayaran yang menunggu konfirmasi!
            </p>
            <a href="<?php echo e(route('admin.orders.index', ['payment_status' => 'proof_uploaded'])); ?>" class="ml-auto rounded-xl bg-blue-500/20 px-4 py-2 text-xs font-black text-blue-400 hover:bg-blue-500/30 transition">Lihat Sekarang →</a>
        </div>
    <?php endif; ?>

    
    <div class="mt-4 flex flex-wrap items-center gap-3">
        <form method="GET" class="flex flex-wrap gap-2 flex-1">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama / email / ID pesanan..." class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white focus:border-blue-500 focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5 w-64">

            <select name="status" class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white focus:border-blue-500 px-4 py-2 ring-1 ring-white/5">
                <option value="">Semua Status</option>
                <?php $__currentLoopData = $statusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($st); ?>" <?php echo e(request('status') === $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select name="payment_status" class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white focus:border-blue-500 px-4 py-2 ring-1 ring-white/5">
                <option value="">Semua Pembayaran</option>
                <option value="pending"        <?php echo e(request('payment_status') === 'pending'        ? 'selected' : ''); ?>>Menunggu</option>
                <option value="proof_uploaded" <?php echo e(request('payment_status') === 'proof_uploaded' ? 'selected' : ''); ?>>Bukti Dikirim</option>
                <option value="paid"           <?php echo e(request('payment_status') === 'paid'           ? 'selected' : ''); ?>>Lunas</option>
                <option value="rejected"       <?php echo e(request('payment_status') === 'rejected'       ? 'selected' : ''); ?>>Ditolak</option>
            </select>

            <button type="submit" class="rounded-xl bg-white/5 border border-white/5 px-4 py-2 text-sm font-bold text-slate-400 hover:bg-white/10 hover:text-white transition">Filter</button>
            <?php if(request('search') || request('status') || request('payment_status')): ?>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="rounded-xl bg-white/5 border border-white/5 px-4 py-2 text-sm font-bold text-slate-500 hover:text-white transition">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    
    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-white/[0.03] border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Order</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Pelanggan</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Total</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Pembayaran</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Tanggal</th>
                    <th class="px-4 py-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-white/[0.02] transition-colors <?php echo e($order->payment_status === 'proof_uploaded' ? 'bg-blue-500/5' : ''); ?>">
                        <td class="px-4 py-4">
                            <p class="font-black text-white">#<?php echo e($order->id); ?></p>
                            <p class="text-[10px] text-slate-500 uppercase"><?php echo e($order->payment_method_label); ?></p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-bold text-white"><?php echo e($order->user->name); ?></p>
                            <p class="text-[10px] text-slate-500"><?php echo e($order->user->email); ?></p>
                        </td>
                        <td class="px-4 py-4 font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></td>
                        <td class="px-4 py-4">
                            <?php
                                $psColor = match($order->payment_status) {
                                    'paid'           => 'bg-emerald-500/10 text-emerald-400',
                                    'proof_uploaded' => 'bg-blue-500/10 text-blue-400',
                                    'rejected'       => 'bg-red-500/10 text-red-400',
                                    default          => 'bg-yellow-500/10 text-yellow-400',
                                };
                            ?>
                            <span class="inline-flex items-center rounded-full <?php echo e($psColor); ?> px-2.5 py-0.5 text-[10px] font-black uppercase">
                                <?php echo e($order->payment_status_label); ?>

                            </span>
                            <?php if($order->payment_status === 'proof_uploaded'): ?>
                                <span class="ml-1 inline-flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4">
                            <?php
                                $stColor = match($order->status) {
                                    'Menunggu Pembayaran'     => 'bg-yellow-500/10 text-yellow-400',
                                    'Pembayaran Dikonfirmasi' => 'bg-blue-500/10 text-blue-400',
                                    'Diproses'                => 'bg-indigo-500/10 text-indigo-400',
                                    'Dikirim'                 => 'bg-purple-500/10 text-purple-400',
                                    'Selesai'                 => 'bg-emerald-500/10 text-emerald-400',
                                    'Dibatalkan'              => 'bg-red-500/10 text-red-400',
                                    default                   => 'bg-slate-500/10 text-slate-400',
                                };
                            ?>
                            <span class="inline-flex items-center rounded-full <?php echo e($stColor); ?> px-2.5 py-0.5 text-[10px] font-black">
                                <?php echo e($order->status); ?>

                            </span>
                        </td>
                        <td class="px-4 py-4 text-xs text-slate-500"><?php echo e($order->created_at->format('d M Y')); ?></td>
                        <td class="px-4 py-4">
                            <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="inline-flex items-center rounded-lg bg-blue-500/10 px-3 py-1.5 text-xs font-bold text-blue-400 hover:bg-blue-500/20 transition">
                                Detail →
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-4 py-16 text-center text-slate-500 font-medium">Tidak ada pesanan ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4"><?php echo e($orders->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>