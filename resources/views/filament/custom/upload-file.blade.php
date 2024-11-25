<div>

    <x-filament::breadcrumbs :breadcrumbs="[
        '/dashboard/anggotas' => 'Anggota',
        '' => 'list',
    ]" />

    <div class="flex justify-between mt-1">
        <div class="font-bold text-3xl">Upload</div>
        <div>{{ $data }}</div>
    </div>

    <div>
        <form wire:submit="save" class="w-full max-w-sm flex mt-2">
            <div class="mb-4">
                <label for="fileinput" class="block text-gray-700 text-sm font-bold mb-2">Pilih Berkas</label>
                <input type="file" wire:model="file" id="fileinput" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between mt-3">
                <button class="bg-primary hover:bg-primary-500  font-bold py-2 px-4 rounded" type="submit">
                    Unggah
                </button>
            </div>
        </form>
    </div>

</div>

