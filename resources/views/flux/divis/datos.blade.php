@props([
    'icon', // The name of the Heroicon (e.g., 'wallet', 'shopping-cart')
    'texto', // The text to display
    'count' => 0, // The count to display (default to 0)
    'little' => true // Additional CSS classes
])

<div class="flex items-center justify-start ml-2 mt-2 space-x-2 text-zinc-500 hover:text-zinc-700">
  @if ($icon)
    <x-dynamic-component :component="'heroicon-o-' . $icon" class="{{$little ? 'size-4' : 'size-6'}} text-amber-400"/>
  @endif
  <h5 class="{{ $little ? 'userpanelcount-little' : 'userpanelcount-number' }}">
    {{ __($texto) }}:
    <span class="{{ $little ? 'userpanelcount-little' : 'userpanelcount-number' }}">{{ $count }}</span>
  </h5>
</div>

{{--

<div class="flex items-center justify-start ml-2 mt-2 space-x-2">
  <x-heroicon-o-book-open class="size-6 text-amber-400"/>
  <h5 class="userpanel-text"> {{ __('Blog Posts') }}: <span
      class="userpanelcount-number">{{ auth()->user()->getCountPosts() }}</span></h5>
</div>--}}
