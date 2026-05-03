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

    <div class="mt-4 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <form action="<?php echo e(route('admin.coupons.store')); ?>" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php echo csrf_field(); ?>
            <input type="text" name="code" placeholder="KODE KUPON" class="rounded-xl border-gray-300">
            <select name="type" class="rounded-xl border-gray-300">
                <option value="percent">Persentase (%)</option>
                <option value="fixed">Potongan Tetap (Rp)</option>
            </select>
            <input type="number" name="value" placeholder="Nilai" class="rounded-xl border-gray-300">
            <button type="submit" class="md:col-span-3 bg-blue-600 text-white py-2 rounded-xl">Buat Kupon</button>
        </form>
    </div>

    <div class="mt-6 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-4 py-3">Kode</th>
                    <th class="px-4 py-3">Tipe</th>
                    <th class="px-4 py-3">Potongan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b">
                    <td class="px-4 py-3 font-bold"><?php echo e($coupon->code); ?></td>
                    <td class="px-4 py-3"><?php echo e($coupon->type); ?></td>
                    <td class="px-4 py-3"><?php echo e(number_format($coupon->value)); ?></td>
                    <td class="px-4 py-3">
                        <?php echo e($coupon->is_active ? 'Aktif' : 'Nonaktif'); ?>

                    </td>
                    <td class="px-4 py-3">
                        <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-red-600">Hapus</button>
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