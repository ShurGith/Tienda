<!-- ## Utilizado en el index home -->
<div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
  @foreach($posts as $post)
    
    <div
      class="relative bg-gray-100 group relative border-b border-r rounded-lg border-gray-200 shadow-md shadow-gray-800">
      <!-- The Image -->
      <div class="w-full min-w-full h-62 bg-cover bg-no-repeat "
           style="background-image:url( {{ $post->getImgPal() }});">
      </div>
      <div class="w-full justify-items-center text-zinc-500 font-[Lobster]">
        <!-- The Title -->
        <a href="{{route('blog.show', $post->id) }}" class="mt-4 text-xl font-bold">
          {{ $post->title }}
        </a>
        <h5 class="mt-2 text-sm">{{ $post->user->name }}</h5>
        <!-- The Content -->
        <div class="px-2  mt-4 text-sm line-clamp-5">  {!! $post->content !!}</div>
      </div>
      <div class="mt-4 p-2">
        <!-- The Categories -->
        @isset($post->category)
          <a class="font-semibold font-[Lobster] px-2 py-1 rounded"
             style="background: {{$post->category->bg_color}}; color:{{$post->category->color}}" href="{{url('blog?category='.$post->category_id)}}
          "> {{ $post->category->name }}</a>
          @foreach($post->tags as $tag)
            <a class="font-semibold font-[Lobster] px-2 py-1 rounded"
               style="background: {{$tag->bg_color}}; color:{{$tag->color}}" href="{{url('blog?tag='.$tag->id)}}
          "> {{ $tag->name }}</a>
          @endforeach
        @endisset
      </div>
    </div>
  @endforeach
</div>