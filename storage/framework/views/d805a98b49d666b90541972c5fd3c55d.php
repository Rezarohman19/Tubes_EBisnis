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
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h2 class="section-heading">👤 Profil Saya</h2>
                    <p class="section-subheading">Kelola informasi akun dan keamanan Anda</p>
                </div>
            </div>

            
            <div class="mb-8 rounded-2xl border border-gray-100/80 bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 p-8 shadow-lg">
                <div class="flex items-center gap-5">
                    <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white/20 text-3xl font-black text-white backdrop-blur-sm ring-4 ring-white/20">
                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-white"><?php echo e(Auth::user()->name); ?></h3>
                        <p class="mt-1 text-sm font-medium text-white/70"><?php echo e(Auth::user()->email); ?></p>
                        <p class="mt-2 text-xs font-bold text-white/50 uppercase tracking-wider">Member sejak <?php echo e(Auth::user()->created_at->format('d M Y')); ?></p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                
                <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50">
                            <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Informasi Profil</h3>
                            <p class="text-xs text-gray-500">Perbarui nama dan email akun Anda</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                
                <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50">
                            <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Ubah Password</h3>
                            <p class="text-xs text-gray-500">Pastikan password Anda aman dan kuat</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                
                <div class="rounded-2xl border border-red-100/80 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50">
                            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-red-900">Hapus Akun</h3>
                            <p class="text-xs text-red-500">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
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
<?php /**PATH C:\Users\asus1\OneDrive\Documents\xampp_terbaru\htdocs\Tubes_EBisnis\resources\views/profile/edit.blade.php ENDPATH**/ ?>