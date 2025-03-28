<x-layouts.front :meta-title='__("Favorites")' :header-text='__("Favorites")'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">{{__("Your Saved Favorites")}}</h1>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none {{ count($products)===1 ? 'hidden' :''}}">
        <form method="post" action="{{route('favorites.eliminar')}}">
          @csrf
          <button type="submit"
                  class="cursor-pointer block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('Delete All') }}
          </button>
        </form>
      </div>
    </div>
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
      <div class="border border-gray-300 rounded-lg">
        <div class="grid grid-cols-4 py-4 pl-2 border-b gray-300 w-full">
          <div class="text-left text-sm font-semibold text-gray-700">{{  __('Image') }}</div>
          <div class="text-left text-sm font-semibold text-gray-700">{{  __('Name') }}</div>
          <div class="text-left text-sm font-semibold text-gray-700">{{  __('Price') }}</div>
          <div class="text-center text-sm font-semibold text-gray-700">{{ __('Actions') }}</div>
        </div>
        @foreach($products as $product)
          <div class=" grid grid-cols-4 py-4 pl-2 border-b gray-300 w-full">
            <div class=" ">
              <img class="max-w-18" src="{{ $product->getImgPal() }}">
            </div>
            <div class="flex items-center font-medium text-gray-500 text-sm ">
              {{ $product->name }}
            </div>
            <div class="flex flex-col items-start justify-center">
              @include('components.partials.precios'  ,[ "textFinal" => "text-sm", "textIni"=> "text-xs"])
              @include('components.partials.oferta')
            </div>
            <div
              class="flex items-center justify-center gap-1">
              @if(!strpos(request()->cookie('cookie_compras'), $product->id))
                <div id="tooltip-dark" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                  {{ __('Add to bag') }}
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="relative" data-tooltip-target="tooltip-dark">
                  <a href="{{ route('cesta.buyit', $product->id) }}" alt="{{ __('Add to cart') }}">
                    <x-heroicon-o-shopping-cart class="h-6 w-6 text-amber-500"></x-heroicon-o-shopping-cart>
                  </a>
                </div>
              @endif
              <a href="{{ route('products.show', $product) }}">
                <x-heroicon-o-eye class="h-6 w-6 text-blue-500"></x-heroicon-o-eye>
              </a>
              <form method="post" action="{{route('favorites.toggle',$product->id)}}">
                @csrf
                <input type="hidden" name="unico" value="1">
                <button data-role="btnTotal" type="submit">
                  <x-heroicon-o-trash
                    class="btn cursor-pointer btn-delete text-red-500 h-6 w-6"></x-heroicon-o-trash>
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <script src="{{asset('js/favorites.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</x-layouts.front>