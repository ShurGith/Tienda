<x-layouts.app :title="__('Dashboard')">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
      <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div class="flex items-center justify-start ml-2 mt-2 space-x-2">
          <img id="imag-menu" class="size-12 rounded-full"
               src="{{ auth()->user()->avatar  ?? Avatar::create( Auth::user()->name)->toBase64()  }}"
               alt="">
          <h4 class="font-[sans] text-zinc-600 text-2xl"> {{ auth()->user()->name }}</h4>
        </div>
        <div class="flex flex-col border-b">
          
          <flux:divis.datos :little="false" :texto="'Products'" :icon="'shopping-cart'"
                            :count="auth()->user()->getCountProducts()"/>
          
          <div class="flex justify-start ml-4 mt-2 space-x-2">
            <flux:divis.datos :texto="'Sales'" :icon="'wallet'" :count="auth()->user()->salesCount()"/>
            <flux:divis.datos :texto="'Purchases'" :icon="'bookmark-square'" :count="auth()->user()->purchasesCount()"/>
          </div>
        </div>
        <flux:divis.datos :little="false" :texto="'Blog Post'" :icon="'book-open'"
                          :count="auth()->user()->getCountProducts()"/>
      </div>
      <div
        class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <x-placeholder-pattern class="absolute inset-0 size-full stroke-red-500/20 dark:stroke-neutral-100/20"/>
      </div>
      <div
        class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
      </div>
    </div>
    <div
      class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
      <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
    </div>
  </div>
</x-layouts.app>
