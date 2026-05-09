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

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Order ID</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Pelanggan</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Total</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-4 py-4 font-black text-white">#<?php echo e($order->id); ?></td>
                    <td class="px-4 py-4 font-bold text-white"><?php echo e($order->user->name); ?></td>
                    <td class="px-4 py-4 font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></td>
                    <td class="px-4 py-4">
                        <?php
                            $colors = [
                                'Menunggu Pembayaran' => 'bg-[#F59E0B]/10 text-[#F59E0B]',
                                'Diproses' => 'bg-blue-500/10 text-blue-500',
                                'Dikirim' => 'bg-indigo-500/10 text-indigo-500',
                                'Selesai' => 'bg-[#10B981]/10 text-[#10B981]',
                                'Dibatalkan' => 'bg-[#EF4444]/10 text-[#EF4444]'
                            ];
                            $c = $colors[$order->status] ?? 'bg-slate-500/10 text-slate-500';
                        ?>
                        <span class="inline-flex items-center rounded-full <?php echo e($c); ?> px-2.5 py-0.5 text-[10px] font-black uppercase">
                            <?php echo e($order->status); ?>

                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="inline-flex items-center rounded-lg bg-blue-500/10 px-3 py-1.5 text-xs font-bold text-blue-500 hover:bg-blue-500/20 transition-all">Detail</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($orders->links()); ?>

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
<?php endif; ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>