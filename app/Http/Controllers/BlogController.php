<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Blog;
    use Illuminate\Http\Request;
    
    class BlogController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            $posts = Blog::when($request->category, fn($query) => $query->where('category_id', $request->category))
              ->paginate(20);
            
            return view('blog.index', [
              'posts' => $posts,
              'title' => "Listado de las entradas de Blog",
            ]);
        }
        
        /*        public function categorias($id)
                {
                    $posts = Blog::where('id', $id)->paginate(20);
                    
                    return view('blog.index', [
                      'posts' => $posts,
                      'title' => "Listado de las entradas de Blog",
                    ]);
                }
                */
        /**
         * Store a newly created resource in storage.
         */
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
