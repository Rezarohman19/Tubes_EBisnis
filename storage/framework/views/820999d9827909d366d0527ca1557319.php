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
     <?php $__env->slot('title', null, []); ?> Dashboard <?php $__env->endSlot(); ?>
     <?php $__env->slot('breadcrumb', null, []); ?> Selamat datang, <?php echo e(Auth::user()->name); ?> <?php $__env->endSlot(); ?>

    
    <div class="mt-4 grid grid-cols-2 gap-4 lg:grid-cols-4">
        <?php
            $statCards = [
                ['label' => 'Total Produk',       'value' => $stats['total_products'],  'color' => 'blue',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['label' => 'Total Pesanan',       'value' => $stats['total_orders'],    'color' => 'indigo', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Pesanan Pending',     'value' => $stats['pending_orders'],  'color' => 'yellow', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Total Pengguna',      'value' => $stats['total_users'],     'color' => 'green',  'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ];
        ?>
        <?php $__currentLoopData = $statCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm transition-all hover:shadow-xl hover:border-white/10">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-bold uppercase tracking-wider text-slate-500"><?php echo e($card['label']); ?></p>
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#0B0F1A] border border-white/5">
                        <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($card['icon']); ?>"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-3 text-3xl font-black text-white"><?php echo e(number_format($card['value'])); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pendapatan Hari Ini</p>
            <p class="mt-2 text-2xl font-black text-white">Rp <?php echo e(number_format($stats['revenue_today'], 0, ',', '.')); ?></p>
            <p class="mt-1 text-xs text-slate-500"><?php echo e($stats['orders_today']); ?> pesanan hari ini</p>
        </div>
        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pendapatan Bulan Ini</p>
            <p class="mt-2 text-2xl font-black text-white">Rp <?php echo e(number_format($stats['revenue_month'], 0, ',', '.')); ?></p>
            <p class="mt-1 text-xs text-slate-500"><?php echo e($stats['new_users_month']); ?> pengguna baru bulan ini</p>
        </div>
        <div class="rounded-2xl border border-[#EF4444]/20 bg-[#EF4444]/10 p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-[#EF4444]">Perhatian Stok</p>
            <p class="mt-2 text-2xl font-black text-[#EF4444]"><?php echo e($stats['low_stock'] + $stats['out_of_stock']); ?></p>
            <p class="mt-1 text-xs text-[#EF4444]/60"><?php echo e($stats['out_of_stock']); ?> habis · <?php echo e($stats['low_stock']); ?> hampir habis</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
        
        <div class="rounded-2xl border border-white/5 bg-[#161B29] shadow-sm">
            <div class="flex items-center justify-between border-b border-white/5 px-5 py-4">
                <h3 class="font-bold text-white">Pesanan Terbaru</h3>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-xs font-bold text-blue-500 hover:text-blue-400">Lihat semua →</a>
            </div>
            <div class="divide-y divide-white/5">
                <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between px-5 py-3 hover:bg-white/5 transition-colors">
                        <div>
                            <p class="text-sm font-bold text-white">#<?php echo e($order->id); ?> · <?php echo e($order->user->name); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($order->created_at->diffForHumans()); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
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
                            <span class="inline-flex items-center rounded-full <?php echo e($c); ?> px-2 py-0.5 text-[10px] font-bold"><?php echo e($order->status); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-5 py-8 text-center text-sm text-slate-500">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="rounded-2xl border border-white/5 bg-[#161B29] shadow-sm">
            <div class="flex items-center justify-between border-b border-white/5 px-5 py-4">
                <h3 class="font-bold text-white">Stok Menipis</h3>
                <a href="<?php echo e(route('admin.products.index', ['stock_filter' => 'low'])); ?>" class="text-xs font-bold text-blue-500 hover:text-blue-400">Lihat semua →</a>
            </div>
            <div class="divide-y divide-white/5">
                <?php $__empty_1 = true; $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between px-5 py-3 hover:bg-white/5 transition-colors">
                        <p class="text-sm font-bold text-white"><?php echo e($product->name); ?></p>
                        <?php if($product->stock === 0): ?>
                            <span class="inline-flex items-center rounded-full bg-[#EF4444]/10 px-2.5 py-0.5 text-[10px] font-black text-[#EF4444]">Habis</span>
                        <?php else: ?>
                            <span class="inline-flex items-center rounded-full bg-[#F59E0B]/10 px-2.5 py-0.5 text-[10px] font-black text-[#F59E0B]">Sisa <?php echo e($product->stock); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-5 py-8 text-center text-sm text-slate-500">Semua stok aman</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="mt-6 rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
        <h3 class="mb-6 font-bold text-white">Pendapatan 7 Hari Terakhir</h3>
        <div class="flex items-end gap-3 h-48 px-2">
            <?php $maxRev = $revenueChart->max('revenue') ?: 1; ?>
            <?php $__currentLoopData = $revenueChart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $height = max(4, (int) ($day['revenue'] / $maxRev * 100)); ?>
                <div class="flex flex-1 flex-col items-center gap-2 group" x-data="{ h: '<?php echo e($height); ?>%' }">
                    <div class="relative w-full">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 rounded bg-blue-500 px-1.5 py-0.5 text-[8px] font-black text-white opacity-0 transition-opacity group-hover:opacity-100">
                            <?php echo e($day['orders']); ?>

                        </div>
                        <div class="w-full rounded-t-xl bg-gradient-to-t from-blue-600/20 to-blue-500 transition-all group-hover:from-blue-600/40 group-hover:to-blue-400 shadow-lg shadow-blue-500/10" :style="'height:' + h"></div>
                    </div>
                    <p class="text-[10px] font-bold text-slate-500 group-hover:text-white transition-colors"><?php echo e($day['date']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?><?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>