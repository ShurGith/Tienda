<?php
    
    namespace App\Filament\Resources\ProductResource\Widgets;
    
    use App\Models\Product;
    use Filament\Widgets\StatsOverviewWidget as BaseWidget;
    use Filament\Widgets\StatsOverviewWidget\Stat;
    
    class StatsOverview extends BaseWidget
    {
        //protected ?string $heading = 'Analytics';
        protected ?string $description = 'Datos de Ventas.';
        
        protected function getStats(): array
        {
            return [
              Stat::make(__('Products on list'), Product::query()->count()),
                //->description('32k increase')
                //   ->descriptionIcon('heroicon-m-arrow-trending-up'),
              Stat::make(__('Sellers'), Product::contarVendedores()),
                //  ->description('7% decrease')
                //   ->descriptionIcon('heroicon-m-arrow-trending-down'),
              Stat::make('Valor Total Productos', Product::valorTotalProductos()),
                //  ->description('3% increase')
                //  ->descriptionIcon('heroicon-m-arrow-trending-up'),
            ];
        }
    }
