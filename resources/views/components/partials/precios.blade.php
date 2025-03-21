@props([ 'textFinal' => 'text-base', ])
<div class="flex justify-center items-center gap-x-8">
  @if($product->oferta)
    <h4 class="text-red-400 line-through text-sm font-medium text-gray-900">{{ $product->precios( false ) }}
      <span
        class="decimales-precios">{{ $product->precios( false, true ) }}</span>&nbsp€
    </h4>
  @endif
  <h4 class=" {{ $textFinal }}  font-medium text-gray-500">{{ $product->precios(true) }}<span
      class="decimales-precios">{{ $product->precios(true,true) }}</span>&nbsp€</h4>
</div>
