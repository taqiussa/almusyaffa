<div>
    <x-slot name="header">
        Form Import Data Siswa
    </x-slot>
    <div class="mb-3">
        <label class="custom-file">
            <input wire:model="importFileUserSiswa" type="file" class="custom-file-input" aria-describedby="fileHelpId">
            <span class="custom-file-control">Import User Siswa</span>
        </label>
        <button wire:click.prevent="importUserSiswa" class="btn btn-primary">Import User Siswa</button>
        <div wire:loading.delay.long wire:target="importFileUserSiswa" class="text-danger">Please Wait While Import...</div>
        <div wire:loading.delay.long wire:target="importUserSiswa" class="text-danger">Please Wait While Import...</div>
        @error('importFileUserSiswa')
        <small id="fileHelpId" class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="custom-file">
            <input wire:model="importFileDataSiswa" type="file" class="custom-file-input" aria-describedby="fileHelpId">
            <span class="custom-file-control">Import data Siswa</span>
        </label>
        <button wire:click.prevent="importDataSiswa" class="btn btn-primary">Import Data Siswa</button>
        <div wire:loading.delay.long wire:target="importFileDataSiswa" class="text-danger">Please Wait While Import...</div>
        <div wire:loading.delay.long wire:target="importDataSiswa" class="text-danger">Please Wait While Import...</div>
        @error('importFileDataSiswa')
        <small id="fileHelpId" class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
