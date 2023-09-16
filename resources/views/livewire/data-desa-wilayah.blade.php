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
                            <h3 class="d-flex ml-2">Data Wilayah Administratif</h3>
                            <li class="nav-item ms-auto">
                                <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                    data-bs-target='#wilayah_modal'>Tambah Data</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Dusun</th>
                                        <th>KK</th>
                                        <th>Laki-laki</th>
                                        <th>Perempuan</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_wilayah as $data)
                                        
                                
                                    <tr>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->dusun }}</td>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->kk }}</td>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->laki_laki }}</td>
                                        <td class="text-muted" style="font-size: 14px">{{ $data->perempuan }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editWilayah({{ $data->id }})'>Edit</a>&nbsp;
                                                <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deleteWilayah({{ $data->id }})'>Hapus</a>
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
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="wilayah_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post"
            @if($updateWilayahMode)
                wire:submit.prevent='updateWilayah()'
            @else
                wire:submit.prevent='addWilayah'
            @endif
            >
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateWilayahMode ? 'Update Kategori' : 'Tambah Kategori' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updateWilayahMode)
                        <input type="hidden" wire:model="selected_wilayah_id">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Dusun</label>
                        <input type="text" class="form-control @error('dusun') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama dusun" wire:model="dusun">
                    @error('dusun')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">KK</label>
                        <input type="text" class="form-control @error('kk') is-invalid @enderror" name="example-text-input" placeholder="Masukkan jumlah KK" wire:model="kk">
                    @error('kk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Laki-laki</label>
                        <input type="text" class="form-control @error('laki_laki') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Jumlah laki-laki" wire:model="laki_laki">
                    @error('laki_laki')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perempuan</label>
                        <input type="text" class="form-control @error('perempuan') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Jumlah laki-laki" wire:model="perempuan">
                    @error('perempuan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $updateWilayahMode ? 'Update' : 'Simpan'}}</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal  end-->

</div>
