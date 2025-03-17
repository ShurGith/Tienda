<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Blog;
    use App\Models\Categoryblog;
    use App\Models\Tagblog;
    use Illuminate\Http\Request;
    
    class BlogController extends Controller
    {
        public function index(Request $request)
        {
            if ($request->category) {
                $laId = $request->category;
                $elNombre = Categoryblog::where('id', $laId)->pluck('name')[0];
                $posts = Blog::with(['tags', 'category'])
                  ->whereHas('category', fn($query) => $query->where('category_id', $laId))
                  ->paginate(20);
                $title = __('Listing Posts with category: ').$elNombre;
            } elseif ($request->tag) {
                $laId = $request->tag;
                $elNombre = Tagblog::where('id', $laId)->pluck('name')[0];
                $posts = Blog::with(['tags', 'category'])
                  ->whereHas('tags', fn($query) => $query->where('tag_id', $laId))
                  ->paginate(20);
                $title = __('Listing Posts with tag: ').$elNombre;
            } else {
                $posts = Blog::with(['tags', 'category'])->paginate(16);
                $title = __('Listing Posts');
            }
            
            return view('blog.index', [
              'posts' => $posts,
              'title' => $title,
            ]);
        }
        
        public function store(Request $request)
        {
            //
        }
        
        /**
         * Display the specified resource.
         */
        public function show(Blog $blog)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Blog $blog)
        {
            //
        }
        
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Blog $blog)
        {
            //
        }
        
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Blog $blog)
        {
            //
        }
    }
