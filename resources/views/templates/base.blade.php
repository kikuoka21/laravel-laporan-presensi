@include('templates.part._head')
<body>

@if (Session::has('notif'))
    <div class="row" style="padding-top: 10px">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Informasi</strong> {{session()->get('notif')}}
        </div>
    </div>
@endif
<div id="hidden">
    <div id="progress-bar"></div>
    <div id="loading"></div>
</div>
<div id="wrapper">
    <div class="row">
        <div class="col-md-12 hidden-print"
             style="background-color: #fdfeff;background-size: 500px auto;background-repeat: no-repeat;">
            <a href="">
                <div class="hidden-xs col-sm-2 col-md-2">
                    <img src="{{asset('assets/img/logo_baru.jpg')}}" class="img-responsive img-header">
                </div>
            </a>
            <div class="col-md-6 col-md-push-4 ">
                <p class="text-right " style=";color: white; font-family: 'Literata', serif; font-weight: bold;">
                    <a href="{{url('/#')}}" style="text-align:right;font-size:xx-large; color: #6ab04c; text-decoration: none;"><em>SMK MULTI MEDIA MANDIRI</em></a></p>
                <!--<p class="text-right header-budiluhur-2" style="margin-top: -10px;  color: white; font-family: tahoma;"><em>Budi Luhur<br><small>Cerdas Berbudi Luhur</small></em></p>-->
            </div>
        </div>
    </div>
    @include('templates.part._sidemenu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <style type="text/css">
                    .head {
                        background: #03965e;
                        color: #fff;
                        padding-left: 5px;
                        padding-right: 5px;
                        text-align: center;

                    }
                </style>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  head">
                            <h1>{{ $titlePage }}</h1>
                        </div>
                        <div style="padding-top: 20px;">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
