<div>
    <x-slot name="header">
        Rekap Kehadiran
    </x-slot>
    <div class="mb-3 col-lg-3 mx-1">
        <label for="" class="form-label">Tanggal</label>
        <input wire:model="tanggal" type="date" class="form-control">
    </div>
    <div class="row">
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon success">
                    <i class="lni lni-users"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Hadir</h6>
                    <h3 class="text-bold mb-10">{{ $hadir }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon orange">
                    <i class="lni lni-users"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Sakit</h6>
                    <h3 class="text-bold mb-10">{{ $sakit }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon orange">
                    <i class="lni lni-users"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Izin</h6>
                    <h3 class="text-bold mb-10">{{ $izin }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon orange text-danger">
                    <i class="lni lni-reddit"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Alpha</h6>
                    <h3 class="text-bold mb-10">{{ $alpha }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon orange text-danger">
                    <i class="lni lni-mailchimp"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Bolos</h6>
                    <h3 class="text-bold mb-10">{{ $bolos }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mx-1">
            <div class="icon-card mb-30">
                <div class="icon purple">
                    <i class="lni lni-hospital"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Pulang</h6>
                    <h3 class="text-bold mb-10">{{ $pulang }}</h3>
                    <p class="text-sm text-success">
                        <span class="text-gray">tanggal</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
