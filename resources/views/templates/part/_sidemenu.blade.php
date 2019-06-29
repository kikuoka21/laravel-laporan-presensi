<!-- Start Left menu area -->

<nav class="navbar navbar-default navbar-static-top normalizer " role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="float:right;">{{$tanggal}}</a> <a class="navbar-brand">Selamat
            datang
            {{$nama}}</a>
    </div>


    <div class="navbar-dxefault sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse" style="font-weight:bold;">
            <ul class="nav" id="side-menu">
                <li>
                <li><a href="{{url('/#')}}"><i class=" fa fa-home fa-fw"></i>Halaman Utama</a></li>
                <li><a href='{{url('/#')}}' title='30'>Laporan<i class=""></i><span
                                class='fa arrow'></span></a>
                    <ul class='nav nav-second-level'>
                        <li><a href='{{url('/lihat/perhari')}}' >pe-Hari</a></li>
                        <li><a href='{{url('/personalia/presensi')}}' >pe-Bulan</a></li>
                        <li><a href='{{url('/personalia/presensi')}}' >pe-Smester</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('/auth/logout')}}">Log Out<i class="fas fa-sign-out-alt" style="margin-left:10px;"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Left menu area -->