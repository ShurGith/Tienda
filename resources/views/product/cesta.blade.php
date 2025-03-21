<x-layouts.front :meta-title='__("Shopping cart")' :header-text='__("Shopping cart")'>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead>
        <tr>
          <th scope="col"
              class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{  __('Image') }}</th>
          <th scope="col"
              class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{  __('Name') }}</th>
          <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
            {{ __('Price') }}
          </th>
          <th scope="col"
              class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">{{ __('Offer') }}
          </th>
          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">{{ __('Actions') }}
            <span class="sr-only">{{ __('Actions') }}</span>
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr class="border-b">
            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
              <div class="font-medium text-gray-900"><img class="max-w-14" src="{{ $product->getImgPal() }}"></div>
            </td>
            <td class=" relative py-4 pl-4 pr-3 text-sm sm:pl-6">
              <div class="font-medium text-gray-900">{{ $product->name }}</div>
            </td>
            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
              <div class="max-w-fit"><p> {{ $product->precios(false) }}<span
                    class="pl-1 align-super">{{ $product->precios(false, true) }}</span> €</p>
                @if($product->oferta)
                  <p class="line-through  text-xs text-red-500">{{  $product->precios( true ) }}
                    <span class="pl-1 align-super">{{  $product->precios( true, true ) }}</span> €</p>
                @endif
              </div>
            </td>
            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
              @if( $product->oferta)
                <span
                  class="inline-flex items-center gap-x-1.5 rounded-md bg-green-500/10 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/20"><svg
                    class="size-1.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">  <circle cx="3" cy="3" r="3"/> </svg>
                 {{ $product->descuento .'% '. __('Discount') }}
                </span>
              @endif
            </td>
            <td class="flex items-center justify-center gap-2 py-3.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
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
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <script src="{{asset('js/favorites.js')}}"></script>
</x-layouts.front>