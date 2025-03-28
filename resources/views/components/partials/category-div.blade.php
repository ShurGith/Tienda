<a href="{{url('/products?category='.$product->category->slug)}}">
  <div data-role="categ" class="flex items-center gap-1 justify-center py-1 px-2.5 rounded text-xs mx-auto max-w-max"
       style="background:{{ $product->category->bgcolor }}; color:{{$product->category->color}}">
    @if($product->category->icon_active)
      <div class="mr-1" style="color:{{$product->category->color}}">
        @isset($product->category->icon)
          <x-icon class="w-4" name="{{ $product->category->icon }}"/>
        @endisset
      </div>
    @elseif($product->category->image)
      <img src="{{asset($product->category->image)}}"
           alt="{{ $product->category->name.' image' }}"
           class="w-6 rounded-full"/>
    @endif
    <p>{{ $product->category->name }}</p>
  </div>
</a>