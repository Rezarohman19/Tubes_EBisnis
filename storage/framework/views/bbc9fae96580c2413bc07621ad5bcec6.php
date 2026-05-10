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
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            
            <div class="mb-6 flex items-center gap-2 text-[10px] font-black uppercase tracking-widest">
                <a href="<?php echo e(route('orders.index')); ?>" class="text-slate-500 hover:text-blue-500 transition-colors">PESANAN</a>
                <svg class="h-3 w-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white">PEMBAYARAN #<?php echo e($order->id); ?></span>
            </div>

            
            <?php if(session('success')): ?>
                <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-4">
                    <svg class="h-5 w-5 flex-none text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <p class="text-sm font-semibold text-emerald-400"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="mb-6 flex items-center gap-3 rounded-2xl border border-red-500/20 bg-red-500/10 p-4">
                    <svg class="h-5 w-5 flex-none text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <p class="text-sm font-semibold text-red-400"><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?>

            <div class="grid gap-6 lg:grid-cols-[1fr_360px]">

                
                <div class="space-y-5">

                    
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h2 class="text-lg font-black text-white mb-5">
                            💳 Instruksi Pembayaran
                        </h2>

                        <?php $type = $methodConfig['type'] ?? 'bank'; ?>

                        
                        <?php if($type === 'qris'): ?>
                            <div class="rounded-xl bg-[#0B0F1A] p-6 border border-white/5 text-center">
                                <?php if(!empty($methodConfig['qris_image'])): ?>
                                    <img src="<?php echo e(asset($methodConfig['qris_image'])); ?>" alt="QRIS" class="mx-auto h-56 w-56 rounded-xl">
                                <?php else: ?>
                                    <div class="mx-auto flex h-56 w-56 items-center justify-center rounded-xl bg-white/5 border border-white/5">
                                        <div class="text-center">
                                            <svg class="mx-auto h-16 w-16 text-purple-500" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h6v6H3V3zm12 0h6v6h-6V3zM3 15h6v6H3v-6zm12 0h6v6h-6v-6zM9 9h6v6H9V9z"/></svg>
                                            <p class="mt-2 text-xs text-slate-500">QRIS tidak tersedia</p>
                                            <p class="text-xs text-slate-500">Hubungi admin</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <p class="mt-4 text-sm font-bold text-white"><?php echo e($methodConfig['account_name']); ?></p>
                                <p class="text-xs text-slate-400 mt-1"><?php echo e($methodConfig['description']); ?></p>
                                <div class="mt-4 rounded-xl bg-purple-500/10 border border-purple-500/20 p-3">
                                    <p class="text-xs font-bold text-purple-400">📱 Scan QRIS menggunakan aplikasi e-wallet manapun</p>
                                </div>
                            </div>

                        
                        <?php elseif($type === 'bank'): ?>
                            <div class="rounded-xl bg-[#0B0F1A] p-5 border border-white/5">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500"><?php echo e($methodConfig['description']); ?></p>
                                        <p class="text-lg font-black text-white mt-1"><?php echo e($methodConfig['label']); ?></p>
                                    </div>
                                    <div class="h-12 w-12 rounded-xl bg-blue-500/10 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between rounded-lg bg-white/5 p-3">
                                        <span class="text-xs text-slate-500">No. Rekening</span>
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono text-lg font-black text-white" id="account-number"><?php echo e($methodConfig['number']); ?></span>
                                            <button data-copy="<?php echo e($methodConfig['number']); ?>" onclick="copyText(this.dataset.copy, this)" class="rounded-lg bg-blue-500/20 px-2 py-1 text-[10px] font-bold text-blue-400 hover:bg-blue-500/30 transition">SALIN</button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between rounded-lg bg-white/5 p-3">
                                        <span class="text-xs text-slate-500">Atas Nama</span>
                                        <span class="text-sm font-bold text-white"><?php echo e($methodConfig['account_name']); ?></span>
                                    </div>
                                </div>
                            </div>

                        
                        <?php elseif($type === 'ewallet'): ?>
                            <div class="rounded-xl bg-[#0B0F1A] p-5 border border-white/5">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500"><?php echo e($methodConfig['description']); ?></p>
                                        <p class="text-lg font-black text-white mt-1"><?php echo e($methodConfig['label']); ?></p>
                                    </div>
                                    <div class="h-12 w-12 rounded-xl bg-green-500/10 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between rounded-lg bg-white/5 p-3">
                                        <span class="text-xs text-slate-500">Nomor <?php echo e($methodConfig['label']); ?></span>
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono text-lg font-black text-white"><?php echo e($methodConfig['number']); ?></span>
                                            <button data-copy="<?php echo e($methodConfig['number']); ?>" onclick="copyText(this.dataset.copy, this)" class="rounded-lg bg-green-500/20 px-2 py-1 text-[10px] font-bold text-green-400 hover:bg-green-500/30 transition">SALIN</button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between rounded-lg bg-white/5 p-3">
                                        <span class="text-xs text-slate-500">Atas Nama</span>
                                        <span class="text-sm font-bold text-white"><?php echo e($methodConfig['account_name']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <div class="mt-4 rounded-xl border border-blue-500/30 bg-blue-500/10 p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-blue-400">Jumlah yang harus dibayar:</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-xl font-black text-white" id="total-amount">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                                    <button data-copy="<?php echo e($order->total); ?>" onclick="copyText(this.dataset.copy, this)" class="rounded-lg bg-blue-500/20 px-2 py-1 text-[10px] font-bold text-blue-400 hover:bg-blue-500/30 transition">SALIN</button>
                                </div>
                            </div>
                            <p class="mt-2 text-[10px] text-blue-400/70">⚠️ Transfer tepat sesuai nominal di atas untuk mempermudah verifikasi</p>
                        </div>
                    </div>

                    
                    <?php if($order->canUploadProof()): ?>
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <h3 class="text-sm font-bold text-white mb-1">📎 Upload Bukti Pembayaran</h3>
                            <p class="text-xs text-slate-500 mb-5">Upload screenshot/foto bukti transfer. Format: JPG, PNG, WEBP. Maks: 4MB.</p>

                            <form action="<?php echo e(route('payment.proof', $order)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4" id="proofForm">
                                <?php echo csrf_field(); ?>

                                <div x-data="{ preview: null, dragging: false }"
                                     class="relative">
                                    <label
                                        @dragover.prevent="dragging = true"
                                        @dragleave.prevent="dragging = false"
                                        @drop.prevent="dragging = false; const f = $event.dataTransfer.files[0]; if(f) { preview = URL.createObjectURL(f); $refs.fileInput.files = $event.dataTransfer.files }"
                                        :class="dragging ? 'border-blue-500 bg-blue-500/10' : 'border-white/10 hover:border-blue-500/50 hover:bg-white/5'"
                                        class="flex flex-col items-center justify-center cursor-pointer rounded-2xl border-2 border-dashed p-8 transition-all"
                                    >
                                        <template x-if="!preview">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                                <p class="mt-3 text-sm font-bold text-slate-400">Klik atau seret foto bukti transfer</p>
                                                <p class="text-xs text-slate-600 mt-1">JPG, PNG, WEBP hingga 4MB</p>
                                            </div>
                                        </template>
                                        <template x-if="preview">
                                            <div class="w-full">
                                                <img :src="preview" class="mx-auto max-h-64 rounded-xl object-contain">
                                                <p class="mt-2 text-center text-xs text-slate-500">Klik untuk ganti foto</p>
                                            </div>
                                        </template>
                                        <input
                                            x-ref="fileInput"
                                            type="file"
                                            name="payment_proof"
                                            accept="image/*"
                                            class="hidden"
                                            @change="preview = URL.createObjectURL($event.target.files[0])"
                                            required
                                        >
                                    </label>
                                    <?php $__errorArgs = ['payment_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-xs text-red-400"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    Kirim Bukti Pembayaran
                                </button>
                            </form>
                        </div>

                    
                    <?php elseif($order->payment_status === 'proof_uploaded'): ?>
                        <div class="rounded-2xl border border-blue-500/20 bg-blue-500/10 p-6">
                            <div class="flex items-start gap-4">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-xl bg-blue-500/20">
                                    <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-blue-400">Bukti Pembayaran Terkirim ✓</p>
                                    <p class="mt-1 text-sm text-blue-400/70">Admin sedang memverifikasi pembayaran Anda. Proses biasanya 1×24 jam.</p>
                                    <?php if($order->payment_proof_uploaded_at): ?>
                                        <p class="mt-2 text-xs text-blue-400/50">Dikirim: <?php echo e($order->payment_proof_uploaded_at->format('d M Y, H:i')); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>" target="_blank" class="mt-3 inline-flex items-center gap-1 text-xs font-bold text-blue-400 hover:text-blue-300 transition">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Lihat bukti yang dikirim
                                    </a>
                                </div>
                            </div>
                        </div>

                    
                    <?php elseif($order->payment_status === 'rejected'): ?>
                        <div class="rounded-2xl border border-red-500/20 bg-red-500/10 p-6">
                            <p class="font-bold text-red-400">⚠️ Bukti Pembayaran Ditolak</p>
                            <?php if($order->payment_rejection_reason): ?>
                                <p class="mt-1 text-sm text-red-400/70">Alasan: <?php echo e($order->payment_rejection_reason); ?></p>
                            <?php endif; ?>
                            <p class="mt-2 text-xs text-red-400/50">Silakan upload ulang bukti pembayaran yang benar.</p>
                        </div>
                    <?php endif; ?>

                    
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">📋 Cara Pembayaran</h3>
                        <ol class="space-y-3">
                            <?php $__currentLoopData = [
                                'Transfer tepat sesuai nominal yang tertera',
                                'Screenshot/foto bukti transfer',
                                'Upload bukti di halaman ini',
                                'Admin akan memverifikasi dalam 1×24 jam',
                                'Pesanan otomatis diproses setelah dikonfirmasi',
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-start gap-3">
                                    <span class="flex h-6 w-6 flex-none items-center justify-center rounded-full bg-blue-500/20 text-[10px] font-black text-blue-400"><?php echo e($i + 1); ?></span>
                                    <span class="text-sm text-slate-400"><?php echo e($step); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>

                
                <div class="lg:sticky lg:top-24 space-y-5">
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Ringkasan Pesanan</h3>

                        
                        <?php
                            $psColor = match($order->payment_status) {
                                'paid'           => 'bg-emerald-500/10 text-emerald-400 ring-emerald-500/20',
                                'proof_uploaded' => 'bg-blue-500/10 text-blue-400 ring-blue-500/20',
                                'rejected'       => 'bg-red-500/10 text-red-400 ring-red-500/20',
                                default          => 'bg-yellow-500/10 text-yellow-400 ring-yellow-500/20',
                            };
                        ?>
                        <div class="mb-4 flex items-center gap-2">
                            <span class="inline-flex items-center rounded-full <?php echo e($psColor); ?> ring-1 px-3 py-1 text-xs font-bold">
                                <?php echo e($order->payment_status_label); ?>

                            </span>
                        </div>

                        <div class="space-y-2">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-[#0B0F1A] p-3">
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-white line-clamp-1"><?php echo e($item->product->name ?? 'Produk dihapus'); ?></p>
                                        <p class="text-xs text-slate-500"><?php echo e($item->quantity); ?> × Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                                    </div>
                                    <p class="flex-none text-sm font-black text-white">Rp <?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-4 space-y-2 border-t border-white/5 pt-4">
                            <?php $subtotal = $order->items->sum(fn($i) => $i->price * $i->quantity); ?>
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500">Subtotal</span>
                                <span class="text-white">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <?php if($order->discount > 0): ?>
                                <div class="flex justify-between text-xs text-emerald-400">
                                    <span>Diskon<?php echo e($order->coupon_code ? " ({$order->coupon_code})" : ''); ?></span>
                                    <span>- Rp <?php echo e(number_format($order->discount, 0, ',', '.')); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500">Ongkos Kirim</span>
                                <span class="<?php echo e($order->shipping_cost == 0 ? 'text-emerald-400' : 'text-white'); ?>">
                                    <?php echo e($order->shipping_cost == 0 ? 'GRATIS' : 'Rp ' . number_format($order->shipping_cost, 0, ',', '.')); ?>

                                </span>
                            </div>
                            <div class="flex justify-between border-t border-white/10 pt-3">
                                <span class="text-sm font-black text-white">Total Bayar</span>
                                <span class="text-xl font-black text-white">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-white/5 space-y-2">
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500">Metode Bayar</span>
                                <span class="font-bold text-white"><?php echo e($order->payment_method_label); ?></span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500">No. Pesanan</span>
                                <span class="font-bold text-white">#<?php echo e($order->id); ?></span>
                            </div>
                        </div>

                        <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn-secondary w-full !py-2.5 !rounded-xl !text-xs mt-5">
                            Lihat Detail Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyText(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const orig = btn.textContent;
                btn.textContent = 'TERSALIN!';
                btn.classList.add('bg-emerald-500/30', 'text-emerald-400');
                setTimeout(() => {
                    btn.textContent = orig;
                    btn.classList.remove('bg-emerald-500/30', 'text-emerald-400');
                }, 2000);
            });
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/payment/index.blade.php ENDPATH**/ ?>