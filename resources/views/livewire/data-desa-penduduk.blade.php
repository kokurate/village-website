<div>

    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-md-8 my-2">
                <div class="card">
                    <div class="progress card-progress">
                        <div class="progress-bar bg-primary" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" aria-label="20% Complete">
                            
                        </div>
                    </div>
                    {{-- <div class="card-status-start bg-primary"></div> --}}
                    <div class="card-header mt-1">
                        <ul class="nav nav-tabs card-header-tabs">
                            <h3 class="d-flex ml-2">Data Penduduk</h3>
                            <li class="nav-item ms-auto">
                                <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                    data-bs-target='#penduduk_modal'>Tambah Data</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table id="data_penduduk" class="table table-hover  table-sm display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th></th>
                    
                                </tr>
                            </thead>
                            <tbody>
                    
                                @foreach(\App\Models\DataPenduduk::all() as $index => $data)
                                <tr>
                                    <td class="text-muted">{{ $index + 1 }}</td>
                                    <td class="text-muted">{{ $data->nama }}</td>
                                    <td class="text-muted">{{ $data->nik }}</td>
                                    <td class="text-muted">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editPenduduk({{ $data->id }})'>Edit</a>&nbsp;
                                            <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deletePenduduk({{ $data->id }})'>Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>

     <!-- Modal Start -->
     <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="penduduk_modal"
     data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <form class="modal-content" method="post"
         @if($updatePendudukMode)
             wire:submit.prevent='updatePenduduk()'
         @else
             wire:submit.prevent='addPenduduk'
         @endif
         >
             <div class="modal-header">
                 <h5 class="modal-title">{{ $updatePendudukMode ? 'Update Data Penduduk' : 'Tambah Data Penduduk' }}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 @if($updatePendudukMode)
                     <input type="hidden" wire:model="selected_penduduk_id">
                 @endif
                 <div class="mb-3">
                     <label class="form-label">Nama</label>
                     <input type="text" class="form-control @error('nama') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama" wire:model="nama">
                 @error('nama')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
                 </div>
                 <div class="mb-3">
                     <label class="form-label">NIK</label>
                     <input type="text" class="form-control @error('nik') is-invalid @enderror" name="example-text-input" placeholder="Masukkan NIK" wire:model="nik">
                 @error('nik')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
                 </div>
             </div>
 
             <div class="modal-footer">
                 <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">{{ $updatePendudukMode ? 'Update' : 'Simpan'}}</button>
             </div>
         </form>
        </div>
    </div>
    
    <!-- Modal  end-->

    

</div>
