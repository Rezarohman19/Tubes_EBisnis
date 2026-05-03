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
            Detail Pesanan #<?php echo e($order->id); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <?php if(session('success')): ?>
                        <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="grid gap-6 lg:grid-cols-[2fr_1fr]">
                        <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
                                    <p class="mt-1 text-sm text-gray-500">Nomor pesanan: #<?php echo e($order->id); ?></p>
                                </div>
                                <span class="rounded-full border px-3 py-1 text-sm font-medium <?php echo e($order->payment_status === 'paid' ? 'border-green-200 text-green-700 bg-green-50' : 'border-yellow-200 text-yellow-700 bg-yellow-50'); ?>">
                                    <?php echo e($order->payment_status_label); ?>

                                </span>
                            </div>

                            <div class="mt-6 grid gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Metode Pembayaran</p>
                                    <p class="font-semibold text-gray-900"><?php echo e($order->payment_method_label); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Alamat Pengiriman</p>
                                    <p class="font-semibold text-gray-900"><?php echo e($order->shipping_address); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Total Pembayaran</p>
                                    <p class="text-2xl font-bold text-gray-900">Rp <?php echo e(number_format($order->total,0,',','.')); ?></p>
                                </div>

                                <div class="rounded-2xl bg-gray-50 p-4">
                                    <p class="font-semibold text-gray-900">Instruksi Pembayaran</p>
                                    <?php if($order->payment_method === 'bank_transfer'): ?>
                                        <p class="mt-3 text-sm text-gray-600">Silakan transfer ke Virtual Account berikut:</p>
                                        <p class="mt-2 font-medium text-gray-900">7001 1234 5678 9012</p>
                                        <p class="mt-1 text-sm text-gray-500">Jumlah: Rp <?php echo e(number_format($order->total,0,',','.')); ?></p>
                                    <?php elseif($order->payment_method === 'dana'): ?>
                                        <p class="mt-3 text-sm text-gray-600">Silakan bayar melalui aplikasi DANA ke nomor:</p>
                                        <p class="mt-2 font-medium text-gray-900">0812 3456 7890</p>
                                    <?php else: ?>
                                        <p class="mt-3 text-sm text-gray-600">Scan QRIS berikut untuk menyelesaikan pembayaran.</p>
                                        <div class="mt-4 h-40 w-full rounded-2xl bg-white border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                                            QRIS Placeholder
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900">Produk</h3>
                            <div class="mt-4 space-y-4">
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="rounded-2xl bg-white p-4 shadow-sm">
                                        <div class="flex items-center justify-between gap-4">
                                            <div>
                                                <p class="font-semibold text-gray-900"><?php echo e($item->product->name); ?></p>
                                                <p class="text-sm text-gray-500"><?php echo e($item->quantity); ?> x Rp <?php echo e(number_format($item->price,0,',','.')); ?></p>
                                            </div>
                                            <p class="font-semibold text-gray-900">Rp <?php echo e(number_format($item->price * $item->quantity,0,',','.')); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <?php if($order->payment_status !== 'paid'): ?>
                                <form action="<?php echo e(route('orders.payment.confirm', $order)); ?>" method="POST" class="mt-6">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full rounded-lg bg-green-600 px-5 py-3 text-white hover:bg-green-700">Konfirmasi Pembayaran</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>

                    <a href="<?php echo e(route('orders.index')); ?>" class="inline-flex mt-6 rounded-lg bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">Kembali ke Riwayat Pesanan</a>
                </div>
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
<?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/orders/show.blade.php ENDPATH**/ ?>