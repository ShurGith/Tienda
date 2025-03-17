<?php
    
    namespace App\Http\Controllers;
    
    use App\Http\Requests\ProductStoreRequest;
    use App\Http\Requests\ProductUpdateRequest;
    use App\Models\Category;
    use App\Models\Generaloptions;
    use App\Models\Product;
    use App\Models\Tag;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    
    class ProductController extends Controller
    {
        public function index(Request $request): View
        {
            $hideNoActives = Generaloptions::where('name', 'hide_no_actives')->pluck('value')[0];
            $hideNoStock = Generaloptions::where('name', 'hide_no_existences')->pluck('value')[0];
            $alwaysFav = Generaloptions::where('name', 'favoritos_banner_siempre')->pluck('value')[0];
            $onlyRegisterView = Generaloptions::where('name', 'only_register_view')->pluck('value')[0];
            
            if ($request->category) {
                $laid = $request->category;
                $elNombre = Category::where('id', $laid)->pluck('name')[0];
                $titulo = " Productos de la categoría \"$elNombre\"";
                $products = Product::with(['tags', 'category'])
                  ->whereHas('category',
                    function ($query) use ($hideNoStock, $hideNoActives, $laid) {
                        $query->where('category_id', $laid)
                          ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                          ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0));
                    })->paginate(12);
                
            } elseif ($request->tag) {
                $laid = $request->tag;
                $elNombre = Tag::where('id', $laid)->pluck('name')[0];
                $titulo = "Productos de la etiqueta \"$elNombre \"";
                $products = Product::with(['tags', 'categories'])
                  ->whereHas('tags', function ($query) use ($hideNoStock, $hideNoActives, $laid) {
                      $query->where('tag_id', $laid)
                        ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                        ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0));
                  })->paginate(12);
                
            } else {
                $titulo = "Listado de productos";
                $products = Product::with(['tags', 'category'])
                  ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                  ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0))
                  ->paginate(50);
            }
            
            return view('product.index', [
              'products' => $products,
              'title' => $titulo,
            ]);
        }
        
        public function store(ProductStoreRequest $request): RedirectResponse
        {
            $product = Product::create($request->validated());
            
            $request->session()->flash('product.id', $product->id);
            
            return redirect()->route('products.index.blade.php');
        }
        
        public function create(Request $request): View
        {
            return view('product.create');
        }
        
        public function show(Request $request, Product $product): View
        {
            $randoms = [];
            for ($i = 0; $i < 4; $i++) {
                $randoms[] = Product::find(rand($i, Product::count()));
            }
            return view('product.show', [
              'product' => $product,
                //   'imagenes' => $imagenes,
              'randoms' => $randoms,
              'esSingleProduct' => true,
            ]);
        }
        
        public function edit(Request $request, Product $product): View
        {
            return view('product.edit', [
              'product' => $product,
            ]);
        }
        
        public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
        {
            $product->update($request->validated());
            
            $request->session()->flash('product.id', $product->id);
            
            return redirect()->route('products.index.blade.php');
        }
        
        public function destroy(Request $request, Product $product): RedirectResponse
        {
            $product->delete();
            
            return redirect()->route('products.index.blade.php');
        }
        
        public function buyit(Request $request, Product $product): View
        {
            return view('product.buyit', [
              'product' => $product,
            ]);
        }
    }
