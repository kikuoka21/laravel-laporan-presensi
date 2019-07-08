<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    @if (Session::has('notif'))
        <div class="row" style="padding-top: 10px">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification</strong> {{session()->get('notif')}}
            </div>
        </div>
    @endif
    <div align="center">
        <div style="width: 50%" align="left">
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

