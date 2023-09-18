<div>

    <table id="surat_online" class="table table-hover  table-sm display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Tanggal Pengajuan</th>
                <th>Jenis Surat</th>
                <th>Nama</th>

            </tr>
        </thead>
        <tbody>

            @foreach(\App\Models\SuratOnline::where('status','masuk')->get() as $data)
            <tr>
                <td class="text-muted">
                    <div class="btn-group">
                        <a href="#" wire:click.prevent='editAgama({{ $data->id }})'>
                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                        </a>&nbsp;
                        <a href="#">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>

                        </a>&nbsp;
                        <a href="#" wire:click.prevent='detail({{ $data->id }})'>
                            <i class="fa fa-info-circle" aria-hidden="true"></i>

                        </a>&nbsp;
                    </div>
                </td>
                <td class="text-muted">{{ date_formatter($data->created_at) }}</td>
                <td class="text-muted">{{ $data->jenis_surat }}</td>
                <td class="text-muted">{{ $data->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal Start -->
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="detail_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($detail)
                        <h2 class="text-center">Tanggal Pengajuan : <strong>{{ date_formatter($detail->created_at) }}</strong></h2>
                        <p class="">Jenis Surat : <strong>{{ $detail->jenis_surat }}</strong></p>
                        <p class="">Nama : <strong>{{ $detail->nama }}</strong></p>
                        <p class="">Email : <strong>{{ $detail->email }}</strong></p>
                        <p class="">NIK : <strong>{{ $detail->nik }}</strong></p>
                    @else
                        <p>Data not available.</p>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  end-->

</div>