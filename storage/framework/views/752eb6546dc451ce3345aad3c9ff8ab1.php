<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => false]));

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

foreach (array_filter((['active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<a
  class="<?php echo e($active?'bg-gray-900 border-b rounded-none rounded-t-md rounde text-white ': ' '); ?> text-white px-4 py-2 rounded-md text-xs hover:text-slate-100 transition duration-300 hover:bg-gray-500"
  <?php echo e($attributes); ?>><?php echo e($slot); ?></a>
<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" --><?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/nav-link.blade.php ENDPATH**/ ?>