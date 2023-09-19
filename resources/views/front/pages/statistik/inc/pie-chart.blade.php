@extends('front.layouts.pages-layout')
@section('side-bar') @include('front.layouts.inc.side-bar') @endsection
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
{{-- @section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection --}}

@section('content')

<hr>
<h2>{{ $statistik_name }}</h2>
<figure class="highcharts-figure">
    <div id="container"></div>
    {{-- <p class="highcharts-description">
        This pie chart shows how the chart legend can be used to provide
        information about the individual slices.
    </p> --}}
</figure>

@endsection
@push('js')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
    // Data retrieved from https://netmarketshare.com/
    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Statistik',
            align: 'center'
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            pointFormat: '{series.name}: <b>{point.y}</b>' // Display the data value
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                @php
                    $currentRoute = request()->route()->getName();
                @endphp

                @foreach($all as $data)
                    @if($currentRoute == 'statistik2')
                    {
                        name: '{{$data->tingkat_pendidikan}}',
                        y: {{$data->jumlah}},
                        sliced: true,
                        // selected: true
                    },
                    @elseif($currentRoute == 'statistik3')
                    {
                        name: '{{ $data->nama }}',
                        y: {{$data->jumlah}},
                        sliced: true,
                        // selected: true
                    },
                    @elseif($currentRoute == 'statistik4')
                    {
                        name: '{{ $data->jenis_kelamin }}',
                        y: {{$data->jumlah}},
                        sliced: true,
                        // selected: true
                    },
                    @elseif($currentRoute == 'statistik5')
                    {
                        name: '{{ $data->umur }}',
                        y: {{$data->jumlah}},
                        sliced: true,
                        // selected: true
                    },
                    @elseif($currentRoute == 'statistik6')
                    {
                        name: '{{ $data->nama }}',
                        y: {{$data->jumlah}},
                        sliced: true,
                        // selected: true
                    },
                    @endif
                @endforeach   
            ]
        }]
    });

</script>
@endpush