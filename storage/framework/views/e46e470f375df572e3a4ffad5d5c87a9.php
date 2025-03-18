<!-- ## Utilizado en el index home -->
<div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div
      class="relative bg-gray-100 group relative border-b border-r rounded-lg border-gray-200 shadow-md shadow-gray-800">
      <!-- The Image -->
      <div class="w-full min-w-full h-62 bg-cover bg-no-repeat "
           style="background-image:url( <?php echo e($post->getImgPal()); ?>);">
      </div>
      <div class="w-full h-48 justify-items-center">
        <!-- The Title -->
        <h2 class="text-2xl font-semibold font-[Lobster] "><?php echo e($post->title); ?></h2>
        <h5 class="mt-2 font-[Lobster] text-sm"><?php echo e($post->user->name); ?></h5>
        <!-- The Content -->
        <p class="px-4 mt-4 line-clamp-4 ">  <?php echo $post->content; ?></p>
      </div>
      <div class="mt-2 p-2">
        <!-- The Categories -->
        <a class="font-semibold font-[Lobster] px-2 py-1 rounded"
           style="background: <?php echo e($post->category->bg_color); ?>; color:<?php echo e($post->category->color); ?>" href="<?php echo e(url('blog?category='.$post->category_id)); ?>

          "> <?php echo e($post->category->name); ?></a>
        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="font-semibold font-[Lobster] px-2 py-1 rounded"
             style="background: <?php echo e($tag->bg_color); ?>; color:<?php echo e($tag->color); ?>" href="<?php echo e(url('blog?tag='.$tag->id)); ?>

          "> <?php echo e($tag->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/juan/Herd/Tienda/resources/views/blog/index-content.blade.php ENDPATH**/ ?>