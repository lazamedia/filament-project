<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use App\Imports\ImportAnggota;
use App\Models\Anggota;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageAnggotas extends ManageRecords
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string
    {
        return 'Data Anggota';
    }

    // public function getHeader(): ?View
    // {
    //     $data = Actions\CreateAction::make();
    //     return view('filament.custom.upload-file', compact('data'));
    // }
    public $file = '';

    public function save(){
        if ($this->file != '') {
            Excel::import(new ImportAnggota, $this->file);
        }

        // Anggota::create([
        //     'name' => 'lazz',
        //     'email' => '5vH9n@example.com',
        //     'alamat' => 'jl. cokroaminoto',
        //     'status' => 'anggota',
        // ]);
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Pengurus' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'Pengurus')),
            'Anggota' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'Anggota')),
        ];
    }
}
