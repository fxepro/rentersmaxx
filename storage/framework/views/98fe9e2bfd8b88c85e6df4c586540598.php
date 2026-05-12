
<?php $__env->startSection('page-title', 'Properties'); ?>
<?php $__env->startSection('topbar-actions'); ?>
  <div style="display:flex;align-items:center;gap:8px">
    <div style="display:flex;background:var(--cream-dark);border-radius:8px;padding:3px;gap:2px" id="viewToggle">
      <button onclick="setView('card')" id="btnCard" class="view-btn active" title="Card view">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="1" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="1" y="9" width="6" height="6" rx="1.5" fill="currentColor"/><rect x="9" y="9" width="6" height="6" rx="1.5" fill="currentColor"/></svg>
      </button>
      <button onclick="setView('table')" id="btnTable" class="view-btn" title="Table view">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="2" width="14" height="2.5" rx="1" fill="currentColor"/><rect x="1" y="6.5" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/><rect x="1" y="11" width="14" height="2.5" rx="1" fill="currentColor" opacity=".5"/></svg>
      </button>
    </div>
    <a href="<?php echo e(route('properties.create')); ?>" class="db-btn db-btn-primary">+ Add property</a>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.view-btn { display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:6px;border:none;background:transparent;color:var(--text-light);cursor:pointer;transition:all 0.15s; }
.view-btn.active { background:var(--white);color:var(--text-dark);box-shadow:0 1px 3px rgba(0,0,0,0.1); }
.view-btn:hover:not(.active) { color:var(--text-mid); }

/* ── CARD VIEW ── */
#cardView { display:grid;grid-template-columns:repeat(3,1fr);gap:16px; }
#tableView { display:none; }

/* ── PROPERTY CARD ── */
.prop-card { background:var(--white);border:1px solid var(--cream-dark);border-radius:var(--radius);padding:22px;transition:all 0.15s;text-decoration:none;display:block;position:relative;overflow:hidden; }
.prop-card::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--terra);opacity:0;transition:opacity 0.2s; }
.prop-card:hover { border-color:rgba(196,98,45,0.3);box-shadow:0 4px 16px rgba(0,0,0,0.06);transform:translateY(-1px); }
.prop-card:hover::before { opacity:1; }
.prop-card-top { display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:14px; }
.prop-card-flag { font-size:28px;line-height:1; }
.prop-card-name { font-size:16px;font-weight:600;color:var(--text-dark);margin-bottom:3px;line-height:1.3; }
.prop-card-addr { font-size:13px;color:var(--text-light); }
.prop-card-divider { height:1px;background:var(--cream-dark);margin:14px 0; }
.prop-card-rent { font-family:'Fraunces',serif;font-size:22px;color:var(--text-dark);letter-spacing:-0.02em;margin-bottom:3px; }
.prop-card-meta { font-size:12px;color:var(--text-light);display:flex;gap:12px;flex-wrap:wrap;align-items:center; }
.prop-card-footer { display:flex;align-items:center;justify-content:space-between;margin-top:14px;padding-top:14px;border-top:1px solid var(--cream-dark); }
.prop-card-method { display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-light); }

