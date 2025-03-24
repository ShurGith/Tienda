<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="border-b border-gray-700">
      <div class="flex h-16 items-center justify-between px-4 sm:px-0">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-12"
                 src="{{asset('storage/images/page/logo.png')}}"
                 alt="{{ config('app.name') }}"/>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-partials.nav-link href="{{ route('home') }}"
                                   :active="request()->routeIs('home')">{{  __('Home') }}</x-partials.nav-link>
              <x-partials.nav-link href="{{ route('products.index') }}"
                                   :active="request()->routeIs('products.index')">{{  __('Productos') }}</x-partials.nav-link>
              <x-partials.nav-link href="{{ route('blog.index') }}"
                                   :active="request()->routeIs('blog.index')">{{  __('Blog') }}</x-partials.nav-link>
              @auth
                <x-partials.nav-link href="{{ route('dashboard') }}"
                                     :active="request()->routeIs('dashboard')">{{  __('Dashboard') }}</x-partials.nav-link>
              @endauth
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            @include('components.contadores-menu')
            <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <x-heroicon-o-bell class="size-6"/>
            </button>
            
            <!-- Profile dropdown -->
            <div class="relative ml-3 group/navi">
              <div>
                @auth
                  <button type="button"
                          class="group flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                          id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img id="imag-menu" class="size-8 rounded-full"
                         src="{{ auth()->user()->getFilamentAvatarUrl() ?? Avatar::create( Auth::user()->name)->toBase64()  }}"
                         alt="">
                  </button>
                @endauth
              </div>
              <div
                class="opacity-0 scale-95 group-hover/navi:opacity-100 group-hover/navi:scale-100 transition ease-out duration-100 absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                @auth
                  <a href="{{ route('settings.profile') }}"
                     class="flex gap-1 items-center justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-200"
                     role="menuitem"
                     tabindex="-1"
                     id="user-menu-item-0">
                    <x-heroicon-o-user class="size-5"/>
                    {{  __('Your Profile') }}</a>
                @endauth
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <button type="submit" style=""
                          class="cursor-pointer flex gap-1 pl-4 text-sm text-gray-700 hover:bg-gray-200">
                    @auth()
                      <x-heroicon-o-arrow-right-end-on-rectangle class="size-5"/>
                      {{  __('Sign out') }}
                    @endauth
                  </button>
                </form>
                @guest
                  <a href="{{  url( '/login') }}"
                     class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path
                        stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3  3m3-3H2.25"/>
                    </svg>
                    {{ __('Sign In') }}
                  </a>
                @endguest
                @php
                  $idioma =  array_key_exists(session('locale'),config('languages')) ? session('locale') : Config('app.locale');
                @endphp
                @foreach (config('languages') as $key => $value)
                  @if ($key != $idioma)
                    <a class="flex gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-200"
                       href="{{ route('lang', $key) }}">
                      <x-heroicon-o-flag class="size-5"/> {{ $value }}</a>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" id="mobile-button"
                  class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                  aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile menu, show/hide based on menu state. -->
  <div id="mobile-menu"
       class="transform scale-y-0 opacity-0 origin-top transition-all ease-in-out duration-300 ease-in-out !w-full overflow-hidden border-b border-gray-500 bg-gray-800 z-100 absolute md:hidden">
    <div class="flex flex-col space-y-1 px-2 py-3 sm:px-3">
      <x-partials.nav-link href="{{ route('home') }}"
                           :active="request()->routeIs('home')">{{  __('Home') }}</x-partials.nav-link>
      <x-partials.nav-link href="{{ route('products.index') }}"
                           :active="request()->routeIs('products.index')">{{  __('Productos') }}</x-partials.nav-link>
      <x-partials.nav-link href="{{ route('blog.index') }}"
                           :active="request()->routeIs('blog.index')">{{  __('Blog') }}</x-partials.nav-link>
      <x-partials.nav-link href="{{ route('dashboard') }}"
                           :active="request()->routeIs('dashboard')">{{  __('Dashboard') }}</x-partials.nav-link>
    </div>
    @auth
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full"
                 src="{{ Auth::user()->getFilamentAvatarUrl() ?? Avatar::create( Auth::user()->name)->toBase64() }} "/>
          </div>
          <div class="ml-3 w-full items-center">
            <div class="text-base/5 font-medium text-white">{{ auth()->user()->name}}</div>
            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
          </div>
          <div class="flex justify-end items-center">
            @include('components.contadores-menu')
            <button type="button"
                    class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <x-heroicon-o-bell class="size-6"/>
            </button>
          </div>
        </div>
        <div class="flex flex-col mt-3 space-y-1 px-2 text-white gap-y-2">
          @auth
            <a href="{{ route('settings.profile') }}" class="flex gap-1 pl-4 text-sm"
               role="menuitem" tabindex="-1" id="user-menu-item-0">
              <x-heroicon-o-user class="size-5"/> {{__('Your Profile')}}
            </a>
            <form action="{{route('logout')}}" method="post">
              @csrf
              <button type="submit"
                      class="cursor-pointer flex gap-1 pl-4 text-sm  items-center gap-1 text-start">
                <x-heroicon-o-arrow-right-end-on-rectangle class="size-5"/>
                {{  __('Sign out') }}
              </button>
            </form>
          @endauth
          @guest
            <a href="{{  url( '/login') }}"
               class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
          @endguest
        </div>
      </div>
    @endauth
  </div>
</nav>