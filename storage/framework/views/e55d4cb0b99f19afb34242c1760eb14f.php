<?php echo $__env->make('components.partials.category-div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- Tags -->
<?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($tag->category_id === $product->category->id): ?>
    <div class="mt-0.5" style="margin-left: <?php echo e(20 + (20 * $index+1)); ?>px">
      <?php echo $__env->make('components.partials.tag-div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Tags -->
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/categorias-tags.blade.php ENDPATH**/ ?>