@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('side-bar') @include('front.layouts.inc.side-bar') @endsection

{{-- @section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection --}}

@section('content')

<hr>
<h2>Statistik Wilayah Administratif</h2>
<figure class="highcharts-figure">
    <div id="container"></div>
    {{-- <p class="highcharts-description">
        hello
    </p> --}}

    <table id="datatable" class="table table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">KK</th>
                <th scope="col">Laki-laki</th>
                <th scope="col">Perempuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all as $data)
            <tr>
                <th scope="row">Dusun {{ $data->dusun }}</th>
                <td>{{ $data->kk }}</td>
                <td>{{ $data->laki_laki }}</td>
                <td>{{ $data->perempuan }}</td>
            </tr>
            @endforeach
            <tr>
                <th scope="row">Jumlah</th>
                <td>{{ $total_kk }}</td>
                <td>{{ $total_laki_laki }}</td>
                <td>{{ $total_perempuan }}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-center"><strong>Total Penduduk {{ $jumlah }}</strong></td>
            </tr>
        </tbody>
    </table>
</figure>


@endsection
@push('js')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script>
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Penduduk'
    },
    subtitle: {
        text:
            'Desa Toruakat'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'jumlah'
        }
    }
});

</script>
@endpush