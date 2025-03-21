<x-layouts.front :meta-title='__("Shopping cart")' :header-text='__("Shopping cart")'>
  <div class="border border-gray-300 rounded-lg">
    <div class="grid grid-cols-6 py-4 pl-2 border-b gray-300 w-full">
      <div class="text-left text-sm font-semibold text-gray-900">{{  __('Image') }}</div>
      <div class="text-left text-sm font-semibold text-gray-900">{{  __('Name') }}</div>
      <div class="text-center text-sm font-semibold text-gray-900 "> {{ __('Price') }}</div>
      <div class="text-center text-sm font-semibold text-gray-900 "> {{ __('Quantity') }}</div>
      <div class="text-center text-sm font-semibold text-gray-900 "> {{ __('Total') }}</div>
      <div class="text-center text-sm font-semibold text-gray-900">{{ __('Actions') }}</div>
    </div>
    @foreach($products as $product)
      <div class=" grid grid-cols-6 py-4 pl-2 border-b gray-300 w-full">
        <div class=" ">
          <img class="max-w-18" src="{{ $product->getImgPal() }}">
        </div>
        <div class="flex items-center font-medium text-gray-500 text-sm ">
          {{ $product->name }}
        </div>
        <div class="flex flex-col gap-2 items-center justify-center">
          @include('components.partials.precios'  ,[ "textFinal" => "text-sm", "textIni"=> "text-xs"])
          @include('components.partials.oferta')
        </div>
        <div class="flex items-center">
        </div>
        <div class="flex items-center">
        </div>
        <div class="flex items-center justify-center gap-2">
          <a href="{{ route('products.show', $product) }}">
            <x-heroicon-o-eye class="h-6 w-6 text-blue-500"></x-heroicon-o-eye>
          </a>
          <form method="post" action="{{route('cesta.cookie',$product)}}">
            @csrf
            <input type="hidden" name="unico" value="1">
            <button data-role="btnTotal" type="submit">
              <x-heroicon-o-trash class="btn cursor-pointer btn-delete text-red-500 h-6 w-6"></x-heroicon-o-trash>
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
  </div>
  <script src="{{asset('js/favorites.js')}}"></script>
</x-layouts.front>