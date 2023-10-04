<div>

    @if(Session::get('success'))
        <div class="alert alert-success">
            <strong>
                {{ Session::get('success') }}
            </strong>
        </div>
    @endif

    @if(Session::get('error'))
        <div class="alert alert-danger">
            <strong>
                {{ Session::get('error') }}
            </strong>
        </div>
    @endif
    
    <form wire:submit.prevent='addPermohonan()' method="post">
        <div class="row">
                <div class="col">
                    <p class="text-muted">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</p>
                    {{-- <p class="text-muted"><span class="text-danger">*</span> Harus diisi</p> --}}
                </div>
    
        
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mt-10">
                    <input type="text" name="nama" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'"  class="single-input" wire:model='nama'>
                    <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mt-10">
                    <input type="text" name="nik" placeholder="NIK" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK'"  class="single-input" wire:model='nik'>
                    <span class="text-danger">@error('nik') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mt-10">
                    <input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"  class="single-input" wire:model='email'>
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class=" mt-10">
                    
                        <select class="form-select" wire:model='jenis_surat'>
                            <option value="">Pilih Jenis Surat</option>
                        @foreach(\App\Models\JenisSurat::all() as $data)
                            <option value="{{ $data->nama_surat }}">{{ $data->nama_surat }}</option>
                        @endforeach
                        </select>
                </div>
                    <span class="text-danger">@error('jenis_surat') {{ $message }} @enderror</span>

              
            </div>
            <div class="col-12">
                <div class="mt-10">
                    <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pesan'" wire:model='pesan'></textarea>
                </div>
                <span class="text-danger">@error('pesan') {{ $message }} @enderror</span>

            </div>
            <button type="submit" class="btn btn-primary mx-auto mt-5">Kirim Permohonan</button>
        </div>
    </form>

</div>
