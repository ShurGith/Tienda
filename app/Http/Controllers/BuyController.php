<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cookie;
    
    class BuyController extends Controller
    {
        
        public function cesta(Request $request)
        {
            $compras = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            $products = [];
            $cantidades = [];
            foreach ($compras as $compra) {
                $cantidades[] = $compra['cantidad'];
                $products[] = Product::find($compra['id']);
            }
            return view('product.cesta', [
              'products' => $products,
              'cantidades' => $cantidades,
            ]);
        }
        
        public function cookie(Request $request, $productId)
        {
            $compras = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            $productName = Product::findOrFail($productId)->name;
            $slug = Product::findOrFail($productId)->slug;
            if (!$request->unico) {
                $producto = [
                  'cantidad' => 1,
                  'id' => $productId,
                  'slug' => $slug,
                ];
                
                
                if (!in_array($slug, $compras) and is_numeric($productId)) {
                    $compras[] = $producto;
                    
                } else {
                    $compras = array_diff($compras, [$productId]);
                }
            } else {
                if ($request->unico && count($compras) > 0) {
                    Cookie::queue($this->cookie_name(), json_encode($compras), 525600);
                    
                    return back()->with('eliminado',
                      '<span class="text-xl font-bold">'.$productName.'</span>  '.__('has been removed from your shopping cart'));
                }
                if ($request->unico && count($compras) == 0) {
                    return $this->eliminarCookieCompra();
                }
            }
            $cookie = cookie($this->cookie_name(), json_encode($compras), 525600);
            return redirect()->back()->withCookie($cookie)->with('Producto', 'Producto a la cesta');
        }
        
        public function cookie_name(): string
        {
            return 'cookie_compras';
        }
        
        public function eliminarCookieCompra()
        {
            Cookie::queue(Cookie::forget($this->cookie_name()));
            return redirect()->route('home')->with('eliminado', __('Empty shopping basket'));
        }
        
        public function actualizarCantidad(Request $request)
        {
            $compras = json_decode(Cookie::get($this->cookie_name(), '[]'), true);
            
            foreach ($compras as &$producto) {
                if ($producto['id'] == $request->productId) {
                    $producto['cantidad'] = $request->newQuantity;
                }
            }
            
            $cookie = cookie($this->cookie_name(), json_encode($compras), 525600);
            return response()->json(['success' => true])->cookie($cookie);
        }
    }
