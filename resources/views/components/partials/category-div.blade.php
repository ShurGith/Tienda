<a href="{{url('/?category='.$product->category->id)}}">
  
  <div class="flex items-center gap-1 py-1 px-2.5 rounded text-xs"
       style="background:{{ $product->category->bgcolor }}; color:{{$product->category->color}}">
    @if($product->category->icon_active)
      <div class="mr-1" style="color:{{$category->color}}">
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