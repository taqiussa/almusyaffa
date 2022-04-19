<div>
    <x-slot name="header">
        Detail Bimbingan
    </x-slot>

    <!-- ========= card-style-2 start ========= -->
    <div class="row">
        <div class="card-style-2 col-lg-6 mx-1 my-1">
            <div class="card-header bg-primary">
                <h4 class=" text-white">
                    {{ $details->user_name }}
                </h4>
            </div>
            <div class="card-image">
                <img src="{{ Storage::url($details->foto) }}" alt="foto" class="img img-thumbnail">
            </div>
            <div class="card-content">
                <h4>
                    Bentuk Bimbingan : {{ $details->bentuk_bimbingan }}
                </h4>
                <h4>
                    Jenis Bimbingan : {{ $details->jenis_bimbingan }}
                </h4>
                <p>
                    Permasalahan : <br>
                    {{ $details->permasalahan }}
                </p>
                <p>
                    Penyelesaian : <br>
                    {{ $details->penyelesaian }}
                </p>
                <p>
                    Tindak Lanjut : <br>
                    {{ $details->tindak_lanjut }}
                </p>
            </div>
        </div>
        <div class="card-style-2 col-lg-5 mx-1 my-1">
            <div class="card-header bg-primary">
                <h4 class=" text-white">
                    Dokumen Pendukung
                </h4>
            </div>
            <div class="card-image">
                <img src="{{ Storage::url($details->foto_dokumen) }}" alt="foto" class="img img-thumbnail">
            </div>
        </div>
    </div>
    <!-- ========= card-style-2 end ========= -->
</div>
