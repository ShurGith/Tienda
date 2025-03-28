<?php
    
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\BuyController;
    use App\Http\Controllers\FavoriteController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LanguageController;
    use App\Http\Controllers\ProductController;
    use App\Livewire\Settings\Appearance;
    use App\Livewire\Settings\Password;
    use App\Livewire\Settings\Profile;
    use Illuminate\Support\Facades\Route;
    
    Route::get('/', function () {
        return view('layouts/page', ["metaTitle" => "Inicio"]);
    })->name('home');
    
    Route::view('dashboard', 'dashboard')
      ->middleware(['auth', 'verified'])
      ->name('dashboard');
    
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });
    
    Route::middleware(['auth'])->group(function () {
        Route::redirect('settings', 'settings/profile');
        
        Route::get('settings/profile', Profile::class)->name('settings.profile');
        Route::get('settings/password', Password::class)->name('settings.password');
        Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    });
    
    require __DIR__.'/auth.php';
    
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('/', [HomeController::class, 'home'])->name('home');
    
    Route::get('/cesta/{product}', [BuyController::class, 'cookie'])->name('cesta.buyit');
    Route::post('/cesta/{product}', [BuyController::class, 'cookie'])->name('cesta.cookie');
    Route::post('/actualizar-cantidad', [BuyController::class, 'actualizarCantidad']);
    Route::get('/cesta', [BuyController::class, 'cesta'])->name('cesta.cesta');
    
    Route::resource('products', ProductController::class);
    Route::get('/post/{slug}', [ProductController::class, 'show'])->name('post.show');
    
    
    Route::get('/lang/{lang}', [LanguageController::class, 'switch'])->name('lang');
    
    Route::resource('blog', BlogController::class);
    
    Route::post('/favorites/toggle/{id}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->name('favorites');
    Route::post('/favorites', [FavoriteController::class, 'eliminarCookieFav'])->name('favorites.eliminar');
    
    Route::get('/grids', function () {
        return view('grids');
    });