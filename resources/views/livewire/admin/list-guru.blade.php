<div>
    <x-slot name="header">
        List Guru
    </x-slot>
    <table class="table table-striped table-hover table-bordered table-responsive">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $guru)
                <tr>
                    <td scope="row">{{ $users->firstItem() + $key }}</td>
                    <td>{{ $guru->name }}</td>
                    <td></td>
                    <td>
                        <a wire:click="confirmDelete({{ $guru->id }})" role="button" class="text-danger"><i data-feather="trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
