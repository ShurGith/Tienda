@session('eliminado')
<div id="flashdelete"
     class="-translate-x-full translate-y-12 rounded-md w-full max-w-[600px] bg-orange-50 p-4 flex items-center justify-evenly">
  <div class="flashBarra  bg-orange-800 "></div>
  <div class="flex items-center gap-2 ">
    <x-heroicon-o-archive-box-x-mark class="text-orange-800 h-10 w-10"/>
    <div class="ml-3">
      <p class="text-sm font-medium text-orange-800">{!!  __($value) !!}</p>
    </div>
  
  </div>
</div>
@endsession