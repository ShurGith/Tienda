<x-layouts.front>
  @include('product.index-content')
  <div class=" mt-2 ">
    {{ $products->links() }}
  </div>
</x-layouts.front>
