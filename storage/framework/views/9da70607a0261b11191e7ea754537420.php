<a href="<?php echo e(url('/?category='.$product->category->id)); ?>">
  
  <div class="flex items-center gap-1 py-1 px-2.5 rounded text-xs"
       style="background:<?php echo e($product->category->bgcolor); ?>; color:<?php echo e($product->category->color); ?>">
    <?php if($product->category->icon_active): ?>
      <div class="mr-1" style="color:<?php echo e($category->color); ?>">
        <?php if(isset($product->category->icon)): ?>
          <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($product->category->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <?php elseif($product->category->image): ?>
      <img src="<?php echo e(asset($product->category->image)); ?>"
           alt="<?php echo e($product->category->name.' image'); ?>"
           class="w-6 rounded-full"/>
    <?php endif; ?>
    <p><?php echo e($product->category->name); ?></p>
  </div>
</a><?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/category-div.blade.php ENDPATH**/ ?>