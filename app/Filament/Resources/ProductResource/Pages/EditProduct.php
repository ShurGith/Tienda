<?php
    
    namespace App\Filament\Resources\ProductResource\Pages;
    
    use App\Filament\Resources\ProductResource;
    use Filament\Actions;
    use Filament\Actions\Action;
    use Filament\Resources\Pages\EditRecord;
    
    //use Filament\Forms\Components\Actions\Action;
    
    class EditProduct extends EditRecord
    {
        protected static string $resource = ProductResource::class;
        
        protected function getHeaderActions(): array
        {
            return [
              Action::make('Save')
                ->translateLabel()
                ->action(fn($livewire) => $livewire->save())
                ->icon('heroicon-o-check')
                ->color('primary'),
              Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
            ];
        }
    }
