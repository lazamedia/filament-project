<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return 
        $form->schema([
            TextInput::make('name')
            ->required()
            ->maxLength(255)
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', 'produk-' . Str::slug($state))),
        
            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignorable: fn($record) => $record)
                ->afterStateHydrated(function ($set, $state, $record) {
                    if ($record && empty($state)) {
                        $set('slug', 'produk-' . $record->slug); 
                    }
                }),
            
            Textarea::make('description')
                ->required(),
            TextInput::make('link_drive')
                ->label('Link Drive')
                ->url()
                ->nullable(),
            Select::make('kategori_produks_id')
                ->required()
                ->relationship('kategoriproduks', 'name'),
            TextInput::make('original_price')
                ->required()
                ->minValue(0)
                ->step(0.01),
            TextInput::make('sale_price')
                ->required()
                ->minValue(0)
                ->step(0.01),
            FileUpload::make('image')
                ->image()
                ->nullable()
                ->maxSize(1024)
                ->disk('public')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('kategori_produk.name'),
                TextColumn::make('original_price')->sortable(),
                TextColumn::make('sale_price')->sortable(),
                TextColumn::make('sold')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProducts::route('/'),
        ];
    }
}
