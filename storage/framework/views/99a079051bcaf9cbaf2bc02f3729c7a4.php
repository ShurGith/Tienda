<?php if($product->units): ?>
    <span
        class="flex max-w-fit items-center justify-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 gap-x-1.5 border border-green-500">
        <svg class="fill-green-500 size-1.5" viewBox="0 0 6 6" aria-hidden="true">
            <circle cx="3" cy="3" r="3"/>
        </svg>
         <?php echo e($product->units); ?> <?php echo e(__('units in stock')); ?>

    </span>
<?php else: ?>
    <span
        class="inline-flex max-w-fit items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 gap-x-1.5 border border-red-500">
        <svg class="fill-red-500 size-1.5" viewBox="0 0 6 6" aria-hidden="true">
            <circle cx="3" cy="3" r="3"/>
         </svg>
        <?php echo e(__('Out of Stock')); ?>

    </span>
<?php endif; ?>
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/unidades.blade.php ENDPATH**/ ?>