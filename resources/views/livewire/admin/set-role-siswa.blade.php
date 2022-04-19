<div>
    <x-slot name="header">
        Set User Sebagai Siswa
    </x-slot>
    <button wire:click.prevent="setUserToSiswa" class="btn btn-primary">Set USER to SISWA</button>
    <div wire:loading wire:target="setUserToSiswa" class="text-danger">Please Wait While Proccessing...</div>
    <button wire:click.prevent="setClassroomToSiswa" class="btn btn-primary">Set Classroom to SISWA</button>
    <div wire:loading wire:target="setClassroomToSiswa" class="text-danger">Please Wait While Proccessing...</div>
</div>
