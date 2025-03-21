@props([
    'icon',
    'texto',
    'count' => 0,
    'little' => true
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
