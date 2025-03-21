<?php
    
    namespace App\Filament\Tienda\Resources;
    
    use App\Filament\Tienda\Resources\ProductResource\Pages;
    use App\Filament\Tienda\Resources\ProductResource\RelationManagers;
    use App\Models\Product;
    use App\Models\Tag;
    use Filament\Forms\Components\CheckboxList;
    use Filament\Forms\Components\FileUpload;
    use Filament\Forms\Components\Repeater;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Components\Toggle;
    use Filament\Forms\Form;
    use Filament\Forms\Get;
    use Filament\Infolists\Components\Tabs;
    use Filament\Infolists\Infolist;
    use Filament\Resources\Resource;
    use Filament\Support\Enums\FontFamily;
    use Filament\Support\Enums\FontWeight;
    use Filament\Tables;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Columns\ToggleColumn;
    use Filament\Tables\Table;
    use FilamentTiptapEditor\Enums\TiptapOutput;
    use FilamentTiptapEditor\TiptapEditor;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    
    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
        protected static ?string $modelLabel = 'producto';
        protected static ?string $navigationLabel = 'Productos en venta';
        
        public static function getEloquentQuery(): Builder
        {
            return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
        }
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Split::make([
                  TextInput::make('name')
                    ->translateLabel()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->id('inputName')
                    ->maxLength(255),
                  TextInput::make('slug')
                    ->id('inputSlug')
                    ->required()
                    ->label('Slug'),
                    /* Select::make('user_id')
                       ->relationship('user', 'name')
                       ->label('Seller')
                       ->translateLabel()
                       ->required(),*/
                  TextInput::make('price')
                    ->numeric()
                    ->translateLabel()
                    ->prefix('€'),
                ])->columnSpanFull(),
                Split::make([
                  TextInput::make('units')
                    ->numeric()
                    ->columnStart(3)
                    ->translateLabel(),
                  TextInput::make('descuento')
                    ->numeric()
                    ->columnStart(4)
                    ->translateLabel()
                    ->visible(fn(Get $get): bool => $get('oferta')),
                  TextInput::make('stars')
                    ->integer()
                    ->step(5)
                    ->minValue(20)
                    ->maxValue(50)
                    ->columnSpan(1)
                    ->translateLabel(),
                  Toggle::make('oferta')
                    ->translateLabel()
                    ->inline(false)
                    ->live(),
                  Toggle::make('active')
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
                  ->relationship('featuretitles')
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
                  FileUpload::make('images')
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
                    Select::make('category_id')
                      ->translateLabel()->columnSpan(2)
                      ->relationship('category', 'name')
                      ->reactive(), // Esto hace que al cambiar la categoría, se actualicen otros campos dinámicamente
                    CheckboxList::make('tag_id')
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
                TextColumn::make('N')
                  ->rowIndex(),
                TextColumn::make('name')
                  ->label('Product')
                  ->color('primary')
                  ->tooltip('Click para ver')
                  ->searchable()
                  ->weight(FontWeight::Bold)
                  ->fontFamily(FontFamily::Sans)
                  ->url(fn(Product $record): string => route('products.show', ['product' => $record]))
                  ->openUrlInNewTab()
                  ->translateLabel(),
                TextColumn::make('price')
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->alignCenter()
                  ->translateLabel()
                  ->money('EUR', divideBy: 100, locale: 'es'),
                ToggleColumn::make('active')
                  ->alignCenter()
                  ->label('On Sale')
                  ->translateLabel(),
                ToggleColumn::make('oferta')
                  ->alignCenter()
                  ->label('Offer')
                  ->translateLabel(),
                TextColumn::make('descuento')
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->numeric()
                  ->alignCenter()
                  ->label('Descuento'),
                TextColumn::make('units')
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->alignCenter()
                  ->label('Stock')
                  ->translateLabel(),
                TextColumn::make('category.name')
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->alignCenter()
                  ->label('Categorias')
                  ->url(fn($record) => route('home',
                    ['category' => $record->category_id]))
                  ->openUrlInNewTab()
                  ->badge()
                  ->color('success'),
                TextColumn::make('tags.name')
                  ->openUrlInNewTab()
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->alignCenter()
                  ->label('Etiquetas')
                  ->badge(),
                  /*    TextColumn::make('user.name')
                        ->size(TextColumn\TextColumnSize::ExtraSmall)
                        ->label('Seller')
                        ->translateLabel()
                        ->icon('heroicon-m-user')
                        ->toggleable(isToggledHiddenByDefault: false),*/
                TextColumn::make('created_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
              ])
              ->filters([
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make(),
                  // ->slideOver(),
                Tables\Actions\ViewAction::make(),
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
              'index' => Pages\ListProducts::route('/'),
              'create' => Pages\CreateProduct::route('/create'),
              'edit' => Pages\EditProduct::route('/{record}/edit'),
            ];
        }
        
        public function productInfolist(Infolist $infolist): Infolist
        {
            return $infolist
              // ->record($this->product)
              ->schema([
                Tabs::make('Tabs')
                  ->tabs([
                    Tabs\Tab::make('Tab 1')
                      ->schema([
                          // ...
                      ]),
                    Tabs\Tab::make('Tab 2')
                      ->schema([
                          // ...
                      ]),
                    Tabs\Tab::make('Tab 3')
                      ->schema([
                          // ...
                      ]),
                  ])
                  // ...
              ]);
        }
    }
