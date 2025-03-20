<x-layouts.front>
  
  <!-- ## Utilizado en el index home -->
  @include('blog.index-content')
  <div class=" mt-2 ">
    {{ $posts->links() }}
  </div>
</x-layouts.front>
