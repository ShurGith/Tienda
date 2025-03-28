<?php
    
    namespace App\Filament\Tienda\Resources;
    
    use App\Filament\Tienda\Resources\OrderResource\Pages;
    use App\Filament\Tienda\Resources\OrderResource\RelationManagers;
    use App\Models\Order;
    use Carbon\Carbon;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\Auth;
    
    class OrderResource extends Resource
    {
        protected static ?string $model = Order::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-banknotes';
        protected static ?string $modelLabel = 'Compras';
        protected static ?string $navigationLabel = 'Compras realizadas';
        
        public static function getEloquentQuery(): Builder
        {
            return parent::getEloquentQuery()->where('buyer_id', Auth::user()->id);
        }
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                  //
              ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
              ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('quantity')->label('Quantity')
                  ->alignCenter()
                  ->translateLabel(),
                TextColumn::make('product.name')
                  ->label('Name')
                  ->alignCenter()
                  ->sortable()
                  ->searchable()
                  ->translateLabel(),
                TextColumn::make('product.price')
                  ->label('Price')
                  ->sortable()
                  ->searchable()
                  ->alignCenter()
                  ->translateLabel()
                  ->money('EUR', divideBy: 100, locale: 'es'),
                TextColumn::make('Total')
                  ->label('Total')
                  ->getStateUsing(fn($record) => $record->product->price * $record->quantity)
                  ->alignCenter()
                  ->money('EUR', divideBy: 100, locale: 'es'),
                TextColumn::make('created_at')
                  ->label('Fecha')
                  ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d/m/Y'))
                  ->alignCenter()
                  ->sortable()
                  ->translateLabel(),
              ])
              ->filters([
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make(),
              ])
              ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                  Tables\Actions\DeleteBulkAction::make(),
                ]),
              ]);
        }
        
        public static function getRelations(): array
        {
            return [
                //
            ];
        }
        
        public static function getPages(): array
        {
            return [
              'index' => Pages\ListOrders::route('/'),
              'create' => Pages\CreateOrder::route('/create'),
              'edit' => Pages\EditOrder::route('/{record}/edit'),
            ];
        }
    }
