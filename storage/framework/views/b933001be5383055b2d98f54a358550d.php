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
     <?php $__env->slot('title', null, []); ?> Manajemen Kupon <?php $__env->endSlot(); ?>

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
        <form action="<?php echo e(route('admin.coupons.store')); ?>" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php echo csrf_field(); ?>
            <input type="text" name="code" placeholder="KODE KUPON" class="rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5 px-4 py-2">
            <select name="type" class="rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5 px-4 py-2">
                <option value="percent">Persentase (%)</option>
                <option value="fixed">Potongan Tetap (Rp)</option>
            </select>
            <input type="number" name="value" placeholder="Nilai" class="rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5 px-4 py-2">
            <button type="submit" class="md:col-span-3 btn-primary !py-3 !rounded-xl !text-xs !font-black">BUAT KUPON BARU</button>
        </form>
    </div>

    <div class="mt-6 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Kode</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Tipe</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Potongan</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-4 py-4 font-black text-white"><?php echo e($coupon->code); ?></td>
                    <td class="px-4 py-4 font-bold text-slate-500 uppercase text-[10px]"><?php echo e($coupon->type); ?></td>
                    <td class="px-4 py-4 font-black text-white">
                        <?php echo e($coupon->type === 'percent' ? $coupon->value . '%' : 'Rp ' . number_format($coupon->value, 0, ',', '.')); ?>

                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-[10px] font-black uppercase <?php echo e($coupon->is_active ? 'bg-[#10B981]/10 text-[#10B981]' : 'bg-slate-500/10 text-slate-500'); ?>">
                            <?php echo e($coupon->is_active ? 'Aktif' : 'Nonaktif'); ?>

                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="inline-flex items-center rounded-lg bg-[#EF4444]/10 px-3 py-1.5 text-xs font-bold text-[#EF4444] hover:bg-[#EF4444]/20 transition-all border border-[#EF4444]/10">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/admin/coupons/index.blade.php ENDPATH**/ ?>