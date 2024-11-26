<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = \App\Models\Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Artikel';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            // Card to group form elements
            Forms\Components\Card::make()

                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Enter the article title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                 
                    Forms\Components\Grid::make(2) 
                        ->schema([                            
                            Forms\Components\TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(ignorable: fn($record) => $record)
                                ->afterStateHydrated(function ($set, $state, $record) {
                                    // Jika record sudah ada, pastikan slug tetap sama jika tidak diubah
                                    if ($record && empty($state)) {
                                        $set('slug', $record->slug); // Biarkan slug yang lama tetap digunakan
                                    }
                                }),

                            Forms\Components\Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->required(),
                        ]),

                    Forms\Components\TextInput::make('short_description')
                        ->label('Deskripsi Singkat')
                        ->placeholder('Provide a brief description of the article')
                        ->maxLength(500),

                    Forms\Components\FileUpload::make('photo')
                        ->label('Image')
                        ->image()
                        ->directory('articles')
                        ->disk('public')
                        ->required(),

                    
                    Forms\Components\RichEditor::make('content')
                        ->label('Content')
                        ->placeholder('Write the content of the article here...')
                        ->required(),

                    Forms\Components\Hidden::make('user_id')
                        ->default(fn () => Auth::id()),
                ])
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('created_at')->date(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id()); 
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
