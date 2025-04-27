<div id="{{'fav-show-'.$id}}" class="cardFavoritos {{$backGround}}">
  <div class=" flashBarra {{$bgGround2}}"></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="{{$colorText}} h-12 w-12"/>
    <div class="text-center text-sm font-medium {{$colorText}} pr-6 ">
      <h2 data-role="info" class="font-bold text-xl"></h2>
      {{ $mensaje }}
    </div>
  </div>
</div>