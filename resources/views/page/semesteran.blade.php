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
            Semester {{$result['data']->periode->smes}}<br>
            {{$result['awal']}} - {{$result['akhir']}}</h2>
        <h3 align="left">
            Kelas : {{$result['data']->data->nama_kelas}}<br>

            Tahun Ajar : {{substr($result['data']->data->thn_ajar,0,4).'/'.substr($result['data']->data->thn_ajar,4)}}<br>
            Wali Kelas : {{$result['data']->data->wali}}

        </h3>
    </div>
    <div align="right">Tanggal cetak: {{$result['hari_ini']}}</div>
    <br>

    <table class="table" style="" align="center">
        {{--<table class="table">--}}
        <tr>
            <th style="width: 10% ;padding-left: 15px;padding-right: 15px">
                Nis
            </th>
            <th style="padding-left: 15px;padding-right: 15px">
                Nama
            </th>
            <th style="padding-left: 15px;padding-right: 15px;width: 4%" align="center">
                Alpha
            </th>
            <th style="padding-left: 15px;padding-right: 15px;width: 4%" align="center">
                Izin
            </th>
            <th style="padding-left: 15px;padding-right: 15px;width: 4%" align="center">
                Sakit
            </th>
            <th style="padding-left: 15px;padding-right: 15px;width: 4%" align="center">
                Telat
            </th>
        </tr>
		<?php $i = 0?>
        @foreach($result['data']->siswa as $datasiswa)
            <tr @if($i%2 == 0) bgcolor="#d9efe5"  @endif >
                    <td style="padding-left: 15px;padding-right: 15px " align="right">
                        {{$datasiswa->nis}}
                    </td>
                    <td style="padding-left: 15px ;padding-right: 15px ">
                        {{$datasiswa->nama}}
                    </td>
                    <td style="padding-left: 15px ;padding-right: 15px " align="center">
                        {{$datasiswa->alpha}}
                    </td>
                    <td style="padding-left: 15px ;padding-right: 15px " align="center">
                        {{$datasiswa->izin}}
                    </td>
                    <td style="padding-left: 15px ;padding-right: 15px " align="center">
                        {{$datasiswa->sakit}}
                    </td>
                    <td style="padding-left: 15px ;padding-right: 15px " align="center">
                        {{$datasiswa->telat}}
                    </td>


                </tr>
		    <?php $i++?>
            @endforeach
    </table>
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