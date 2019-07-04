@extends('templates.base', ['titlePage' => __('Pilih Tanggal dan Kelas'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">

        <div class="container-fluid">

            <div class="col-lg-12  ">

                @if($result['isikelas']=='1')
                <form method='post'>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sel1">Pilih Tahun</label>

                        <select class="form-control" name="tahun">
                            <?php $thn = $result['tahun'];
                            for ($thn ; $thn >= 2014; $thn--){?>
                            <?php $aa = $thn+1;?>
                            <option value="{{$thn}}">{{$thn.'/'.$aa}}</option>

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
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Nama Kelas
                            </th>
                            <th>
                                perintah
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
                                    <a style="background: #fff;" target="_blank"  href="/lihat/perbulan/{{$datakela->id}}/{{$result['tanggalnya']}}">lihat</a><br>
                                    <a style="background: #fff;" target="_blank"  href="/lihat/perbulan/print/{{$datakela->id}}/{{$result['tanggalnya']}}">print</a>
                                </td>
                                <td>

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