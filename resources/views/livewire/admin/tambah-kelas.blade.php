<div>
    <x-slot name="header">
        Form Tambah Kelas
    </x-slot>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Form Tambah Kelas
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class=" d-flex justify-content-start">
                        <form wire:submit.prevent="save">
                            @csrf
                            <div class="mb-3">
                                <label for="tingkatKelas" class="form-label">Tingkat</label>
                                <select wire:model.defer="tingkat" class="form-select" id="tingkatKelas">
                                    <option selected>Pilih Tingkat Kelas</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Kelas</label>
                                <input wire:model.defer="nama" type="text" id="namaKelas" class="form-control"
                                    placeholder="Nama Kelas" aria-describedby="helpId">
                                @error('nama')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button wire:click.prevent="save" type="button" class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Tingkat</th>
                <th>Nama Kelas</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $key => $classroom)
                <tr>
                    <td scope="row">{{ $kelas->firstItem() + $key }}</td>
                    <td>{{ $classroom->tingkat }}</td>
                    <td>{{ $classroom->nama }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
    <div class="my-2">
        {{ $kelas->links() }}
    </div>
</div>
