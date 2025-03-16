<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  <div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
    @foreach($posts as $post)
      
      <div
        class="relative bg-gray-100 group relative border-b border-r rounded-lg border-gray-200 shadow-md shadow-gray-800">
        <!-- The Image -->
        <div class="w-full min-w-full h-62 bg-cover bg-no-repeat "
             style="background-image:url( {{ $post->getImgPal() }});">
        </div>
        <div class="w-full grid grid-rows-subgrid justify-items-center">
          <!-- The Title -->
          <h2 class="text-2xl font-semibold font-[Lobster] ">  {{ $post->title }} </h2>
          <!-- The Categories -->
          <a href="{{url('blog?category='.$post->category_id)}}"> {{ $post->category->name }}</a>
          <h3>{{ $post->user->name }}</h3>
          <!-- The Content -->
          <p class="px-4">  {!! $post->content !!}</p>
        </div>
      </div>
    @endforeach
  </div>
</x-layouts.page>
