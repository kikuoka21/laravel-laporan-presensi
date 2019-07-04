<body>
@if (Session::has('notif'))
    <div align="center">
        <h2>{{session()->get('notif')}}</h2>
    </div>
@endif
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }</style>
@if($result['isi']=='0')

    <div class="col-lg-12 ">
        <h2 align="center" >Daftar Presensi Siswa<br>
        Daftar Presensi Siswa</h2>
    </div>
    <table class="table" style="width:100%" align="center">
        <tr>
            <th rowspan="2">
                Nis
            </th>
            <th rowspan="2">
                Nama
            </th>
            <th colspan="{{count($result['data']->presensi[0]->kehadiran)}}">
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
                <td style="padding-left: 15px">
                    {{$datasiswa->nis}}
                </td>
                <td style="padding-left: 15px">
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


                @endforeach
            </tr>

    </table>
    <br>
    <div align="right" style="padding-right: 50px">
        @for($aa=0;$aa<count($result['data']->presensi[0]->kehadiran); $aa++ )

            @if( $result['data']->presensi[0]->kehadiran[$aa]->stat=='L')
                {{$result['data']->presensi[0]->kehadiran[$aa]->ket}}
                : {{$result['data']->presensi[0]->kehadiran[$aa]->tanggal}}    <br>
            @endif
        @endfor
    </div>
@endif


</body>