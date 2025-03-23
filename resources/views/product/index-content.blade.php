<div class="-mx-px gap-2 grid grid-cols-1 sm:mx-0 sm:grid-cols-2 md:grid-cols-3">
  @foreach($products as $product)
    <div
      class="relative bg-gray-100 group relative border-b border-r rounded-lg border-gray-200 shadow-md shadow-gray-800">
      <div class="w-full grid grid-rows-subgrid justify-items-center">
        <!-- ## Oferta ## -->
        <div class="h-12 w-fit absolute top-8 -left-2 z-10 -rotate-45">
          @if($product->getHayOferta())
            <div
              class="flex justify-center rounded-tl-lg rounded-tr-lg items-center gap-x-1.5 px-2 py-1 text-sl font-medium text-white bg-green-600 ">
              {{$product->descuento."%"}}<p>Descuento</p>
            </div>
          @endif
        </div>
        <!-- The Image -->
        <div class="w-full min-w-full h-62 bg-cover bg-no-repeat rounded-tl-lg rounded-tr-lg"
             style="background-image:url( {{ $product->getImgPal() }});">
        </div>
        <div class="flex flex-col items-center w-full justify-center gap-y-6 mb-4">
          <!-- Name -->
          <h3 class="z-12 text-xl font-bold text-gray-500 mt-2" data-role="name-product">
            <a href="{{ route('products.show', $product) }}">{{ $product->name }} </a>
          </h3>
          <!-- ### PRECIOS ### -->
          @include('components.partials.precios')
          <div class="flex items-center gap-x-1" º>
            <!-- ### UNIDADES ### -->
            @include('components.partials.unidades')
            <!-- Corazón Favoritos -->
            @php
              $enFavorites= strpos(request()->cookie('cookie_favorites'), $product->id);
            @endphp
            @include('components.partials.heart')
          </div>
          <!-- ## ESTRELLAS ## -->
          @include('components.partials.stars')
        </div>
        <!-- ## CATERGORÍAS Y TAGS ## -->
        <div class="gap-0.5 min-h-28 w-full justify-items-center">
          @include('components.partials.categorias-tags')
        </div>
      </div>
    </div>
  @endforeach
</div>
<script src="{{asset('js/favorites.js')}}"></script>