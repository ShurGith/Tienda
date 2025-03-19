<x-layouts.page :meta-title="isset($title )? $title . ' - ' .config('app.name') : config('app.name')"
                :header-text="isset($title) ? $title . ' - ' .config('app.name') : config('app.name')">
  
  <!-- ## Utilizado en el index home -->
  {!! $post->content !!}

</x-layouts.page>