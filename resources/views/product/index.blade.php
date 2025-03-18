<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  @include('product.index-content')
  <div class=" mt-2 ">
    {{ $products->links() }}
  </div>
  <script src="{{asset('js/favorites.js')}}"></script>
</x-layouts.page>
