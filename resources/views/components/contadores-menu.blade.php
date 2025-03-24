@php
  $myc = json_decode(request()->cookie('cookie_favorites', '[]'), true);
  $compras = json_decode(request()->cookie('cookie_compras', '[]'), true);
  $comprados = count($compras);
  if($myc)
     $countFavos = count($myc);
  else
   $countFavos=false;
@endphp
<div id="div-comprados" class="relative mr-4">
  <a href="{{route('cesta.cesta')}}">
    <div
      class="absolute -left-2 -top-2 bg-white rounded-full w-4 h-4 flex  justify-center items-center">
      <p class="text-black text-xs contador">{{  $comprados }}</p>
    </div>
    <x-heroicon-o-shopping-cart class="size-6 shrink-0 text-gray-300"/>
  </a>
</div>
<div id="div-favorites" class="relative {{ $countFavos ? '': 'hidden' }}">
  <a href="{{route('favorites')}}">
    <div
      class="absolute -left-2 -top-2 bg-white rounded-full w-4 h-4 flex  justify-center items-center">
      <p class="text-black text-xs contador">{{$countFavos}}</p>
    </div>
    <x-heroicon-o-heart class="size-6 shrink-0 text-gray-300 {{ $countFavos ? '': 'hidden' }}"/>
  </a>
</div>