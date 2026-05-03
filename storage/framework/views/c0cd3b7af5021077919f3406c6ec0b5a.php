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
            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500"><?php echo e($card['label']); ?></p>
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-<?php echo e($card['color']); ?>-50">
                        <svg class="h-5 w-5 text-<?php echo e($card['color']); ?>-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($card['icon']); ?>"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-3 text-3xl font-extrabold text-gray-900"><?php echo e(number_format($card['value'])); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Pendapatan Hari Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-gray-900">Rp <?php echo e(number_format($stats['revenue_today'], 0, ',', '.')); ?></p>
            <p class="mt-1 text-xs text-gray-400"><?php echo e($stats['orders_today']); ?> pesanan hari ini</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Pendapatan Bulan Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-gray-900">Rp <?php echo e(number_format($stats['revenue_month'], 0, ',', '.')); ?></p>
            <p class="mt-1 text-xs text-gray-400"><?php echo e($stats['new_users_month']); ?> pengguna baru bulan ini</p>
        </div>
        <div class="rounded-2xl border border-red-100 bg-red-50 p-5 shadow-sm">
            <p class="text-sm font-medium text-red-600">Perhatian Stok</p>
            <p class="mt-2 text-2xl font-extrabold text-red-700"><?php echo e($stats['low_stock'] + $stats['out_of_stock']); ?></p>
            <p class="mt-1 text-xs text-red-500"><?php echo e($stats['out_of_stock']); ?> habis · <?php echo e($stats['low_stock']); ?> hampir habis</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
        
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                <h3 class="font-semibold text-gray-900">Pesanan Terbaru</h3>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Lihat semua →</a>
            </div>
            <div class="divide-y divide-gray-50">
                <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between px-5 py-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">#<?php echo e($order->id); ?> · <?php echo e($order->user->name); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($order->created_at->diffForHumans()); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-900">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                            <?php
                                $colors = ['Menunggu Pembayaran' => 'yellow', 'Diproses' => 'blue', 'Dikirim' => 'indigo', 'Selesai' => 'green', 'Dibatalkan' => 'red'];
                                $c = $colors[$order->status] ?? 'gray';
                            ?>
                            <span class="inline-flex items-center rounded-full bg-<?php echo e($c); ?>-100 px-2 py-0.5 text-xs font-medium text-<?php echo e($c); ?>-700"><?php echo e($order->status); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-5 py-8 text-center text-sm text-gray-400">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                <h3 class="font-semibold text-gray-900">Stok Menipis</h3>
                <a href="<?php echo e(route('admin.products.index', ['stock_filter' => 'low'])); ?>" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Lihat semua →</a>
            </div>
            <div class="divide-y divide-gray-50">
                <?php $__empty_1 = true; $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between px-5 py-3">
                        <p class="text-sm font-medium text-gray-900"><?php echo e($product->name); ?></p>
                        <?php if($product->stock === 0): ?>
                            <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-700">Habis</span>
                        <?php else: ?>
                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-bold text-yellow-700">Sisa <?php echo e($product->stock); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-5 py-8 text-center text-sm text-gray-400">Semua stok aman</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
        <h3 class="mb-4 font-semibold text-gray-900">Pendapatan 7 Hari Terakhir</h3>
        <div class="flex items-end gap-2 h-40">
            <?php $maxRev = $revenueChart->max('revenue') ?: 1; ?>
            <?php $__currentLoopData = $revenueChart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $height = max(4, (int) ($day['revenue'] / $maxRev * 100)); ?>
                <div class="flex flex-1 flex-col items-center gap-1" x-data="{ h: '<?php echo e($height); ?>%' }">
                    <p class="text-xs font-bold text-gray-600"><?php echo e($day['orders']); ?></p>
                    <div class="w-full rounded-t-lg bg-blue-500 transition-all" :style="'height:' + h"></div>
                    <p class="text-xs text-gray-400 text-center"><?php echo e($day['date']); ?></p>
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
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>