<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title><?php echo $__env->yieldContent('title', 'Rentersmaxx — Collect rent anywhere. Get paid everywhere.'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'One app to manage rental properties across any country. Collect rent locally in EUR, INR, GBP and more. See everything in your currency.'); ?>">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700;1,9..144,300;1,9..144,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->environment('local') && !file_exists(public_path('build/manifest.json'))): ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>?v=<?php echo e(filemtime(public_path('css/app.css'))); ?>">
<?php else: ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>


<?php echo $__env->make('partials.nav', ['page' => $page ?? ''], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($hideFooter ?? false)): ?>
  <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->environment('local') && !file_exists(public_path('build/manifest.json'))): ?>
    <script src="<?php echo e(asset('js/app.js')); ?>?v=<?php echo e(filemtime(public_path('js/app.js'))); ?>"></script>
<?php else: ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\Users\fxepro\AIProjects\RentersMaxx\resources\views/layouts/app.blade.php ENDPATH**/ ?>