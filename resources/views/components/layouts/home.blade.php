<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  @include('product.index-content')
  <div class="h-4 w-full"></div>
  @include('blog.index-content')

</x-layouts.page>