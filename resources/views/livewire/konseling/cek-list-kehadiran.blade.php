<div>
    <x-slot name="header">
        Cek List Kehadiran
    </x-slot>
    <div class="row my-2">
        <div class="col-lg-3">
            <label for="" class="form-label">Tanggal</label>
            <input wire:model="tanggal" type="date" class="form-control date">
        </div>
        <div class="col-lg-3">
            <label for="" class="form-label">Kelas</label>
            <select wire:model="kelas" class="form-select">
                <option value="">Pilih Kelas</option>
                @foreach ($listKelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <table class="table table-striped table-bordered table-hover table-responsive">
            <thead class="table-primary">
                <tr class="text-center">
                    <th>Kelas</th>
                    <th>Jam 1-2</th>
                    <th>Jam 3-4</th>
                    <th>Jam 5-6</th>
                    <th>Jam 7-8</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class=" text-center">{{ $selectedKelas->nama ??'' }}</td>
                    <td class="py-2">
                        @if ($searchKehadiran)
                            @foreach ($kehadiran as $key => $hadir)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <div>
                                            {{ $hadir->nama }}
                                        </div>
                                        <div>
                                            <input
                                                wire:model="searchKehadiran.{{ $key }}.count1-2"
                                                type="hidden">
                                            {{ $searchKehadiran[$key]['count1-2'] }}
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </td>
                    <td class="py-2">
                        @if ($searchKehadiran)
                            @foreach ($kehadiran as $key => $hadir)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <div>
                                            {{ $hadir->nama }}
                                        </div>
                                        <div>
                                            <input
                                                wire:model="searchKehadiran.{{ $key }}.count1-2"
                                                type="hidden">
                                            {{ $searchKehadiran[$key]['count3-4'] }}
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </td>
                    <td class="py-2">
                        @if ($searchKehadiran)
                            @foreach ($kehadiran as $key => $hadir)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <div>
                                            {{ $hadir->nama }}
                                        </div>
                                        <div>
                                            <input
                                                wire:model="searchKehadiran.{{ $key }}.count1-2"
                                                type="hidden">
                                            {{ $searchKehadiran[$key]['count5-6'] }}
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </td>
                    <td class="py-2">
                        @if ($searchKehadiran)
                            @foreach ($kehadiran as $key => $hadir)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <div>
                                            {{ $hadir->nama }}
                                        </div>
                                        <div>
                                            <input
                                                wire:model="searchKehadiran.{{ $key }}.count1-2"
                                                type="hidden">
                                            {{ $searchKehadiran[$key]['count7-8'] }}
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div wire:init="checkAttend">
        @isset($attendanceCount[32][3]['count7-8'])
        <table class="table table-bordered table-striped table-hover table-responsive">
            <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>1-2</th>
                    <th>3-4</th>
                    <th>5-6</th>
                    <th>7-8</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $key => $classroom)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $classroom->nama }}
                        </td>
                        <td>
                            <input wire:model="checkList.{{ $key }}.show1-2" type="hidden"
                                class="form-control">
                            @if ($checkList[$key]['show1-2']->isEmpty())
                                <h5>Belum di Absen</h5>
                            @else
                                @foreach ($attendances as $index => $attendance)
                                    <ul class="list-group ">
                                        <li
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <div>
                                                {{ $attendance->nama }}
                                            </div>
                                            <div>
                                                <input
                                                    wire:model="attendanceCount.{{ $key }}.{{ $index }}.count1-2"
                                                    type="hidden">
                                                {{ $attendanceCount[$key][$index]['count1-2'] }}
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <input wire:model="checkList.{{ $key }}.show3-4" type="hidden"
                                class="form-control">
                            @if ($checkList[$key]['show3-4']->isEmpty())
                                <h5>Belum di Absen</h5>
                            @else
                                @foreach ($attendances as $index => $attendance)
                                    <ul class="list-group ">
                                        <li
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <div>
                                                {{ $attendance->nama }}
                                            </div>
                                            <div>
                                                <input
                                                    wire:model="attendanceCount.{{ $key }}.{{ $index }}.count3-4"
                                                    type="hidden">
                                                {{ $attendanceCount[$key][$index]['count3-4'] }}
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <input wire:model="checkList.{{ $key }}.show5-6" type="hidden"
                                class="form-control">
                            @if ($checkList[$key]['show5-6']->isEmpty())
                                <h5>Belum di Absen</h5>
                            @else
                                @foreach ($attendances as $index => $attendance)
                                    <ul class="list-group ">
                                        <li
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <div>
                                                {{ $attendance->nama }}
                                            </div>
                                            <div>
                                                <input
                                                    wire:model="attendanceCount.{{ $key }}.{{ $index }}.count5-6"
                                                    type="hidden">
                                                {{ $attendanceCount[$key][$index]['count5-6'] }}
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <input wire:model="checkList.{{ $key }}.show7-8" type="hidden"
                                class="form-control">
                            @if ($checkList[$key]['show7-8']->isEmpty())
                                <h5>Belum di Absen</h5>
                            @else
                                @foreach ($attendances as $index => $attendance)
                                    <ul class="list-group ">
                                        <li
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <div>
                                                {{ $attendance->nama }}
                                            </div>
                                            <div>
                                                <input
                                                    wire:model="attendanceCount.{{ $key }}.{{ $index }}.count7-8"
                                                    type="hidden">
                                                {{ $attendanceCount[$key][$index]['count7-8'] }}
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <x-skeleton-loading />
        @endisset
    </div> --}}
</div>
