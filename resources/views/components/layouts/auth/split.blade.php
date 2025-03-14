<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
  @include('partials.head')
</head>
<body class="min-h-screen antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
<div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
  <div
    class="relative hidden items-center justify-center h-full flex-col p-10 text-white lg:flex dark:border-r dark:border-neutral-800">
    <div class="absolute inset-0 bg-neutral-900"></div>
    <a href="{{ route('home') }}"
       class="flex-col space-y-6 relative z-20 flex items-center text-amber-700 text-6xl  font-medium"
       wire:navigate>
      <x-app-logo-icon class="h-92"/>
      {{ config('app.name', 'Laravel') }}
      <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
    </a>
  </div>
  <div class="w-full lg:p-8">
    <div
      class="lg:p-6 lg:border-2 rounded-[10px] mx-auto flex flex-col justify-center space-y-6 sm:w-[350px]">
      
      <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex items-center justify-center rounded-md">
                            <x-app-logo-icon class=""/>
                        </span>
        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
      </a>
      {{ $slot }}
    </div>
  </div>
</div>
@fluxScripts
</body>
</html>
