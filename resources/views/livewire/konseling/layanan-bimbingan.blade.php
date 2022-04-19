<div>
    <x-slot name="header">
        Layanan Bimbingan dan Konseling
    </x-slot>
    <form wire:submit.prevent="save">
        @csrf
        <div class="row mb-2">
            <div class="col-lg-3 mx-1">
                <label class="form-label">Tanggal</label>
                <input wire:model.defer="tanggal" type="date" class="form-control">
                @error('tanggal')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-3 mx-1">
                <label class="form-label">Jenis Bimbingan</label>
                <select wire:model.defer="jenisBimbingan" class="form-select">
                    <option value="">Pilih Jenis Bimbingan</option>
                    <option value="belajar">Belajar</option>
                    <option value="sosial">Sosial</option>
                    <option value="pribadi">Pribadi</option>
                    <option value="karir">Karir</option>
                </select>
                @error('jenisBimbingan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-3 mx-1">
                <label class="form-label">Bentuk Bimbingan</label>
                <select wire:model="bentukBimbingan" class="form-select">
                    <option value="">Pilih Bentuk Bimbingan</option>
                    <option value="individu">Individu</option>
                    <option value="kelompok">Kelompok</option>
                    <option value="kelas">1 Kelas</option>
                </select>
                @error('bentukBimbingan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        @switch($bentukBimbingan)
            @case('individu')
                <div class="row mb-3">
                    <label class="form-label text-bold fs-4">INDIVIDU</label>
                    <div class="col-lg-3 mx-1">
                        <label class="form-label">Kelas</label>
                        <select wire:model="kelas" class="form-select">
                            <option value="">Pilih Kelas</option>
                            @foreach ($listKelas as $key => $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-3 mx-1">
                        <label class="form-label">Siswa</label>
                        <select wire:model.defer="siswa" class="form-select">
                            <option value="">Pilih Siswa</option>
                            @foreach ($listSiswa as $siswa)
                                <option value="{{ $siswa->nis }}">{{ $siswa->name }}</option>
                            @endforeach
                        </select>
                        @error('siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            @break

            @case('kelompok')
                <div class="row mb-2">
                    <label class="form-label text-bold fs-4">KELOMPOK</label>
                    <div class="row mb-2">
                        <div class="col-lg-3 mx-1">
                            <label class="form-label">Kelas</label>
                            <select wire:model="kelas" class="form-select">
                                <option value="">Pilih Kelas</option>
                                @foreach ($listKelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 mx-1">
                            <label class="form-label">Siswa</label>
                            <select wire:model.defer="siswa" class="form-select">
                                <option value="">Pilih Siswa</option>
                                @foreach ($listSiswa as $siswa)
                                    <option value="{{ $siswa->nis }}">{{ $siswa->name }}</option>
                                @endforeach
                            </select>
                            @error('siswa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 mx-1">
                            <label class="form-label">&nbsp;</label>
                            <button wire:click.prevent="tambahKelompok()" class="btn btn-primary form-control">
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
                                            <button wire:click.prevent="hapusKelompok({{ $key }})"
                                                class="btn btn-danger">X</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @break

            @case('kelas')
                <div class="row">
                    <label class="form-label text-bold fs-4">1 KELAS</label>
                    <div class="col-lg-3 mx-1">
                        <label class="form-label">Kelas</label>
                        <select wire:model.defer="kelas" class="form-select">
                            <option value="">Pilih Kelas</option>
                            @foreach ($listKelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @break

            @default
        @endswitch
        <div class="row mb-3">
            <div class="col-lg-9 mx-1">
                <label class="form-label">Permasalahan</label>
                <textarea wire:model.defer="permasalahan" class="form-control" rows="3"></textarea>
                @error('permasalahan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-9 mx-1">
                <label class="form-label">Penyelesaian</label>
                <textarea wire:model.defer="penyelesaian" class="form-control" rows="3"></textarea>
                @error('penyelesaian')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-9 mx-1">
                <label class="form-label">Tindak Lanjut</label>
                <input wire:model.defer="tindakLanjut" type="text" class="form-control" placeholder="Tindak Lanjut">
                @error('tindakLanjut')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-inline-flex">
            <div class="col-9 mx-1">
                <label class="form-label">Foto</label>
                <input wire:model="foto" type="file" class="form-control" placeholder="Tindak Lanjut">
                @error('foto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-2">
                <label class="form-label"><span></span></label>
                <button wire:click.prevent="$set('foto','')" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        @if ($foto)
            <div class="row mb-3">
                <div class="col-lg-9 mx-1">
                    <img src="{{ $foto->temporaryUrl() }}" class="img img-thumbnail" alt="foto">
                </div>
            </div>
        @endif
        <div class="row mb-3 d-inline-flex">
            <div class="col-9 mx-1">
                <label class="form-label">Dokumen</label>
                <input wire:model="fotoDokumen" type="file" class="form-control" placeholder="Tindak Lanjut">
                @error('fotoDokumen')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-2">
                <label class="form-label"><span></span></label>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        @if ($fotoDokumen)
            <div class="row mb-3">
                <div class="col-lg-9 mx-1">
                    <img src="{{ $fotoDokumen->temporaryUrl() }}" class="img img-thumbnail" alt="fotoDokumen">
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-end">
            <div class="col-lg-3">
                <button wire:click.prevent="save" class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
