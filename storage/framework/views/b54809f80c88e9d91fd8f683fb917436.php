<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Frozymart')); ?> — Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen flex">
            
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900">
                
                <div class="absolute inset-0">
                    <div class="absolute -left-20 -top-20 h-80 w-80 rounded-full bg-blue-600/30 blur-3xl animate-blob"></div>
                    <div class="absolute right-10 top-1/3 h-64 w-64 rounded-full bg-violet-600/20 blur-3xl animate-blob animation-delay-2000"></div>
                    <div class="absolute -bottom-10 left-1/3 h-72 w-72 rounded-full bg-indigo-500/20 blur-3xl animate-blob animation-delay-4000"></div>
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wMykiLz48L3N2Zz4=')] opacity-60"></div>
                </div>

                
                <div class="relative flex flex-col justify-between p-12 z-10">
                    <a href="/" class="flex items-center gap-3 group">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 backdrop-blur-xl border border-white/10 transition-all group-hover:bg-white/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-xl font-black text-white tracking-tight">Frozy<span class="text-blue-400">mart</span></span>
                    </a>

                    <div class="my-auto max-w-md">
                        <h2 class="text-4xl font-black leading-tight text-white">
                            Belanja <span class="bg-gradient-to-r from-blue-400 to-violet-400 bg-clip-text text-transparent">Frozen Food</span> Jadi Lebih Mudah
                        </h2>
                        <p class="mt-6 text-base leading-relaxed text-slate-400">Temukan koleksi lengkap makanan beku berkualitas tinggi dengan harga terbaik. Dikirim segar ke pintu rumah Anda.</p>

                        <div class="mt-10 grid grid-cols-3 gap-4">
                            <?php $__currentLoopData = [
                                ['value' => '500+', 'label' => 'Produk'],
                                ['value' => '10K+', 'label' => 'Customer'],
                                ['value' => '4.9⭐', 'label' => 'Rating'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                                    <p class="text-xl font-black text-white"><?php echo e($stat['value']); ?></p>
                                    <p class="mt-1 text-xs font-medium text-slate-400"><?php echo e($stat['label']); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <p class="text-xs font-medium text-slate-500">© <?php echo e(date('Y')); ?> Frozymart. All rights reserved.</p>
                </div>
            </div>

            
            <div class="flex w-full items-center justify-center px-6 py-12 lg:w-1/2 bg-[#0B0F1A]">
                <div class="w-full max-w-md">
                    
                    <div class="mb-10 text-center lg:hidden">
                        <a href="/" class="inline-flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/25">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            </div>
                            <span class="text-2xl font-black text-white tracking-tight">Frozy<span class="text-gradient">mart</span></span>
                        </a>
                    </div>

                    <?php echo e($slot); ?>

                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\nurai\Tubes_EBisnis\resources\views/layouts/guest.blade.php ENDPATH**/ ?>