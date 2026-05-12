
<?php $__env->startSection('page-title', 'Maintenance'); ?>
<?php $__env->startSection('content'); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($requests->isEmpty()): ?>
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🔧</div>
    <h3>No maintenance requests.</h3>
    <p>Requests submitted by tenants will appear here.</p>
  </div>
<?php else: ?>
<div class="db-card">
  <div class="db-table-wrap">
    <table class="db-table">
      <thead><tr><th>Property</th><th>Tenant</th><th>Title</th><th>Category</th><th>Submitted</th><th>Status</th><th></th></tr></thead>
      <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <div class="db-flag-name">
              <span class="db-flag"><?php echo e(config('countries.'.$mr->lease->property->country_code.'.flag','🏠')); ?></span>
              <div class="db-name"><?php echo e($mr->lease->property->name); ?></div>
            </div>
          </td>
          <td><?php echo e($mr->raisedBy->first_name ?? '—'); ?></td>
          <td><strong><?php echo e($mr->title); ?></strong></td>
          <td><span class="badge badge-navy"><?php echo e(ucfirst($mr->category)); ?></span></td>
          <td><?php echo e($mr->created_at->format('d M Y')); ?></td>
          <td>
            <span class="badge badge-<?php echo e(match($mr->status){'submitted'=>'terra','acknowledged'=>'gold','in_progress'=>'navy','resolved'=>'green',default=>'grey'}); ?>">
              <?php echo e(ucfirst(str_replace('_',' ',$mr->status))); ?>

            </span>
          </td>
          <td>
            <form method="POST" action="<?php echo e(route('maintenance.update',$mr)); ?>" style="display:inline">
              <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
              <select name="status" class="db-select" style="font-size:12px;padding:4px 28px 4px 8px;width:auto" onchange="this.form.submit()">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['submitted','acknowledged','in_progress','resolved']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($s); ?>" <?php echo e($mr->status===$s?'selected':''); ?>><?php echo e(ucfirst(str_replace('_',' ',$s))); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
              </select>
            </form>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fxepro\AIProjects\RentersMaxx\resources\views/dashboard/maintenance/index.blade.php ENDPATH**/ ?>