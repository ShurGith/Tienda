<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\ProductResource\Pages;
    use App\Models\Product;
    use App\Models\Tag;
    use Filament\Forms;
    use Filament\Forms\Components\Repeater;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Forms\Get;
    use Filament\Infolists\Components\Grid;
    use Filament\Infolists\Components\IconEntry;
    use Filament\Infolists\Components\ImageEntry;
    use Filament\Infolists\Components\Section;
    use Filament\Infolists\Components\Split as SplitInfolist;
    use Filament\Infolists\Components\TextEntry;
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
    
    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
        protected static ?string $navigationGroup = 'Productos';
        protected static ?string $modelLabel = 'producto';
        protected static ?string $navigationLabel = 'Productos en venta';
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
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
                TextColumn::make('user.name')
                  ->size(TextColumn\TextColumnSize::ExtraSmall)
                  ->label('Seller')
                  ->translateLabel()
                  ->icon('heroicon-m-user')
                  ->toggleable(isToggledHiddenByDefault: false),
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
                Tables\Actions\EditAction::make()
                  ->slideOver(),
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
              'view' => Pages\ViewProduct::route('/{record}'),
            
            ];
        }
        
        
        public static function infolist(Infolist $infolist): Infolist
        {
            Infolist::$defaultNumberLocale = config('app.locale');
            return $infolist
              ->schema([
                Section::make()
                  ->schema([
                    Grid::make(4)->schema([
                      SplitInfolist::make([
                        Section::make([
                          Grid::make()->schema([
                            TextEntry::make('name')
                              ->badge()
                              ->color('info')
                              ->translateLabel(),
                            TextEntry::make('price')
                              ->money('EUR', divideBy: 100, locale: 'es')
                              ->badge()
                              ->color('info')
                              ->translateLabel(),
                          ]),
                          Grid::make()->schema([
                            TextEntry::make('price')
                              ->label('Final Price')
                              ->badge()
                              ->hidden(fn($record) => !$record->oferta)
                              ->formatStateUsing(fn($record
                              ) => number_format($record->price / 100 * (1 - $record->descuento / 100),
                                  2, ',', '.').' €'),
                            TextEntry::make('price')
                              ->label('Saving')
                              ->badge()
                              ->color('success')
                              ->hidden(fn($record) => !$record->oferta)
                              ->formatStateUsing(fn($record
                              ) => number_format($record->price / 100 * ($record->descuento / 100),
                                  2, ',', '.').' €')
                              ->translateLabel(),
                            TextEntry::make('descuento')
                              ->suffix('%')
                              ->badge()
                              ->color('info')
                              ->label('Discount')
                              ->translateLabel(),
                            TextEntry::make('units')
                              ->badge()
                              ->color('info')
                              ->label('Stock')
                              ->numeric()
                              ->translateLabel(),
                          ]),
                        ]),
                      ]),
                        /*
                         * ViewEntry::make('stars')
                          ->view('components.filament.stars')
                          ->translateLabel()
                          ->label('Stars'),
                          TextEntry::make('stars')
                                 ->badge()
                                 ->color('info')
                                 ->translateLabel(),*/
                      
                      SplitInfolist::make([
                        Section::make([
                          Grid::make()->schema([
                            IconEntry::make('active')
                              ->size(IconEntry\IconEntrySize::ExtraLarge)
                              ->translateLabel(),
                            IconEntry::make('oferta')
                              ->size(IconEntry\IconEntrySize::ExtraLarge)
                              ->label('Offer')
                              ->translateLabel(),
                          ]),
                          Grid::make()->schema([
                            TextEntry::make('category.name')
                              ->label('Category')
                              ->translateLabel()
                              ->badge()
                              ->color('success'),
                            TextEntry::make('tags.name')
                              ->label('Tags')
                              ->translateLabel()
                              ->badge(),
                          ]),
                          Grid::make()->schema([
                            TextEntry::make('stars')
                              ->translateLabel()
                              ->formatStateUsing(fn($record) => $record->getStars())
                              ->html()
                              ->badge(),
                            TextEntry::make('created_at')
                              ->label('Created')
                              ->badge()
                              ->color('info')
                              ->date()
                              ->sinceTooltip()
                              ->translateLabel(),
                          ])
                        ])
                      ]),
                      SplitInfolist::make([
                        Section::make([
                          TextEntry::make('user.name')
                            ->label('Seller')
                            ->badge()
                            ->color('info')
                            ->translateLabel(),
                          ImageEntry::make('images')
                            ->label('Images')
                            ->height(100)
                            ->translateLabel(),
                        ]),
                      ])->columnSpan(2),
                    ])
                  ])
              ]);
        }
        
        
    }
