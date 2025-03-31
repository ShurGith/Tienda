{{--<div id="fav-show-add" class="cardFavoritos bg-green-50 ">
  <div class="flashBarra bg-green-400 "></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="text-green-800 h-12 w-12"/>
    <p class="text-sm font-medium text-green-800">
      <span data-role="info" class="font-bold text-xl"></span> {{ __('has been added to favourites list') }}</p>
  </div>
</div>
<div id="fav-show-remove" class="cardFavoritos bg-red-50">
  <div class=" flashBarra bg-red-400"></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-c-information-circle class="text-red-800 h-12 w-12"/>
    <p class="text-sm font-medium text-red-800">
      <span data-role="info" class="font-bold text-xl "></span> {{ __('has been removed from favourites') }}
    </p>
  </div>
</div>--}}

<x-layouts.flash-unic :type="'add'" :bgGroung="'bg-green-50'" :bgGround2="'bg-green-400'" :textColor="'text-green-800'"
                      :message=" __('has been added to favourites list')"/>
<x-layouts.flash-unic :type="'remove'" :bgGroung="'bg-red-50'" :bgGround2="'bg-red-400'" :textColor="'text-red-800'"
                      :message=" __('has been removed from favourites')"/>