@extends('templates.base', ['titlePage' => __('Pilih Tahun Ajar dan Kelas'), 'nama'=> __($result['nama']),
'tanggal'=> __($result['hari_ini'])])

@section('content')
    <div class="analytics-sparkle-area">

        <div class="container-fluid">

            <div class="col-lg-12  ">

                @if($result['flag']=='1')
                    <form method='post'>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="sel1">Pilih Tahun ajar</label>

                            <select class="form-control" name="tahun_ajar">
								<?php $thn = $result['tahun'];
								for ($thn ; $thn >= 2014; $thn--){?>
								<?php $aa = $thn + 1;?>
                                <option value="{{$thn}}">{{$thn.'/'.$aa}}</option>

								<?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">pilih Semester</label>

                            <select class="form-control" name="semester">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>

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
                        @foreach($result['datakelas']->data as $datakela)
                            <tr>
                                <td>
                                    {{$datakela->nama_kelas}}
                                </td>
                                <td>
                                    <a style="background: #fff;" target="_blank"
                                       href="/lihat/persemester/{{$datakela->id}}/{{$result['smes']}}">Lihat {{$result['smes']}}</a><br>
                                    <a style="background: #fff;" target="_blank"
                                       href="/print/persemester/{{$datakela->id}}/{{$result['smes']}}">Unduh</a>
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
