<?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['color' => 'danger','outlined' => !$isShow,'tooltip' => __('hookshelper::hookshelper.tooltip', ['action' => $isShow ? __('hookshelper::hookshelper.deactivate') : __('hookshelper::hookshelper.activate')]),'icon' => config('hookshelper.icon') ?? 'heroicon-m-cursor-arrow-rays','wire:click' => 'changeVisibility']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','outlined' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$isShow),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('hookshelper::hookshelper.tooltip', ['action' => $isShow ? __('hookshelper::hookshelper.deactivate') : __('hookshelper::hookshelper.activate')])),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('hookshelper.icon') ?? 'heroicon-m-cursor-arrow-rays'),'wire:click' => 'changeVisibility']); ?>
    <!--[if BLOCK]><![endif]--><?php if (! (config('hookshelper.tiny_toggle'))): ?>
        <?php echo e($isShow ? __('hookshelper::hookshelper.hide') : __('hookshelper::hookshelper.show')); ?>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php /**PATH /Users/juanjose/Herd/Tienda/vendor/agencetwogether/hookshelper/src/../resources/views/livewire/toggle-hooks.blade.php ENDPATH**/ ?>