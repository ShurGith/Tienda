<style>
    @keyframes barra {
        0% {
            width: 0%;
        }
        75% {
            width: 100%;
        }
        100% {
            width: 0%;
        }
    }
</style>


<div id="fav-show-add" class="cardFavoritos translate-x-full bg-green-50">
  <div class="flashBarra animateBarra  bg-green-400 "></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="text-green-800 h-12 w-12"/>
    <p class="text-sm font-medium text-green-800">
      <span data-role="info" class="font-bold text-xl"></span> {{ __('has been added to favourites list') }}</p>
  </div>
</div>
<div id="fav-show-remove" class="cardFavoritos translate-x-full bg-red-50">
  <div class="flashBarra animateBarra bg-red-400">
  </div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="text-red-800 h-12 w-12"/>
    <p class="text-sm font-medium text-red-800">
      <span data-role="info" class="font-bold text-xl "></span> {{ __('has been removed from favourites') }}
    </p>
  </div>
</div>
