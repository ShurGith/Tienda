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
            foreach ($compras as $compra) {
                $products[] = Product::find($compra);
            }
            return view('product.cesta', [
              'products' => $products,
            ]);
        }
        
        public function cookie(Request $request, $productId)
        {
            $compras = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            $productName = Product::findOrFail($productId)->name;
            
            if (!in_array($productId, $compras) and is_numeric($productId)) {
                $compras[] = $productId;
                
            } else {
                $compras = array_diff($compras, [$productId]);
            }
            
            if ($request->unico && count($compras) > 0) {
                Cookie::queue($this->cookie_name(), json_encode($compras), 525600);
                
                return back()->with('eliminado',
                  '<span class="text-xl font-bold">'.$productName.'</span>  '.__('has been removed from your shopping cart'));
            }
            if ($request->unico && count($compras) == 0) {
                return $this->eliminarCookieCompra();
            }
            
            return response()->json([
              'status' => 'success',
              'compras' => $compras
            ])->cookie($this->cookie_name(), json_encode($compras), 525600);
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
    }
