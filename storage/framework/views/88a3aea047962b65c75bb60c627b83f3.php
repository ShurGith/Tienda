<nav class="bg-gray-800 z-10 relative">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="border-b border-gray-700">
      <div class="flex h-16 items-center justify-between px-4 sm:px-0">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-12"
                 src="<?php echo e(asset('storage/images/page/logo.png')); ?>"
                 alt="Your Company"/>
          </div>
          <div class="md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <?php if (isset($component)) { $__componentOriginale2a6816755260a4bbf43972810030683 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2a6816755260a4bbf43972810030683 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.nav-link','data' => ['href' => ''.e(route('home')).'','active' => request()->routeIs('home')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('home'))]); ?><?php echo e(__('Home')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $attributes = $__attributesOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__attributesOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $component = $__componentOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__componentOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
                <?php
                  $url =  Auth::user()->isAdmin() ? '/admin/login':'/user';
                ?>
                <a href="<?php echo e(url( Auth::user()->isAdmin() ? '/admin':'/user')); ?>"
                   class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
              <?php endif; ?>
              <?php if (isset($component)) { $__componentOriginale2a6816755260a4bbf43972810030683 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2a6816755260a4bbf43972810030683 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.nav-link','data' => ['href' => ''.e(route('products.index')).'','active' => request()->routeIs('products.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('products.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('products.index'))]); ?><?php echo e(__('Productos')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $attributes = $__attributesOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__attributesOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $component = $__componentOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__componentOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginale2a6816755260a4bbf43972810030683 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2a6816755260a4bbf43972810030683 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.nav-link','data' => ['href' => ''.e(route('blog.index')).'','active' => request()->routeIs('blog.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('blog.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('blog.index'))]); ?><?php echo e(__('Blog')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $attributes = $__attributesOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__attributesOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2a6816755260a4bbf43972810030683)): ?>
