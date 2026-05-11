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
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            
            <div class="mb-6 flex items-center gap-2 text-sm">
                <a href="<?php echo e(route('orders.index')); ?>" class="font-medium text-slate-500 hover:text-blue-500 transition-colors">Pesanan</a>
                <svg class="h-4 w-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="<?php echo e(route('orders.show', $order)); ?>" class="font-medium text-slate-500 hover:text-blue-500 transition-colors">#<?php echo e($order->id); ?></a>
                <svg class="h-4 w-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-white">Beri Ulasan</span>
            </div>

            <div class="mb-8">
                <h2 class="section-heading">⭐ Beri Ulasan</h2>
                <p class="section-subheading">Bagikan pengalaman Anda tentang produk yang sudah dibeli</p>
            </div>

            <form action="<?php echo e(route('reviews.store', $order)); ?>" method="POST" class="space-y-6" x-data="reviewForm()">
                <?php echo csrf_field(); ?>

                <?php $__currentLoopData = $pendingItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $product = $item->product; ?>
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        
                        <div class="flex items-center gap-4 mb-6">
                            <?php if($product->image): ?>
                                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"
                                     class="h-16 w-16 flex-none rounded-xl object-cover ring-1 ring-white/10">
                            <?php else: ?>
                                <div class="flex h-16 w-16 flex-none items-center justify-center rounded-xl bg-[#0B0F1A] border border-white/5">
                                    <svg class="h-8 w-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="font-bold text-white"><?php echo e($product->name); ?></h3>
                                <p class="text-xs text-slate-500 mt-1"><?php echo e($item->quantity); ?> × Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                            </div>
                        </div>

                        <input type="hidden" name="reviews[<?php echo e($index); ?>][product_id]" value="<?php echo e($product->id); ?>">

                        
                        <div class="mb-5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Rating</label>
                            <div class="flex items-center gap-2" x-data="starRating(<?php echo e($index); ?>)">
                                <?php for($star = 1; $star <= 5; $star++): ?>
                                    <button type="button"
                                        @click="setRating(<?php echo e($star); ?>)"
                                        @mouseover="hovered = <?php echo e($star); ?>"
                                        @mouseleave="hovered = 0"
                                        class="transition-all duration-100 hover:scale-110 focus:outline-none">
                                        <svg class="h-9 w-9 transition-colors duration-100"
                                             :class="(hovered >= <?php echo e($star); ?> || rating >= <?php echo e($star); ?>) ? 'text-amber-400 fill-amber-400' : 'text-slate-700 fill-slate-700'"
                                             viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                    </button>
                                <?php endfor; ?>
                                <span class="ml-2 text-sm font-bold text-slate-400" x-text="ratingLabel()"></span>
                                <input type="hidden" name="reviews[<?php echo e($index); ?>][rating]" :value="rating" x-ref="ratingInput<?php echo e($index); ?>">
                            </div>
                            <?php $__errorArgs = ["reviews.{$index}.rating"];
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

                        
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                                Komentar <span class="text-slate-600 normal-case font-normal">(opsional)</span>
                            </label>
                            <textarea
                                name="reviews[<?php echo e($index); ?>][comment]"
                                rows="3"
                                placeholder="Ceritakan pengalaman Anda tentang produk ini..."
                                class="input-field !rounded-xl !text-sm resize-none"
                            ><?php echo e(old("reviews.{$index}.comment")); ?></textarea>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="flex gap-3">
                    <button type="submit"
                            class="btn-primary flex-1 !py-4 !rounded-xl !text-sm">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Kirim Ulasan
                    </button>
                    <a href="<?php echo e(route('orders.show', $order)); ?>"
                       class="btn-secondary !py-4 !px-6 !rounded-xl !text-sm">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function starRating(index) {
            return {
                rating: 0,
                hovered: 0,
                setRating(val) {
                    this.rating = val;
                },
                ratingLabel() {
                    const labels = ['', 'Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Sangat Bagus'];
                    return labels[this.hovered || this.rating] || 'Pilih rating';
                }
            }
        }

        function reviewForm() {
            return {};
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
<?php endif; ?><?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/reviews/create.blade.php ENDPATH**/ ?>