<?php if (isset($component)) { $__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.page','data' => ['metaTitle' => isset($title )? $title . ' - ' .config('app.name') : config('app.name'),'headerText' => isset($title) ? $title . ' - ' .config('app.name') : config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['meta-title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($title )? $title . ' - ' .config('app.name') : config('app.name')),'header-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($title) ? $title . ' - ' .config('app.name') : config('app.name'))]); ?>
  
  <?php echo $__env->make('product.index-content', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <div class="h-4 w-full"></div>
  <?php echo $__env->make('blog.index-content', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd)): ?>
<?php $attributes = $__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd; ?>
<?php unset($__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd)): ?>
<?php $component = $__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd; ?>
<?php unset($__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd); ?>
<?php endif; ?><?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/layouts/home.blade.php ENDPATH**/ ?>