<div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div
      class="relative bg-gray-100 group relative border-b border-r rounded-lg border-gray-200 shadow-md shadow-gray-800">
      <div class="w-full grid grid-rows-subgrid justify-items-center">
        <!-- ## Oferta ## -->
        <div class="h-12 w-fit absolute top-8 -left-2 z-10 -rotate-45">
          <?php if($product->getHayOferta()): ?>
            <div
              class="flex justify-center rounded-tl-lg rounded-tr-lg items-center gap-x-1.5 px-2 py-1 text-sl font-medium text-white bg-green-600 ">
              <?php echo e($product->descuento."%"); ?><p>Descuento</p>
            </div>
          <?php endif; ?>
        </div>
        <!-- The Image -->
        <div class="w-full min-w-full h-62 bg-cover bg-no-repeat rounded-tl-lg rounded-tr-lg"
             style="background-image:url( <?php echo e($product->getImgPal()); ?>);">
        </div>
        <div class="flex flex-col items-center w-full justify-center gap-y-6 mb-4">
          <!-- Name -->
          <h3 class="z-12 text-xl font-bold text-gray-500 mt-2" data-role="name-product">
            <a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->name); ?> </a>
          </h3>
          <!-- ### PRECIOS ### -->
          <?php echo $__env->make('components.partials.precios', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <!-- ### UNIDADES ### -->
          <?php echo $__env->make('components.partials.unidades', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <!-- Corazón Favoritos -->
          <?php
            $enFavorites= strpos(request()->cookie('cookie_favorites'), $product->id);
          ?>
          <?php echo $__env->make('components.partials.heart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <!-- ## ESTRELLAS ## -->
          <?php echo $__env->make('components.partials.stars', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <!-- ## CATERGORÍAS Y TAGS ## -->
        <div class="gap-0.5 min-h-28 w-full justify-items-center">
          <?php echo $__env->make('components.partials.categorias-tags', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/juan/Herd/Tienda/resources/views/product/index-content.blade.php ENDPATH**/ ?>