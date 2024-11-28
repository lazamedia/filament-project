<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KodeSertifResource\Pages;
use App\Filament\Resources\KodeSertifResource\RelationManagers;
use App\Models\KodeSertif;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Clusters\Kategori;

class KodeSertifResource extends Resource
{
    protected static ?string $model = KodeSertif::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'Kategori Sertifikat';

    protected static ?string $cluster = Kategori::class; 

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->required()
                ->label('Kategori Sertifikat')
                ->maxLength(50),
            TextInput::make('kode')
                ->required()
                ->label('Kode Sertifikat')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('kode')->sortable(),
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
            'index' => Pages\ManageKodeSertifs::route('/'),
        ];
    }
}
