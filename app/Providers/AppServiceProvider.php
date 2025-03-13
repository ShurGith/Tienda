<?php
    
    namespace App\Providers;
    
    use BezhanSalleh\PanelSwitch\PanelSwitch;
    use Illuminate\Support\ServiceProvider;
    
    
    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         */
        public function register(): void
        {
            //
        }
        
        /**
         * Bootstrap any application services.
         */
        public function boot(): void
        {
            PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
                $panelSwitch
                  ->modalWidth('sm')
                  ->visible(fn(): bool => auth()->user()->isAdmin())
                  ->slideOver();
            });
        }
    }
