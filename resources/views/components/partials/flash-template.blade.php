<div id="fav-show-{{$type}}" class="cardFavoritos {{$bgGroung}}">
  <div class=" flashBarra {{$bgGround2}}"></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="{{$textColor}} h-12 w-12"/>
    <p class="text-sm font-medium text-red-800">
      <span data-role="info" class="font-bold text-xl "></span> {{ $mensaje }}
    </p>
  </div>
</div>