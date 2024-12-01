<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderUserResource\Pages;
use App\Filament\Resources\OrderUserResource\RelationManagers;
use App\Models\Order;
use App\Models\OrderList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderUserResource extends Resource
{
    protected static ?string $model = OrderList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product.name')
                    ->label('Produk'),
                    
                Forms\Components\TextInput::make('user.name')
                    ->label('Nama Pembeli'),
                    
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'Success' => 'Success',
                    ]),

                Forms\Components\FileUpload::make('payment_proof')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->disk('public')
                    ->directory('payment_proofs')
                    ->required(fn ($get) => $get('status') === 'paid') // Menyyaratkan upload jika status adalah paid
                    ->disableLabel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('user.name')
                ->label('Pembeli')
                ->searchable(),
            TextColumn::make('product.name')
                ->label('Produk')
                ->searchable(),
            BadgeColumn::make('status')
                ->colors([
                    'danger' => 'pending',
                    'success' => 'paid',
                    'warning' => 'shipped',
                    'primary' => 'delivered',
                ])
                ->label('Status')
                ->sortable(),
            // ImageColumn::make('payment_proof')
            //     ->label('Bukti Pembayaran')
            //     ->image()
            //     ->disk('public')
            //     ->path('payment_proofs')
            //     ->width(100)
            //     ->height(100)
            //     ->default(fn ($record) => asset('storage/' . $record->payment_proof)), // Menampilkan gambar
            TextColumn::make('created_at')
                ->label('Tanggal Pesanan')
                ->dateTime()
                ->sortable(),
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
            'index' => Pages\ListOrderUser::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
