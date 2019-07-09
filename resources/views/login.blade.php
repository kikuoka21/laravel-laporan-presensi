<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
</head>
<body>

<div class="col-lg-12" align="center">
    @if (Session::has('notif'))
        <div class="row" style="padding-top: 10px">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification</strong> {{session()->get('notif')}}
            </div>
        </div>
    @endif
    <div align="center" style="width: 50%;border-radius: 20px;background: #dddddd">
        <div style="width: 85%;margin: 40px; padding: 10px" align="left">
            <h2>Login Guru SMK Multi Media Mandiri</h2>
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="xuid">NIP:</label>
                    <input type="text" class="form-control" id="xuid" placeholder="Masukkan NIP" name="xuid"><br>
                    <label for="xpassword">Password:</label>
                    <input type="password" class="form-control" id="xpassword" placeholder="Masukkan Password"
                           name="xpassword">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
            <br>
        </div>
    </div>
</div>


</body>
</html>