@media (max-width:1200px) { #cardView { grid-template-columns:repeat(2,1fr); } }
@media (max-width:800px) { #cardView { grid-template-columns:1fr; } }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($properties->isEmpty()): ?>
  <div class="db-empty" style="min-height:60vh">
    <div class="db-empty-icon">🏠</div>
    <h3>No properties yet.</h3>
    <p>Add your first property to start collecting rent.</p>
    <a href="<?php echo e(route('properties.create')); ?>" class="db-btn db-btn-primary">+ Add property</a>
  </div>
<?php else: ?>

  
  <div id="cardView">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $lease   = $p->leases->where('status','active')->first();
      $country = config('countries.'.$p->country_code, []);
      $flags   = ['FR'=>'🇫🇷','GB'=>'🇬🇧','US'=>'🇺🇸','IN'=>'🇮🇳','DE'=>'🇩🇪','AU'=>'🇦🇺','CA'=>'🇨🇦','NG'=>'🇳🇬','ID'=>'🇮🇩','PH'=>'🇵🇭','BR'=>'🇧🇷','MX'=>'🇲🇽','ZA'=>'🇿🇦','KE'=>'🇰🇪','SG'=>'🇸🇬','JP'=>'🇯🇵','ES'=>'🇪🇸','IT'=>'🇮🇹','NL'=>'🇳🇱','PT'=>'🇵🇹','BE'=>'🇧🇪','SE'=>'🇸🇪','NO'=>'🇳🇴','DK'=>'🇩🇰','PL'=>'🇵🇱','CH'=>'🇨🇭','MY'=>'🇲🇾','TH'=>'🇹🇭','VN'=>'🇻🇳'];
      $flag    = $flags[$p->country_code] ?? "🏠";
    ?>
    <a href="<?php echo e(route('properties.show',$p)); ?>" class="prop-card">
      <div class="prop-card-top">
        <span class="prop-card-flag"><?php echo e($flag); ?></span>
        <span class="badge <?php echo e($lease ? 'badge-green' : 'badge-grey'); ?>"><?php echo e($lease ? 'Tenanted' : 'Vacant'); ?></span>
      </div>
      <div class="prop-card-name"><?php echo e($p->name); ?></div>
      <div class="prop-card-addr"><?php echo e($p->city); ?>, <?php echo e($p->country_code); ?></div>
      <div class="prop-card-divider"></div>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lease): ?>
        <div class="prop-card-rent"><?php echo e(number_format($lease->rent_minor_units/100,0)); ?> <span style="font-size:15px;color:var(--text-light)"><?php echo e($lease->currency_code); ?></span></div>
        <div class="prop-card-meta">
          <?php $day=$lease->due_day; $sfx=$day===1?'st':($day===2?'nd':($day===3?'rd':'th')); ?>
          <span>Due <?php echo e($day); ?><?php echo e($sfx); ?></span>
          <span>·</span>
          <span><?php echo e($lease->tenant->first_name ?? '—'); ?> <?php echo e($lease->tenant->last_name ?? ''); ?></span>
        </div>
      <?php else: ?>
        <div class="prop-card-rent" style="font-size:16px;color:var(--text-light)">No active lease</div>
        <div class="prop-card-meta">Add a tenant →</div>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <div class="prop-card-footer">
        <div class="prop-card-method">
          <span><?php echo e($country['method'] ?? '—'); ?></span>
        </div>
        <span style="font-size:12px;color:var(--text-light)"><?php echo e(ucfirst($p->type)); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->bedrooms): ?> · <?php echo e($p->bedrooms); ?>bd <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span>
      </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </div>

  
  <div id="tableView">
    <div class="db-card">
      <div class="db-table-wrap">
        <table class="db-table">
          <thead>
            <tr>
              <th>Property</th>
              <th>Country</th>
              <th>Tenant</th>
              <th>Rent / mo</th>
              <th>Method</th>
              <th>Due</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $lease   = $p->leases->where('status','active')->first();
              $flags = ["FR"=>"🇫🇷","GB"=>"🇬🇧","US"=>"🇺🇸","IN"=>"🇮🇳","DE"=>"🇩🇪","AU"=>"🇦🇺","CA"=>"🇨🇦","NG"=>"🇳🇬","ID"=>"🇮🇩","PH"=>"🇵🇭","BR"=>"🇧🇷","MX"=>"🇲🇽","ZA"=>"🇿🇦","KE"=>"🇰🇪","SG"=>"🇸🇬","JP"=>"🇯🇵","ES"=>"🇪🇸","IT"=>"🇮🇹","NL"=>"🇳🇱","PT"=>"🇵🇹","BE"=>"🇧🇪","SE"=>"🇸🇪","NO"=>"🇳🇴","DK"=>"🇩🇰","PL"=>"🇵🇱","CH"=>"🇨🇭","MY"=>"🇲🇾","TH"=>"🇹🇭","VN"=>"🇻🇳"];
              $flag    = $flags[$p->country_code] ?? "🏠";
              $country = config("countries.".$p->country_code,[]);
            ?>
            <tr>
              <td>
                <div style="display:flex;align-items:center;gap:10px">
                  <span style="font-size:20px"><?php echo e($flag); ?></span>
                  <div>
                    <div style="font-weight:600;color:var(--text-dark)"><?php echo e($p->name); ?></div>
                    <div style="font-size:12px;color:var(--text-light)"><?php echo e($p->city); ?></div>
                  </div>
                </div>
              </td>
              <td><?php echo e($p->country_code); ?></td>
              <td>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lease): ?>
                  <strong><?php echo e($lease->tenant->first_name); ?> <?php echo e($lease->tenant->last_name); ?></strong>
                <?php else: ?>
                  <span style="color:var(--text-light)">—</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
              </td>
              <td>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lease): ?>
                  <strong><?php echo e(number_format($lease->rent_minor_units/100,0)); ?> <?php echo e($lease->currency_code); ?></strong>
                <?php else: ?> —<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
              </td>
              <td><?php echo e($country['method'] ?? '—'); ?></td>
              <td><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lease): ?><?php echo e($lease->due_day); ?>th <?php else: ?> —<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></td>
              <td><span class="badge <?php echo e($lease ? 'badge-green' : 'badge-grey'); ?>"><?php echo e($lease ? 'Tenanted' : 'Vacant'); ?></span></td>
              <td><a href="<?php echo e(route('properties.show',$p)); ?>" class="db-btn db-btn-ghost" style="font-size:13px;padding:6px 12px">View →</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function setView(v) {
  document.getElementById('cardView').style.display  = v==='card'  ? 'grid' : 'none';
  document.getElementById('tableView').style.display = v==='table' ? 'block': 'none';
  document.getElementById('btnCard').classList.toggle('active',  v==='card');
  document.getElementById('btnTable').classList.toggle('active', v==='table');
  localStorage.setItem('propView', v);
}
// Restore last used view
const saved = localStorage.getItem('propView');
if (saved) setView(saved);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fxepro\AIProjects\RentersMaxx\resources\views/dashboard/properties/index.blade.php ENDPATH**/ ?>