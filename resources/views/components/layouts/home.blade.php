<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  @include('components.products-list')
  <div class="h-4 w-full bg-amber-500"></div>
  @include('blog.index-content')

</x-layouts.page>