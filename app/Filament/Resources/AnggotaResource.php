<?php

namespace App\Filament\Resources;

use App\Filament\Exports\AnggotaExporter;
use App\Filament\Imports\AnggotaImporter;
use App\Filament\Resources\AnggotaResource\Pages;
use App\Models\Anggota;
use Filament\Actions\Exports\Exporter;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Anggota';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(20),
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(500),
                Select::make('status')
                    ->required()
                    ->options([
                        'anggota' => 'Anggota',
                        'pengurus' => 'Pengurus',
                        'alumni' => 'Alumni',
                        'tidak aktif' => 'Tidak Aktif',
                    ])
                    ->default('anggota')
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'anggota',
                        'success' => 'pengurus',
                        'info' => 'alumni',
                        'danger' => 'tidak aktif',
                    ])
                    ->formatStateUsing(function ($state) {
                        switch ($state) {
                            case 'anggota':
                                return 'Anggota';
                            case 'pengurus':
                                return 'Pengurus';
                            case 'alumni':
                                return 'Alumni';
                            case 'tidak aktif':
                                return 'Tidak Aktif';
                            default:
                                return ucfirst($state);
                        }
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'anggota' => 'Anggota',
                        'pengurus' => 'Pengurus',
                        'alumni' => 'Alumni',
                        'tidak aktif' => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(AnggotaExporter::class),
                ImportAction::make()->importer(AnggotaImporter::class),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(AnggotaExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAnggotas::route('/'),
        ];
    }
}
