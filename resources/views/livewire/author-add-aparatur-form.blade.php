<div>
   
    <form method="POST"  wire:submit.prevent="AddAparatur()">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" wire:model="nama">
                    <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan" wire:model="jabatan">
                    <span class="text-danger">@error('jabatan') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary mt-4">Tambah Aparatur Desa</button>
                </div>
            </div>
        </div>
       
    </form>

</div>
