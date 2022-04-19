<div>
    <x-slot name="header">
        Cek Siswa : Alpha dan Bolos
    </x-slot>
    <div class="row my-2">
        <div class="col-lg-3">
            <label class="form-label">Tanggal</label>
            <input wire:model="tanggalAwal" type="date" class="form-control date">
        </div>
        <div class="col-lg-3">
            <label class="form-label">Tanggal</label>
            <input wire:model="tanggalAkhir" type="date" class="form-control date">
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead class="table-primary text-center">
            <tr>
                <th>1-2</th>
                <th>3-4</th>
                <th>5-6</th>
                <th>7-8</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2">
                    @if ($cekSiswa)
                        <ul class="list-group">
                            @foreach ($cekSiswa['1-2'] as $cek)
                                <li class="list-group-item">
                                    <div>
                                        {{ $cek->nama_kelas.'-'.$cek->nama.', '.date('d-m-y',strtotime($cek->tanggal)).' : '.$cek->nama_kehadiran }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td class="py-2">
                    @if ($cekSiswa)
                        <ul class="list-group">
                            @foreach ($cekSiswa['3-4'] as $cek)
                                <li class="list-group-item">
                                    <div>
                                        {{ $cek->nama_kelas.'-'.$cek->nama.', '.date('d-m-y',strtotime($cek->tanggal)).' : '.$cek->nama_kehadiran }}
                                    </div>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td class="py-2">
                    @if ($cekSiswa)
                        <ul class="list-group">
                            @foreach ($cekSiswa['5-6'] as $cek)
                                <li class="list-group-item">
                                    <div>
                                        {{ $cek->nama_kelas.'-'.$cek->nama.', '.date('d-m-y',strtotime($cek->tanggal)).' : '.$cek->nama_kehadiran }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td class="py-2">
                    @if ($cekSiswa)
                        <ul class="list-group">
                            @foreach ($cekSiswa['7-8'] as $cek)
                                <li class="list-group-item">
                                    <div>
                                        {{ $cek->nama_kelas.'-'.$cek->nama.', '.date('d-m-y',strtotime($cek->tanggal)).' : '.$cek->nama_kehadiran }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
