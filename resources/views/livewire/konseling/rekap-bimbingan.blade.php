<div>
    <x-slot name="header">
        Rekap Bimbingan
    </x-slot>
    <div class="row my-2">
        <div class="col-lg-3 mx-1">
            <label class="form-label">Tanggal Awal</label>
            <input wire:model="tanggalAwal" type="date" class="form-control date">
        </div>
        <div class="col-lg-3 mx-1">
            <label class="form-label">Tanggal Akhir</label>
            <input wire:model="tanggalAkhir" type="date" class="form-control date">
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
        <div class="col-lg-3 mx-1">
            <label class="form-label">Kelas</label>
            <select wire:model="kelas" class="form-select">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 mx-1">
            <label class="form-label">Siswa</label>
            <select wire:model="siswa" class="form-select">
                <option value="">Pilih Siswa</option>
                @foreach ($students as $student)
                    <option value="{{ $student->nis }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row my-2">
        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Nama</th>
                    <th>Bentuk Bimbingan</th>
                    <th>Jenis Bimbingan</th>
                    <th>Permasalahan</th>
                    <th>Penyelesaian</th>
                    <th>Tindak Lanjut</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $key => $report)
                    <tr>
                        <td scope="row">{{ $reports->firstItem() + $key }}
                        </td>
                        <td>{{ date('l, d M y', strtotime($report->tanggal)) }}</td>
                        <td>
                            {{ $report->nama_kelas }}
                        </td>
                        <td>
                            {{ $report->name }}
                        </td>
                        <td>
                            {{ $report->bentuk_bimbingan }}
                        </td>
                        <td>
                            {{ $report->jenis_bimbingan }}
                        </td>
                        <td>
                            {{ $report->permasalahan }}
                        </td>
                        <td>
                            {{ $report->penyelesaian }}
                        </td>
                        <td>
                            {{ $report->tindak_lanjut }}
                        </td>
                        <td>
                            <a href="{{ route('konseling.detail-bimbingan', $report->slug) }}" class="nav-link">
                            Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <div class="row my-2 mx-1">
        {{ $reports->links() }}
    </div>
</div>
