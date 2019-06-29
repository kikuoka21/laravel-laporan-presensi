@extends('templates.base', ['titlePage' => __('Home'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">

        <div class="container-fluid">

            <div class="col-lg-12 text-center"><br><br><br>
                    <h2 >Web ini hanya untuk mencetak laporan kehadrian</h2>
            </div>
        </div>
    </div>

@endsection
