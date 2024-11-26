<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SertifikatResource\Pages;
use App\Models\KodeSertif;
use App\Models\Sertifikat;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class SertifikatResource extends Resource
{
    protected static ?string $model = Sertifikat::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Sertifikat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Nama Lengkap')
                            ->maxLength(255),
                        TextInput::make('kegiatan')
                            ->required()
                            ->label('Kegiatan')
                            ->maxLength(255),

                        Grid::make(2)
                            ->schema([
                                Select::make('kode_sertifs_id')
                                    ->label('Jenis Sertifikat')
                                    ->relationship('kodeSertif', 'name')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, $set) {
                                        $kodeSertif = KodeSertif::find($state);
                                        if ($kodeSertif) {
                                       
                                            $lastKode = Sertifikat::where('kode_sertifs_id', $state)
                                                                ->latest('created_at')
                                                                ->first();
                                            
                                            $nomor = $lastKode ? (intval(substr($lastKode->kode_sertifikat, 0, strpos($lastKode->kode_sertifikat, '/'))) + 1) : 1;
    
                                            $nomorFormatted = str_pad($nomor, 3, '0', STR_PAD_LEFT);

                                            $kodeSertifikat = "{$nomorFormatted}/{$kodeSertif->kode}/UKMCYBER/" . now()->year;
    
                                            $set('kode_sertifikat', $kodeSertifikat);
                                        }
                                    }),
                                TextInput::make('kode_sertifikat')
                                    ->required()
                                    ->label('Kode Sertifikat')
                                    ->disabled(), 
                            ]),
                        

                        Grid::make(2)
                            ->schema([
                                DatePicker::make('tanggal')
                                    ->required()
                                    ->label('Tanggal')
                                    ->displayFormat('Y-m-d'),
                                Select::make('keterangan')
                                    ->required()
                                    ->label('Keterangan')
                                    ->options([
                                        'Peserta' => 'Peserta',
                                        'Panitia' => 'Panitia',
                                        'Juara 1' => 'Juara 1',
                                        'Juara 2' => 'Juara 2',
                                        'Juara 3' => 'Juara 3',
                                        'Harapan 1' => 'Harapan 1',
                                        'Harapan 2' => 'Harapan 2',
                                        'Harapan 3' => 'Harapan 3'
                                    ])
                                    ->default('Peserta')
                                    ->reactive(),
                            ]),
                        

                        RichEditor::make('detail')
                            ->label('Detail Acara')
                            ->placeholder('Masukkan Detail Acara (Opsional)'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kegiatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_sertifikat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('keterangan')
                    ->label('Keterangan')
                    ->colors([
                        'danger' => 'Peserta',
                        'success' => 'Panitia',
                        'info' => 'Juara 1',
                        'info' => 'Juara 2',
                        'info' => 'Juara 3',
                        'info' => 'Harapan 1',
                        'info' => 'Harapan 2',
                        'info' => 'Harapan 3',
                    ])
                    ->formatStateUsing(function ($state) {
                        switch ($state) {
                            case 'Panitia':
                                return 'Panitia';
                            case 'Peserta':
                                return 'Peserta';
                            case 'Juara 1':
                                return 'Juara 1';
                            case 'Juara 2':
                                return 'Juara 2';
                            case 'Juara 3':
                                return 'Juara 3';
                            case 'Harapan 1':
                                return 'Harapan 1';
                            case 'Harapan 2':
                                return 'Harapan 2';
                            case 'Harapan 3':
                                return 'Harapan 3';
                            default:
                                return ucfirst($state);
                        }
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([/* Filters */])
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
            'index' => Pages\ManageSertifikats::route('/'),
        ];
    }
}
