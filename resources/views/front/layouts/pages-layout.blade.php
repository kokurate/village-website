<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('pageTitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="/front/mycss.css">
    <link rel="stylesheet" href="/front/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/assets/css/ticker-style.css">
    <link rel="stylesheet" href="/front/assets/css/flaticon.css">
    <link rel="stylesheet" href="/front/assets/css/slicknav.css">
    <link rel="stylesheet" href="/front/assets/css/animate.min.css">
    <link rel="stylesheet" href="/front/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/front/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/front/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/front/assets/css/slick.css">
    <link rel="stylesheet" href="/front/assets/css/nice-select.css">
    <link rel="stylesheet" href="/front/assets/css/style.css">
    <link rel="stylesheet" href="/front/mycss.css">


    @stack('css')
</head>

<body>

    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/front/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    @include('front.layouts.inc.header')

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                {{-- <strong>Trending now</strong> --}}
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="col ms-auto d-print-none mb-0">
                                    <form action="{{ route('search_posts') }}">
                                        <input class="form-control"  id="search-query" name="query" value="{{ Request('query') }}" type="search" placeholder="Masukkan Keywords">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                            @yield('one-page')
                        <div class="col-lg-8 mt-4">
                            @yield('latest-post')
                            {{--
                            <hr> --}}
                            @yield('content')
                        </div>
                        <!-- Riht content -->
                            @yield('side-bar')
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->




    </main>

    @include('front.layouts.inc.footer')

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="/front/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/front/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/front/assets/js/popper.min.js"></script>
    <script src="/front/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/front/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/front/assets/js/owl.carousel.min.js"></script>
    <script src="/front/assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="/front/assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/front/assets/js/wow.min.js"></script>
    <script src="/front/assets/js/animated.headline.js"></script>
    <script src="/front/assets/js/jquery.magnific-popup.js"></script>

    <!-- Breaking New Pluging -->
    <script src="/front/assets/js/jquery.ticker.js"></script>
    <script src="/front/assets/js/site.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="/front/assets/js/jquery.scrollUp.min.js"></script>
    <script src="/front/assets/js/jquery.nice-select.min.js"></script>
    <script src="/front/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="/front/assets/js/contact.js"></script>
    <script src="/front/assets/js/jquery.form.js"></script>
    <script src="/front/assets/js/jquery.validate.min.js"></script>
    <script src="/front/assets/js/mail-script.js"></script>
    <script src="/front/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="/front/assets/js/plugins.js"></script>
    <script src="/front/assets/js/main.js"></script>



    <script>

        $(document).ready(function(){
            toastr.options= {
              'progressBar' : true,
              'positionClass' : 'toast-top-right'
            }
        });

        window.addEventListener('info', event =>{
          toastr.info(event.detail.message);
        });
        window.addEventListener('success', event =>{
          toastr.success(event.detail.message);
        });
        window.addEventListener('warning', event =>{
          toastr.warning(event.detail.message);
        });
        window.addEventListener('error', event =>{
          toastr.error(event.detail.message);
        });


         document.addEventListener('2sreload', function () {
            setTimeout(function () {
                // Reload the current page
                var currentURL = window.location.href;
                window.location.href = '/';
            }, 2000);
        });

    </script>
    @stack('js')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

        // Create the chart
        Highcharts.chart('jumlah_penduduk', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'center',
        text: 'Jumlah Penduduk'
    },
    subtitle: {
        align: 'center',
        text: 'Desa Toruakat'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}' // Display the actual numeric value
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>' // Display the actual numeric value
    },
    series: [
        {
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                @foreach(\App\Models\JenisKelamin::all() as $data)
                    {
                        name: '{{ $data->jenis_kelamin }}',
                        y: {{ $data->jumlah }},
                    },
                @endforeach
                    {
                        name: 'Total',
                        y: {{ \App\Models\JenisKelamin::selectRaw('SUM(jenis_kelamin + jumlah) as total_sum')
                                                                ->first()->total_sum }},
                    },
            ]
        }
    ]
});

// Tanggal
    function tampilkanTanggal() {
        const sekarang = new Date();
        const tanggalDiv = document.getElementById('tanggal');

        // Daftar nama hari dalam bahasa Indonesia
        const namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        
        // Daftar nama bulan dalam bahasa Indonesia
        const namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const hariIni = namaHari[sekarang.getDay()];
        const tanggalSekarang = sekarang.getDate();
        const bulanSekarang = namaBulan[sekarang.getMonth()];
        const tahunSekarang = sekarang.getFullYear();

        // Tampilkan tanggal dalam format yang diinginkan
        const tanggalFormat = `${hariIni}, ${tanggalSekarang} ${bulanSekarang} ${tahunSekarang}`;
        tanggalDiv.textContent = 'Hari ini : ' + tanggalFormat;
    }

    // Panggil fungsi tampilkanTanggal untuk menampilkan tanggal saat halaman dimuat
    tampilkanTanggal();


    // Tampilkan jam
    function tampilkanJam() {
    const sekarang = new Date();
    const jamDiv = document.getElementById('jam');

    // Tampilkan jam lokal dalam format 24 jam
    const jam = sekarang.getHours();
    const menit = sekarang.getMinutes();
    const detik = sekarang.getSeconds();
    const jamFormat = `${jam.toString().padStart(2, '0')}:${menit.toString().padStart(2, '0')}:${detik.toString().padStart(2, '0')}`;
    jamDiv.textContent = 'Jam : ' + jamFormat;

        // Schedule the next update in 1 second
        setTimeout(tampilkanJam, 1000);
    }

    // Panggil fungsi tampilkanJam untuk menampilkan jam saat halaman dimuat
    tampilkanJam();

    </script>


</body>

</html>