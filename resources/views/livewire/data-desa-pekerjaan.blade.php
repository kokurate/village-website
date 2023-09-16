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
                            <h3 class="d-flex ml-2">Data Mata Pencaharian</h3>
                            <li class="nav-item ms-auto">
                                <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                    data-bs-target='#pekerjaan_modal'>Tambah Data</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Mata Pencaharian</th>
                                        <th>Jumlah</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_pekerjaan as $data)
                                        
                                
                                    <tr>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->nama }}</td>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->jumlah }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editPekerjaan({{ $data->id }})'>Edit</a>&nbsp;
                                                <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deletePekerjaan({{ $data->id }})'>Hapus</a>
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
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="pekerjaan_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post"
            @if($updatePekerjaanMode)
                wire:submit.prevent='updatePekerjaan()'
            @else
                wire:submit.prevent='addPekerjaan'
            @endif
            >
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updatePekerjaanMode ? 'Update Data Mata Pencaharian' : 'Tambah Data Mata Pencaharian' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updatePekerjaanMode)
                        <input type="hidden" wire:model="selected_pekerjaan_id">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Pencaharian</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama Mata Pencaharian" wire:model="nama">
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
                    <button type="submit" class="btn btn-primary">{{ $updatePekerjaanMode ? 'Update' : 'Simpan'}}</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal  end-->

</div>
