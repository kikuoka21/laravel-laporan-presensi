<html>

<head>

</head>
<body>
@if (Session::has('notif'))
    <div align="center">
        <h2>{{session()->get('notif')}}</h2>
    </div>
@endif
<style>
    table, th, td {
        border: 1px solid #444444;
        border-collapse: collapse;
    }


</style>
@if($result['isi']=='0')

    <div class="col-lg-12 ">
        <h2 align="center">
            Daftar Presensi Siswa<br>
            SMK Multi Media Mandiri<br>
            {{$result['head_tgl']}}</h2>
        <h3 align="left">
            Kelas : {{$result['data']->data->nama_kelas}}<br>
            Tahun Ajar : {{substr($result['data']->data->thn_ajar,0,4).'/'.substr($result['data']->data->thn_ajar,4)}}<br>
            Wali Kelas : {{$result['data']->data->wali}}

        </h3>
    </div>
    <div align="right">Tanggal cetak: {{$result['hari_ini']}}</div>
    <table class="table" style="width:100%" align="center">
        {{--<table class="table">--}}
        <tr>
            <th style="width: 10% ;padding-left: 15px;padding-right: 15px" rowspan="2">
                Nis
            </th>
            <th style="padding-left: 15px;padding-right: 15px" rowspan="2">
                Nama
            </th>
            <th style="padding-left: 15px;padding-right: 15px" colspan="{{count($result['data']->presensi[0]->kehadiran)}}" align="center">
                Tanggal
            </th>
        </tr>
        <tr>


            <?php for ($i = 1; $i <= count($result['data']->presensi[0]->kehadiran); $i++) {
                echo "<th style=\"width: 2%\">" . $i . "</th>";
            }
            ?>


        </tr>

        @foreach($result['data']->presensi as $datasiswa)
            <tr>
                <td style="padding-left: 15px;padding-right: 15px " align="right">
                    {{$datasiswa->nis}}
                </td>
                <td style="padding-left: 15px ;padding-right: 15px ">
                    {{$datasiswa->nama}}
                </td>
                @for($aa=0;$aa<count($datasiswa->kehadiran); $aa++ )


                    @if( $datasiswa->kehadiran[$aa]->stat=='L')
                        <td style="background: #000000">
                        </td>
                    @elseif($datasiswa->kehadiran[$aa]->stat=='A')
                        <td style="background: #ac2925">
                        </td>
                    @elseif($datasiswa->kehadiran[$aa]->stat=='H')
                        <td>
                        </td>
                    @else
                        <td align="center">
                            {{$datasiswa->kehadiran[$aa]->stat}}
                        </td>
                    @endif
                @endfor



            </tr>
        @endforeach
    </table>
    <br>

    <div align="center">Dibuat Oleh<br><br><br><br>{{$result['nama']}}<br>NIP. {{$result['username']}}</div>


    <br>
    <div align="center">Kepala Sekolah<br><br><br><br>Selamet Riyandi, S.Kom<br>NIP. 123123</div>

    {{--<div align="right" style="padding-right: 50px">--}}
    {{--@for($aa=0;$aa<count($result['data']->presensi[0]->kehadiran); $aa++ )--}}

    {{--@if( $result['data']->presensi[0]->kehadiran[$aa]->stat=='L')--}}
    {{--{{$result['data']->presensi[0]->kehadiran[$aa]->ket}}--}}
    {{--: {{$result['data']->presensi[0]->kehadiran[$aa]->tanggal}}    <br>--}}
    {{--@endif--}}
    {{--@endfor--}}
    {{--</div>--}}
@endif


</body>
</html>