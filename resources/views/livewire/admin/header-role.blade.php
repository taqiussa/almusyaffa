<div>
    <x-slot name="header">
        Form Tambah Header
    </x-slot>
    <form wire:submit.prevent="save">
        <div class="input-style-1">
            <label class="fs-4">Header Name</label>
            <input wire:model="name" type="text" placeholder="Header Name" />
            <div class="text-danger px-1 py-1">@error('name'){{ $message }}@enderror</div>
        </div>
        <!-- end input -->
        <div class="d-flex justify-content-end">
            <button wire:click.prevent="save" type="submit" class="main-btn primary-btn btn-hover">Simpan</button>
        </div>
    </form>
    <div class="table-wrapper table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <h6>ID</h6>
                    </th>
                    <th>
                        <h6>Header Name</h6>
                    </th>
                    <th>
                        <h6>Action</h6>
                    </th>
                </tr>
                <!-- end table row-->
            </thead>
            <tbody>
                @foreach ($headers as $key => $header)
                <tr>
                    <td class="min-width">
                        <p>{{ $header->id }}</p>
                    </td>
                    <td class="min-width">
                        <p>{{ $header->name }}</p>
                    </td>
                    <td>
                        <div class="action">
                            <button wire:click="confirmDelete({{ $header->id }})" class="text-danger">
                                <i class="lni lni-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end table -->
    </div>
    <div class="my-2 mx-2">
        {{ $headers->links() }}
    </div>
</div>
