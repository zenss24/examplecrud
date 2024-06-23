<?php
class SessionManager
{
    public function __construct()
    {
        session_start();
    }

    public function checkLogin()
    {
        if (isset($_SESSION['login'])) {
            header('Location: staff/home.php');
            exit;
        }
    }

    public function destroySession()
    {
        session_destroy();
    }
}

// Gunakan objek dari kelas SessionManager
$sessionManager = new SessionManager();

// Periksa login
$sessionManager->checkLogin();

// Hancurkan sesi
$sessionManager->destroySession();
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/icon.png">
    <title>INVENTORI PT.JASA MANDIRI TECHGRAHA</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            background: url('images/background.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div>
        <navbar class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <a class="navbar-brand ml-4 mt-1" href="#">Selamat Datang di Laboratorium</a>
            <button class="navbar-toggler mr-4 mt-3" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-lg-3 mr-5 position-relative text-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">&nbsp;Beranda</a>
                </ul>
            </div>
        </navbar>
    </div>
    <div class="container" style="max-height:cover; padding-top:50px; padding-bottom:120px" align="center">
        <img src="images/metaform.png" style="max-width: 70%; height: auto;">
        <hr>
        <a class="text-light" style="font-size:18pt">Anda Petugas Laboratorium ? Silahkan Login terlebih
            dahulu</a><br><br>
        <a href="login.php" class="btn btn-outline-light" style="font-size:15pt;"> <strong>Login</strong></a><br><br>
        <a class="text-light" style="font-size:18pt; justify-content: center;">atau belum mempunyai akun ?</a><br><br>
        <a href="register.php" class="btn btn-outline-light" style="font-size:15pt;"> <strong>Register</strong><br>
    </div>
</body>

</html>