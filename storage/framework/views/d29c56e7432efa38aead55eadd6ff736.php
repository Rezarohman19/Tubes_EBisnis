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
     <?php $__env->slot('title', null, []); ?> Manajemen Pengguna <?php $__env->endSlot(); ?>

    <div class="mt-4 flex items-center justify-between gap-4">
        <form method="GET" class="flex gap-2">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama atau email..." 
                   class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5">
            <button type="submit" class="rounded-xl bg-white/5 border border-white/5 px-4 py-2 text-sm font-bold text-slate-400 hover:bg-white/10 hover:text-white transition-all">Cari</button>
        </form>
    </div>

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Nama & Email</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Role</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Total Order</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Terdaftar</th>
                    <th class="px-4 py-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-4 py-4">
                        <p class="font-bold text-white"><?php echo e($user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($user->email); ?></p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-[10px] font-black uppercase <?php echo e($user->role === 'admin' ? 'bg-blue-500/10 text-blue-500' : 'bg-slate-500/10 text-slate-500'); ?>">
                            <?php echo e($user->role); ?>

                        </span>
                    </td>
                    <td class="px-4 py-4 font-black text-white"><?php echo e($user->orders_count); ?></td>
                    <td class="px-4 py-4 text-slate-500 font-medium"><?php echo e($user->created_at->format('d M Y')); ?></td>
                    <td class="px-4 py-4 text-right">
                        <form action="<?php echo e(route('admin.users.toggle-role', $user)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-white/5 px-3 py-1.5 text-xs font-bold text-slate-400 hover:bg-white/10 hover:text-white transition-all border border-white/5">Tukar Role</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4"><?php echo e($users->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/admin/users/index.blade.php ENDPATH**/ ?>