<?php $component = $__componentOriginale2a6816755260a4bbf43972810030683; ?>
<?php unset($__componentOriginale2a6816755260a4bbf43972810030683); ?>
<?php endif; ?>
              <a href="#"
                 class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
              <a href="#"
                 class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <?php
              $myc = json_decode(request()->cookie('cookie_favorites', '[]'), true);
              if($myc)
                 $countFavos = count($myc);
              else
               $countFavos=false;
            ?>
            <div id="div-favorites" class="relative <?php echo e($countFavos ? '': 'hidden'); ?>">
              <a href="<?php echo e(route('favorites')); ?>">
                <div
                  class="absolute -left-2 -top-2 bg-white rounded-full w-4 h-4 flex  justify-center items-center">
                  <p class="text-black text-xs contador"><?php echo e($countFavos); ?></p>
                </div>
                <svg class="size-6 shrink-0 text-gray-300 <?php echo e($countFavos ?? 'hidden'); ?> " fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                </svg>
              </a>
            </div>
            <!-- Notificaciones -->
            <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                   aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
              </svg>
            </button>
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <?php if(auth()->guard()->check()): ?>
                <div>
                  <button type="button"
                          class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm"
                          id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <img id="imag-menu" class="size-8 rounded-full"
                         src="<?php echo e(Auth::user()->getFilamentAvatarUrl() ?? Avatar::create( Auth::user()->name)->toBase64()); ?>"
                         alt="">
                  </button>
                </div>
              <?php endif; ?>
              <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(url( '/login')); ?>"
                   class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
              <?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
                <div id="mainmenu"
                     class="transform duration-300 opacity-0 scale-95 absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                     tabindex="-1">
                  <div class="flex flex-col items-start justify-start gap-2 my-2">
                    <a href="<?php echo e(route('settings.profile')); ?>" class="flex gap-1 pl-4 text-sm text-gray-700"
                       role="menuitem" tabindex="-1"
                       id="user-menu-item-0">
                      <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                      <?php echo e(__('Your Profile')); ?></a>
                    <form action="<?php echo e(route('logout')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <button type="submit" style=";" class="cursor-pointer flex gap-1 pl-4 text-sm text-gray-700">
                          <span
                            class="flex items-center gap-1 fi-dropdown-list-item-label flex-1 truncate text-start text-gray-700 dark:text-gray-200"
                            style="">
                                <?php if(auth()->guard()->check()): ?>
                              <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-right-end-on-rectangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                              <?php echo e(__('Sign out')); ?>

                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                   stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path
                                  stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3  3m3-3H2.25"/>
                              </svg>
                              Signin
                            <?php endif; ?>
                              </span>
                      </button>
                    </form>
                    <?php
                      $idioma =  array_key_exists(session('locale'),config('languages')) ? session('locale') : Config('app.locale');
                    ?>
                    <?php $__currentLoopData = config('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($key != $idioma): ?>
                        <a class="flex gap-2 px-4 py-2 text-sm text-gray-700"
                           href="<?php echo e(route('lang', $key)); ?>">
                          <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php echo e($value); ?></a>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                  <!-- Mobile menu button -->
                  <button type="button"
                          class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white"
                          aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                  </button>
                </div>
              <?php endif; ?>
              <!-- Mobile menu, show/hide based on menu state. -->
              <div class="border-b border-gray-700 md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 py-3 sm:px-3">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="#"
                     class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                     aria-current="page">Dashboard</a>
                  <a href="#"
                     class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                  <a href="#"
                     class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                  <a href="#"
                     class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                  <a href="#"
                     class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                  <div class="flex items-center px-5">
                    <div class="shrink-0">
                      <img class="size-10 rounded-full"
                           src=""
                           alt="">
                    </div>
                    <div class="ml-3">
                      <div class="text-base/5 font-medium text-white">Tom Cook</div>
                      <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                    </div>
                    <button type="button"
                            class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white">
                      <span class="absolute -inset-1.5"></span>
                      <span class="sr-only">View notifications</span>
                      <svg class="size-6" fill="none" viewBox="0 0 24 24"
                           stroke-width="1.5" stroke="currentColor"
                           aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
                      </svg>
                    </button>
                  </div>
                  <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                      Profile</a>
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                      out</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- <div id="flashMessage" class="-z-10 fixed   flex top-20 justify-end items-end overflow-x-hidden ">-->
  <div id="flashVisible"
       class="fixed w-max -top-20 right-0 flex items-end flex-col gap-1 justify-center -z-1">
    <?php echo $__env->make('components.layouts.flash-messages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php if(session()->has('eliminado')): ?>
      <?php if (isset($component)) { $__componentOriginalfd6226d4475ab376ba15a422d75fd9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd6226d4475ab376ba15a422d75fd9b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.flash-eliminado','data' => ['message' => $message]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.flash-eliminado'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd6226d4475ab376ba15a422d75fd9b4)): ?>
<?php $attributes = $__attributesOriginalfd6226d4475ab376ba15a422d75fd9b4; ?>
<?php unset($__attributesOriginalfd6226d4475ab376ba15a422d75fd9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd6226d4475ab376ba15a422d75fd9b4)): ?>
<?php $component = $__componentOriginalfd6226d4475ab376ba15a422d75fd9b4; ?>
<?php unset($__componentOriginalfd6226d4475ab376ba15a422d75fd9b4); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6dafa10a505d59f5a5f4c52a8c965319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6dafa10a505d59f5a5f4c52a8c965319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.flash-unic','data' => ['message' => $message]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.flash-unic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6dafa10a505d59f5a5f4c52a8c965319)): ?>
<?php $attributes = $__attributesOriginal6dafa10a505d59f5a5f4c52a8c965319; ?>
<?php unset($__attributesOriginal6dafa10a505d59f5a5f4c52a8c965319); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6dafa10a505d59f5a5f4c52a8c965319)): ?>
<?php $component = $__componentOriginal6dafa10a505d59f5a5f4c52a8c965319; ?>
<?php unset($__componentOriginal6dafa10a505d59f5a5f4c52a8c965319); ?>
<?php endif; ?>
  </div>
</nav><?php /**PATH /Users/juan/Herd/Tienda/resources/views/components/navigation.blade.php ENDPATH**/ ?>