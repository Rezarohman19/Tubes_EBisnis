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
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Pesanan
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Pesanan Anda</h3>
                <p class="mt-2 text-sm text-gray-500">Lihat status pemesanan dan lanjutkan konfirmasi pembayaran jika diperlukan.</p>

                <?php if($orders->isEmpty()): ?>
                    <div class="mt-8 rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center text-gray-500">
                        Belum ada pesanan. <a href="<?php echo e(route('dashboard')); ?>" class="font-semibold text-indigo-600 hover:text-indigo-700">Belanja sekarang</a>.
                    </div>
                <?php else: ?>
                    <div class="mt-8 space-y-4">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Pesanan #<?php echo e($order->id); ?></h4>
                                        <p class="mt-1 text-sm text-gray-500"><?php echo e($order->created_at->format('d M Y H:i')); ?> • <?php echo e($order->payment_method_label); ?></p>
                                    </div>
                                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-sm font-semibold text-indigo-700"><?php echo e($order->payment_status_label); ?></span>
                                </div>

                                <div class="mt-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <p class="text-sm text-gray-600">Total pembayaran:</p>
                                    <p class="text-lg font-semibold text-gray-900">Rp <?php echo e(number_format($order->total,0,',','.')); ?></p>
                                </div>

                                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <a href="<?php echo e(route('orders.show', $order)); ?>" class="rounded-2xl bg-indigo-600 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-indigo-700">Lihat Detail</a>
                                    <span class="rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-700">Status: <?php echo e($order->status); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp\htdocs\tubes_EBisnis\resources\views/orders/index.blade.php ENDPATH**/ ?>