<x-layouts.front :meta-title="$title" :header-text="$title"  >
  <h4 class="h4front">{{ __('Products') }}</h4>
  @include('product.index-content')
  <div class="h-4 w-full"></div>
  
  <h4 class="h4front">{{ __('Blog') }}</h4>
  @include('blog.index-content')

</x-layouts.front>