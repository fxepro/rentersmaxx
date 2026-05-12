

<nav class="rm-nav" id="rmNav" data-page="<?php echo e($page ?? ''); ?>">
  <a href="<?php echo e(url('/')); ?>" class="rm-nav-logo">Renters<span>maxx</span></a>
  <ul class="rm-nav-links">
    <li><a href="<?php echo e(url('/how-it-works')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'how-it-works']); ?>">How it works</a></li>
    <li><a href="<?php echo e(url('/features')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'features']); ?>">Features</a></li>
    <li><a href="<?php echo e(url('/pricing')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'pricing']); ?>">Pricing</a></li>
    <li><a href="<?php echo e(url('/countries')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'countries']); ?>">Countries</a></li>
  </ul>
  <div class="rm-nav-cta">
    <a href="<?php echo e(url('/login')); ?>" class="rm-btn rm-btn-ghost">Sign in</a>
    <a href="<?php echo e(url('/waitlist')); ?>" class="rm-btn rm-btn-primary">Join waitlist →</a>
  </div>
  <button class="rm-hamburger" id="rmBurger" aria-label="Menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>

<div class="rm-drawer" id="rmDrawer">
  <a href="<?php echo e(url('/how-it-works')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'how-it-works']); ?>">How it works</a>
  <a href="<?php echo e(url('/features')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'features']); ?>">Features</a>
  <a href="<?php echo e(url('/pricing')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'pricing']); ?>">Pricing</a>
  <a href="<?php echo e(url('/countries')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => ($page ?? '') === 'countries']); ?>">Countries</a>
  <div class="rm-drawer-cta">
    <a href="<?php echo e(url('/login')); ?>" class="rm-btn rm-btn-ghost">Sign in</a>
    <a href="<?php echo e(url('/waitlist')); ?>" class="rm-btn rm-btn-primary">Join waitlist →</a>
  </div>
</div>
<?php /**PATH C:\Users\fxepro\AIProjects\RentersMaxx\resources\views/partials/nav.blade.php ENDPATH**/ ?>