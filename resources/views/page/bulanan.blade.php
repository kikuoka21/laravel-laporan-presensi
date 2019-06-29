@extends('templates.base', ['titlePage' => __('Pilih Tanggal dan Kelas'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">

        <div class="container-fluid">

            <div class="col-lg-12  ">

                @if($result['isi']=='0')
                    <br>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                nama kelas
                            </th>
                            <th>
                                cari
                            </th>
                        </tr>
                        </thead>

                      
                    </table>
                @endif

            </div>
        </div>
    </div>

@endsection
