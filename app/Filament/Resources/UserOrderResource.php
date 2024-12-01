<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserOrderResource\Pages;
use App\Models\OrderList;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\EditAction;

class UserOrderResource extends Resource
{
    protected static ?string $model = OrderList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pesanan Saya';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                FileUpload::make('payment_proof')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->disk('public') // Tentukan disk untuk menyimpan gambar
                    ->directory('payment_proofs')
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Jika bukti pembayaran diunggah, ubah status pesanan menjadi 'paid'
                        if ($state) {
                            $set('status', 'paid');
                        }
                    }),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
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
                //     ->disk('public') // Tentukan disk untuk menyimpan gambar
                //     ->image() // Menampilkan gambar dengan benar
                //     ->width(100) // Menentukan ukuran lebar gambar
                //     ->height(100),
                TextColumn::make('created_at')
                    ->label('Tanggal Pesanan')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('link_drive')
                    ->label('Link Google Drive')
                    ->sortable(),
                TextColumn::make('total_price')
                    ->label('Harga')
                    ->sortable(),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                    ])
            ])
            ->actions([
                // Menambahkan aksi Edit untuk memperbarui status dan mengunggah bukti pembayaran
                EditAction::make()->label('Edit Pesanan')->icon('heroicon-o-pencil'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserOrders::route('/'),
            'create' => Pages\CreateUserOrder::route('/create'),
            'edit' => Pages\EditUserOrder::route('/{record}/edit'),
        ];
    }
}
