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
                            <h3 class="d-flex ml-2">Data Jenis Kelamin</h3>
                            <li class="nav-item ms-auto">
                                <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                    data-bs-target='#jenis_kelamin_modal'>Tambah Data</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>Jumlah</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all as $data)
                                        
                                
                                    <tr>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->jenis_kelamin }}</td>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->jumlah }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editJenisKelamin({{ $data->id }})'>Edit</a>&nbsp;
                                                <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deleteJenisKelamin({{ $data->id }})'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="3"><span class="text-danger">Tidak ada data yang ditemukan.</span></td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
    
    <!-- Modal Start -->
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="jenis_kelamin_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post"
            @if($updateJenisKelaminMode)
                wire:submit.prevent='updateJenisKelamin()'
            @else
                wire:submit.prevent='addJenisKelamin'
            @endif
            >
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateJenisKelaminMode ? 'Update Data Jenis Kelamin' : 'Tambah Data Jenis Kelamin' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updateJenisKelaminMode)
                        <input type="hidden" wire:model="selected_jenis_kelamin_id">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama Jenis Kelamin" wire:model="nama">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="example-text-input" placeholder="Masukkan jumlah" wire:model="jumlah">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $updateJenisKelaminMode ? 'Update' : 'Simpan'}}</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal  end-->

</div>
