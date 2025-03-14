@session('eliminado_total')
<div id="flashdelete" class="rounded-md w-full max-w-[600px] bg-orange-50 p-4 flex items-center justify-evenly">
  <div class="flex items-center gap-2 ">
    <x-heroicon-o-archive-box-x-mark class="text-orange-800 h-10 w-10"/>
    <div class="ml-3">
      <p class="text-sm font-medium text-orange-800">{{ __('All Favorites was deleted') }}</p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button"
                class="inline-flex rounded-md bg-orange-50 p-1.5 text-orange-500 hover:bg-orange-100 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 focus:ring-offset-orange-50">
          <span class="sr-only">Dismiss</span>
          <x-heroicon-o-x-mark class="text-orange-800 h-8 w-8"/>
        </button>
      </div>
    </div>
  </div>
</div>
@endsession