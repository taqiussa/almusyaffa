<div>
    <x-slot name="header">
        Absensi Siswa
    </x-slot>
    <div class="row">
        <div class="col-lg-3 mx-1">
            <label for="tanggal" class="form-label">Pilih tanggal</label>
            <input wire:model="tanggal" type="date" class=" form-control date" id="tanggal">
            @error('tanggal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-2 mx-1">
            <label for="jam" class="form-label">Pilih Jam</label>
            <select wire:model="jam" class="form-select" id="jam">
                <option value="">Pilih jam</option>
                <option value="1-2">1-2</option>
                <option value="3-4">3-4</option>
                <option value="5-6">5-6</option>
                <option value="7-8">7-8</option>
            </select>
            @error('jam')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-2 mx-1">
            <label for="kelas" class="form-label">Pilih Kelas</label>
            <select wire:model="kelas" class="form-select" id="kelas">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->nama }}</option>
                @endforeach
            </select>
            @error('kelas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-3 mx-1">
            <label for="tahun" class="form-label">Pilih Tahun Ajaran</label>
            <select wire:model="tahun" class="form-select" id="tahun">
                <option value="">Pilih Tahun</option>
                @for ($i = 2017; $i < gmdate('Y'); $i++)
                    <option>{{ $i + 1 . '/' . ($i + 2) }}</option>
                @endfor
            </select>
            @error('tahun')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row my-2">
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-default">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>
                            {{ $user->name }}
                            <input wire:model="attendance.{{ $key }}.ids" type="hidden">
                        </td>
                        <td>
                            <select wire:model.defer="attendance.{{ $key }}.attend"
                                wire:key="{{ $key }}" class="form-select" id="inputGroupSelect01">
                                <option value="">-Pilih-</option>
                                @foreach ($attendances as $attendance)
                                    <option value="{{ $attendance->id }}">{{ $attendance->nama }}</option>
                                @endforeach
                            </select>
                            @error('attendance.' . $key . '.attend')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2 d-flex justify-content-end">
        <button wire:click.prevent="save" class="btn btn-primary">save</button>
    </div>
</div>
