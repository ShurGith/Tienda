<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  <!-- ## Utilizado en el index home -->
  @include('blog.index-content')
  <div class=" mt-2 ">
    {{ $posts->links() }}
  </div>
</x-layouts.page>
