<div class="group/item cursor-help w-6 h-6 relative flex justify-center w-full">
  <?php if($product->stars > 10): ?>
    <h3 class="sr-only"><?php echo e(__('Reviews')); ?></h3>
    
    <span
      class="opacity-0 cursor-help transition-all duration-300 group-hover/item:opacity-100 absolute px-2 py-1 rounded text-xs font-semibold text-white bg-black -bottom-4"><?php echo e(__('Rating:')); ?> <?php echo e($product->stars / 10); ?></span>
    <?php echo $product->getStars(); ?>

  <?php endif; ?>
</div>
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/stars.blade.php ENDPATH**/ ?>