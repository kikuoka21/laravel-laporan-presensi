@extends('templates.base', ['titlePage' => __('Home'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">
        <div class="container-fluid">

            <div class="col-lg-12 text-center">
                <br><br>


{{--                @php(print_r(json_encode($result['data'])))--}}
            </div>

            <div class="col-lg-12">

                @if(sizeof($result['listkelas'])>0)
                    <div id="dataabsen">

                    </div>


                    <p style="text-align:right;">*hanya siswa yang berstatus Alpha</p>
                    <br><br>
                    <h3 style="text-align:center;">Total presensi saat ini</h3><br>
                    <div style="text-align:center;padding-left: 200px;padding-right: 200px;" class="col-lg-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr >
                                <th style="text-align:center;"scope="col">Hadir</th>
                                <th style="text-align:center;"scope="col">Alpha</th>
                                <th style="text-align:center;"scope="col">Izin</th>
                                <th style="text-align:center;"scope="col">Sakit</th>
                                <th style="text-align:center;"scope="col">Telat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="text-align:center;">
                                <td>{{$result['data']->hadir}} siswa</td>
                                <td>{{$result['data']->alpha}} siswa</td>
                                <td>{{$result['data']->izin}} siswa</td>
                                <td>{{$result['data']->sakit}} siswa</td>
                                <td>{{$result['data']->telat}} siswa</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                @endif

            </div>
        </div>
    </div>

@stop

@section('home')

    @if(sizeof($result['listkelas'])>0)
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
            Highcharts.chart('dataabsen', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Data presensi setiap kelas'
                },
                tooltip: {
                    pointFormat: '<p style="size:12px;"><b>{point.percentage:.1f} %</b></p>'
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
                            enabled: true,
                            format: '<p style="size:20px;"><b>kelas {point.name}</b>: {point.y} siswa</p>'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    data:{!! json_encode($result['listkelas']) !!},
                    colorByPoint: true,
                }]
            });
        </script>

    @endif

@endsection
