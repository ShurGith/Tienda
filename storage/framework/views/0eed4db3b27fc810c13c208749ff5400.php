<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([ 'textFinal' => 'text-base', ]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([ 'textFinal' => 'text-base', ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div class="flex justify-center items-center gap-x-8">
  <?php if($product->oferta): ?>
    <h4 class="text-red-400 line-through text-sm font-medium text-gray-900"><?php echo e($product->precios( false )); ?>

      <span
        class="text-xs pl-1 align-super  "><?php echo e($product->precios( false, true )); ?></span> €
    </h4>
  <?php endif; ?>
  <h4 class=" <?php echo e($textFinal); ?>  font-medium text-gray-500"><?php echo e($product->precios(true)); ?><span
      class="text-xs pl-1 align-super  "><?php echo e($product->precios(true,true)); ?></span>
    €</h4>
</div>
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/precios.blade.php ENDPATH**/ ?>