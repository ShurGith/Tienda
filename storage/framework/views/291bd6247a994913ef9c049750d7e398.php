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
  
  <!-- ## Utilizado en el index home -->
  <?php echo $post->content; ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd)): ?>
<?php $attributes = $__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd; ?>
<?php unset($__attributesOriginalb5280bddbfa34a5e8ea8faa43ffebbfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd)): ?>
<?php $component = $__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd; ?>
<?php unset($__componentOriginalb5280bddbfa34a5e8ea8faa43ffebbfd); ?>
<?php endif; ?><?php /**PATH /Users/juanjose/Herd/Tienda/resources/views/blog/show.blade.php ENDPATH**/ ?>