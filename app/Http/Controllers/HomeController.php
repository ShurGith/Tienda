<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Blog;
    use App\Models\Generaloptions;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    
    class HomeController extends Controller
    {
        public function home(Request $request): View
        {
            
            $hideNoActives = Generaloptions::where('name', 'hide_no_actives')->pluck('value')[0];
            $hideNoStock = Generaloptions::where('name', 'hide_no_existences')->pluck('value')[0];
     /*       $alwaysFav = Generaloptions::where('name', 'favoritos_banner_siempre')->pluck('value')[0];
            $onlyRegisterView = Generaloptions::where('name', 'only_register_view')->pluck('value')[0];
            */
            $titulo = "Listado de productos";
            $products = Product::with(['tags', 'category'])
              ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
              ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0))
              ->orderBy('created_at', 'DESC')
              ->get()
              ->take(6);
            
            $posts = Blog::with(['tags', 'category'])
              ->orderBy('created_at', 'DESC')
              ->get()
              ->take(8);
            
            return view('home', [
              'products' => $products,
              'posts' => $posts,
              'title' => __('Welcome to my online store: '),
              'hideNoActives' => $hideNoActives
            ]);
        }
        
    }
