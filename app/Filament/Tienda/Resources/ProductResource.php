<?php
    
    namespace App\Filament\Tienda\Resources;
    
    use App\Filament\Tienda\Resources\ProductResource\Pages;
    use App\Filament\Tienda\Resources\ProductResource\RelationManagers;
    use App\Models\Product;
    use App\Models\Tag;
    use Filament\Forms;
    use Filament\Forms\Components\Repeater;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Forms\Get;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use FilamentTiptapEditor\Enums\TiptapOutput;
    use FilamentTiptapEditor\TiptapEditor;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\Auth;
    
    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
        protected static ?string $navigationGroup = 'Usuario';
        protected static ?int $navigationSort = 2;
        
        protected static ?string $navigationLabel = 'Productos en venta';
        
        public static function getEloquentQuery(): Builder
        {
            return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
        }
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Forms\Components\Hidden::make('user_id')
                  ->default(auth()->id()),
                Split::make([
                  Forms\Components\TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                  Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Seller')
                    ->translateLabel()
                    ->required(),
                  Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->translateLabel()
                    ->prefix('€'),
                ])->columnSpanFull(),
                Split::make([
                  Forms\Components\TextInput::make('units')
                    ->numeric()
                    ->columnStart(3)
                    ->translateLabel(),
                  Forms\Components\TextInput::make('descuento')
                    ->numeric()
                    ->columnStart(4)
                    ->translateLabel()
                    ->visible(fn(Get $get): bool => $get('oferta')),
                  Forms\Components\TextInput::make('stars')
                    ->integer()
                    ->step(5)
                    ->minValue(20)
                    ->maxValue(50)
                    ->columnSpan(1)
                    ->translateLabel(),
                  Forms\Components\Toggle::make('oferta')
                    ->translateLabel()
                    ->inline(false)
                    ->live(),
                  Forms\Components\Toggle::make('active')
                    ->translateLabel()
                    ->inline(false)
                    ->label('Activo'),
                ])
                  ->columnSpanFull(),
                TiptapEditor::make('description')
                  ->profile('default')
                  ->output(TiptapOutput::Html)
                  ->columnSpanFull(),
                Repeater::make('features')
                  ->translateLabel()
                  ->relationship('featuresproducts')
                  ->schema([
                    TextInput::make('title')->required()->label('nombre'),
                    TiptapEditor::make('text')
                      ->required()
                      ->label('Texto'),
                  ])
                  ->label('Especificaciones')
                  ->grid(2)
                  ->columnSpanFull(),
                Split::make([
                  Forms\Components\FileUpload::make('images')
                    ->directory('images/products')
                    ->image()
                    ->reorderable()
                    ->openable()
                    ->label('Añadir Imagen')
                    ->imageEditor()
                    ->appendFiles()//Invierte el orden en el array de imágenes
                    ->panelLayout('grid')
                    ->multiple(),
                  Split::make([
                    Forms\Components\Select::make('category_id')
                      ->translateLabel()->columnSpan(2)
                      ->relationship('category', 'name')
                      ->reactive(), // Esto hace que al cambiar la categoría, se actualicen otros campos dinámicamente
                    Forms\Components\CheckboxList::make('tag_id')
                      ->translateLabel()
                      ->relationship('tags')
                      ->options(fn(callable $get) => Tag::where('category_id', $get('category_id'))
                        ->pluck('name', 'id')),
                  ]),
                ])->columnSpanFull()
              ]);
        }
        
        
        public static function table(Table $table): Table
        {
            return $table
              ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->searchable(),
                Tables\Columns\TextColumn::make('price')
                  ->label('Precio')
                  ->money('EUR', divideBy: 100, locale: 'es')
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->label('Vendedor')
                  ->sortable(),
                Tables\Columns\ToggleColumn::make('active')
                  ->label('En Venta'),
                Tables\Columns\ToggleColumn::make('oferta'),
                Tables\Columns\TextColumn::make('descuento')
                  ->label('Descuento')
                  ->numeric()
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->numeric()
                  ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                  ->label('Categorias')
                  ->badge()
                  ->color('success'),
                Tables\Columns\TextColumn::make('tags.name')
                  ->label('Etiquetas')
                  ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
              ])
              ->filters([
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make()
                  // ->slideOver(),
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
                //  RelationManagers\CatprodsRelationManager::class,
                //  ProductResource\RelationManagers\FeaturesRelationManager::class,
            ];
        }
        
        public static function getPages(): array
        {
            return [
              'index' => Pages\ListProducts::route('/'),
              'create' => Pages\CreateProduct::route('/create'),
              'edit' => Pages\EditProduct::route('/{record}/edit'),
            ];
        }
        
        protected function mutateFormDataBeforeCreate(array $data): array
        {
            $data['user_id'] = auth()->id();
            
            return $data;
        }
    }