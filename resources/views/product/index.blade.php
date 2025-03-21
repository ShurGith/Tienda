<x-layouts.front :meta-title="$title" :header-text="$title">
  @include('product.index-content')
  <div class=" mt-2 ">
    {{ $products->links() }}
  </div>
</x-layouts.front>
