@if($product->getHayOferta())
  <span
    class="inline-flex items-center gap-x-1.5 rounded-md bg-green-500/10 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/20"><svg
      class="size-1.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">  <circle cx="3" cy="3" r="3"/> </svg>
                 {{ $product->descuento .'% '. __('Discount') }}
                </span>
@endif