@extends('templates.base', ['titlePage' => __('Pilih Tanggal dan Kelas'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">

        <div class="container-fluid">

            <div class="col-lg-12  ">
                <form method='post'>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sel1">Pilih Tahun</label>

                        <select class="form-control" name="tahun">
                            <?php $thn = $result['tahun'];
                            for ($thn ; $thn >= 2014; $thn--){?>
                            <option value="{{$thn}}">{{$thn}}</option>

                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Pilih Bulan:</label>

                        <select class="form-control" name="bulan">
                            <?php $a = 1; ?>
                            @foreach($result['bulan'] as $bulannya)
                                <option value="{{$a}}">{{$bulannya}}</option>

                                <?php $a++; ?>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-default">Cari</button>
                    </div>


                </form>
                @if($result['isikelas']=='0')
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

                        <tbody>
                        @foreach($result['datakelas'] as $datakela)
                            <tr>
                                <td>
                                     {{$datakela->nama_kelas}}
                                </td>
                                <td>
                                    <a style="background: #fff;"  href="/lihat/perbulan/{{$datakela->id}}/{{$result['tanggalnya']}}">lihat</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>

@endsection
