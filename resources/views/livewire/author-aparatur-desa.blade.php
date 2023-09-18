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

  <hr>
   
    <div class="card-table table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Foto</th>
              <th>Tambah Gambar</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @forelse(\App\Models\Aparatur::all() as $data)
            <tr>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->jabatan }}</td>
              <td>
                @if ($data->image == asset('back/dist/img/aparatur/default-img.png') )
                     <span class="text-danger"><strong>X</strong></span>
                @else
                    <span class="text-success"><strong>Yes</strong></span>
                @endif
              </td>
              <td>
                <div class="btn-group">
                  <input type="file" name="gambar{{ $data->id }}" id="gambar{{ $data->id }}" class="" >
                  {{-- <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editAgama({{ $data->id }})'>Edit</a>&nbsp; --}}
                </div>
              </td>
              <td>
                <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deleteAparatur({{ $data->id }})'>Hapus</a>
              </td>
            </tr>
            @empty
            <tr>
              <td>
                <span class="text-danger">Tidak ada data yang ditemukan</span>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

</div>
