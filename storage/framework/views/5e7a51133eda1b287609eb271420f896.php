<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'enFavorites' => strpos(request()->cookie('cookie_favorites'), $product->id),
  ]));

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

foreach (array_filter(([
    'enFavorites' => strpos(request()->cookie('cookie_favorites'), $product->id),
  ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<style>
    [data-tipo="heart-button"]:hover [data-role='tooltip'] {
        opacity: 1;
        transform: translate(25%, -120%);
        z-index: 100;
    }
</style>
<div data-id="<?php echo e($product->id); ?>" data-tipo="heart-button" data-nameproduct="<?php echo e($product->name); ?>"
     class="<?php echo e($enFavorites ? 'text-green-500': ''); ?> cursor-pointer border text-xs flex items-center bg-gray-50 pr-2 text-gray-400 hover:bg-gray-300">
  <button>
    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-heart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(request()->routeIs('products.show')?'h-10 w-10': 'h-6 w-6').' ']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
    <span class="sr-only"><?php echo e($enFavorites ? __('Add to favorites') :  __('In favorites')); ?></span>
  </button>
  <p id="in-favorites" data-tipo="tip-text"
     class="<?php echo e($enFavorites ? '': 'hidden'); ?> font-semibold"><?php echo e(__('In favorites')); ?></p>
  <p id="add-favorite" data-tipo="tip-text"
     class="<?php echo e($enFavorites ? 'hidden': ''); ?> font-semibold"><?php echo e(__('Add to favorites')); ?></p>
  <div class="min-w-max max-h-8 transition-all duration-200 absolute bg-black opacity-0 px-2 py-1 rounded"
       data-role="tooltip">
    <span data-tipo="tip-text"
          class="<?php echo e($enFavorites ? '': 'hidden '); ?>relative z-1 text-white font-bold text-xs"><?php echo e(__('Click remove favorites')); ?></span>
    <span data-tipo="tip-text"
          class="<?php echo e($enFavorites ? 'hidden ': ''); ?>relative z-1 text-white font-bold text-xs"><?php echo e(__('Click add to favorites')); ?></span>
    <div class="w-4 h-10 bg-black rotate-70 -translate-y-3.5 translate-x-8"></div>
  </div>
</div>
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/partials/heart.blade.php ENDPATH**/ ?>