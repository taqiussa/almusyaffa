<div>
    <x-slot name="header">
        Absensi Siswa BK
    </x-slot>
    <div class="row mb-2">
        <div class="col-lg-3 mx-1">
            <label class="form-label">Tanggal</label>
            <input wire:model="tanggal" type="date" class="form-control" {{ $isDisabled }}>
        </div>
        <div class="col-lg-3 mx-1">
            <label class="form-label">Jam</label>
            <select wire:model="jam" class="form-select" {{ $isDisabled ?? '' }}>
                <option value="">Pilih Jam</option>
                <option value="1-2">1-2</option>
                <option value="3-4">3-4</option>
                <option value="5-6">5-6</option>
                <option value="7-8">7-8</option>
            </select>
            @error('jam')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-3 mx-1">
            <label class="form-label">Kelas</label>
            <select wire:model="kelas" class="form-select" {{ $isDisabled ?? '' }}>
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                @endforeach
            </select>
            @error('kelas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-3 mx-1">
            <label class="form-label">Siswa</label>
            <select wire:model.defer="siswa" class="form-select">
                <option value="">Pilih Siswa</option>
                @foreach ($students as $siswa)
                    <option value="{{ $siswa->nis }}">{{ $siswa->name }}</option>
                @endforeach
            </select>
            @error('siswa')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-3 mx-1">
            <label class="form-label">Kehadiran</label>
            <select wire:model.defer="kehadiran" class="form-select">
                <option value="">Pilih Kehadiran</option>
                @foreach ($attendances as $attendance)
                    <option value="{{ $attendance->id }}">{{ $attendance->nama }}</option>
                @endforeach
            </select>
            @error('kehadiran')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-2 mx-1">
            <label class="form-label">&nbsp;</label>
            <button wire:click.prevent="tambahSiswa()" class="btn btn-primary form-control">
                Tambah
            </button>
        </div>
    </div>
    <div class="row mb-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th colspan="2">Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelompokSiswa as $key => $siswa)
                    <tr>
                        <td>
                            <div>
                                <input wire:model="kelompokSiswa.{{ $key }}.idKelas" type="hidden"
                                    class="form-control-plaintext">
                                <input wire:model="kelompokSiswa.{{ $key }}.namaKelas" type="text"
                                    class="form-control-plaintext">
                            </div>
                        </td>
                        <td>
                            <div>
                                <input wire:model="kelompokSiswa.{{ $key }}.nisSiswa" type="hidden"
                                    class="form-control-plaintext">
                                <input wire:model="kelompokSiswa.{{ $key }}.namaSiswa" type="text"
                                    class="form-control-plaintext">
                            </div>
                        </td>
                        <td>
                            <div>
                                <input wire:model="kelompokSiswa.{{ $key }}.idKehadiran" type="hidden"
                                    class="form-control-plaintext">
                                <input wire:model="kelompokSiswa.{{ $key }}.namaKehadiran" type="text"
                                    class="form-control-plaintext">
                            </div>
                        </td>
                        <td>
                            <button wire:click.prevent="hapusSiswa({{ $key }})"
                                class="btn btn-danger">X</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-lg-2">
            <button wire:click.prevent="save" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
