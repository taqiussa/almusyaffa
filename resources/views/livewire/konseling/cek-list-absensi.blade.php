<div>
    <x-slot name="header">
        Cek List Absensi
    </x-slot>
    <div class="row my-2">
        <div class="col-lg-3">
            <label for="" class="form-label">Tanggal</label>
            <input wire:model="tanggal" type="date" class="form-control date">
        </div>
    </div>
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
                <tr class="text-center">
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $classroom->nama }}
                    </td>
                    <td>
                        <input wire:model="checkList.{{ $key }}.show1-2" type="hidden" class="form-control">
                        @if (!$checkList[$key]['show1-2']->isEmpty())
                            <h5 class="text-success">V</h5>
                        @endif
                    </td>
                    <td>
                        <input wire:model="checkList.{{ $key }}.show3-4" type="hidden" class="form-control">
                        @if (!$checkList[$key]['show3-4']->isEmpty())
                            <h5 class="text-success">V</h5>
                        @endif
                    </td>
                    <td>
                        <input wire:model="checkList.{{ $key }}.show5-6" type="hidden" class="form-control">
                        @if (!$checkList[$key]['show5-6']->isEmpty())
                            <h5 class="text-success">V</h5>
                        @endif
                    </td>
                    <td>
                        <input wire:model="checkList.{{ $key }}.show7-8" type="hidden" class="form-control">
                        @if (!$checkList[$key]['show7-8']->isEmpty())
                            <h5 class="text-success">V</h5>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
