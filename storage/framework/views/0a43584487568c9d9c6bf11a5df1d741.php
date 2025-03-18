<a href="<?php echo e(url('/?tag='.$tag->id)); ?>">
  <div class="flex items-center gap-1 py-1 px-2.5 rounded text-xs"
       style="background:<?php echo e($tag->bgcolor); ?>; color:<?php echo e($tag->color); ?>">
    <?php if($tag->icon_active): ?>
      <div class="mr-1" style="color:<?php echo e($tag->color); ?>">
        <?php if(isset($tag->icon)): ?>
          <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($tag->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
        <?php endif; ?>
      </div>
    <?php elseif($tag->image): ?>
      <img src="<?php echo e(asset($tag->image)); ?>"
           alt="<?php echo e($tag->name.' image'); ?>"
           class="w-6 rounded-full"/>
    <?php endif; ?>
    <p><?php echo e($tag->name); ?></p>
  </div>
</a><?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/tag-div.blade.php ENDPATH**/ ?>