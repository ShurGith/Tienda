<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\BlogResource\Pages;
    use App\Filament\Resources\BlogResource\RelationManagers;
    use App\Models\Blog;
    use App\Models\Tag;
    use Filament\Forms;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Support\Enums\FontFamily;
    use Filament\Support\Enums\FontWeight;
    use Filament\Tables;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Table;
    use FilamentTiptapEditor\Enums\TiptapOutput;
    use FilamentTiptapEditor\TiptapEditor;
    use Illuminate\Support\Str;
    
    class BlogResource extends Resource
    {
        protected static ?string $model = Blog::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Split::make([
                  Forms\Components\TextInput::make('title')
                    ->translateLabel()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->id('inputName')
                    ->maxLength(255),
                  Forms\Components\TextInput::make('slug')
                    ->id('inputSlug')
                    ->required()
                    ->label('Slug'),
                  Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Author')
                    ->translateLabel()
                    ->required(),
                ])->columnSpanFull(),
                TiptapEditor::make('content')
                  ->profile('default')
                  ->output(TiptapOutput::Html)
                  ->columnSpanFull(),
                
                Split::make([
                  Forms\Components\Grid::make(8)
                    ->schema([
                      Forms\Components\FileUpload::make('images')
                        ->directory('images/blog')
                        ->image()
                        ->reorderable()
                        ->openable()
                        ->label('Añadir Imagen')
                        ->imageEditor()
                        ->appendFiles()//Invierte el orden en el array de imágenes
                        ->panelLayout('grid')
                        ->multiple()
                        ->columnSpan(5),
                      Forms\Components\Select::make('category_id')
                        ->translateLabel()->columnSpan(2)
                        ->relationship('category', 'name')
                        ->reactive(), // Esto hace que al cambiar la categoría, se actualicen otros campos dinámicamente
                      Forms\Components\CheckboxList::make('tag_id')
                        ->translateLabel()
                        ->relationship('tags')
                        ->options(fn(callable $get) => Tag::where('category_id', $get('category_id'))
                          ->pluck('name', 'id')),
                    ])
                ])->columnSpanFull(),
              ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table->columns([
              TextColumn::make('N')
                ->rowIndex(),
              Tables\Columns\ImageColumn::make('blog.getImgPal')
                ->defaultImageUrl(fn($record) => $record->getImgPal())
                ->square()
                ->size(80),
              TextColumn::make('title')
                ->label('Title')
                ->color('primary')
                ->tooltip('Click para ver')
                ->searchable()
                ->weight(FontWeight::Bold)
                ->fontFamily(FontFamily::Sans)
                ->url(fn(Blog $record): string => route('blog.show', ['blog' => $record]))
                ->openUrlInNewTab()
                ->translateLabel(),
              TextColumn::make('slug'),
              TextColumn::make('user.name'),
              TextColumn::make('created_at')
                ->date(),
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
              'index' => Pages\ListBlogs::route('/'),
              'create' => Pages\CreateBlog::route('/create'),
              'edit' => Pages\EditBlog::route('/{record}/edit'),
            ];
        }
    }
