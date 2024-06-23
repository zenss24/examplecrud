<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Kalibrasi Alat" />
    <meta name="keywords" content="Management Kalibrasi Maintenance Tools" />
    <meta name="author" content="Final Project" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Register Akun</title>
    <link href="css/login.css" rel="stylesheet" />
    <script src="js/login.js"></script>
</head>

<body id="particles-js"></body>
<div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form action="process_register.php" method="POST" name="login" class="box" onsubmit="return checkStuff()">
            <h4>Laboratorium Kalibrasi <span>Metaform</span></h4>
            <h5>Silahkan Isi form dibawah ini untuk registrasi</h5>
            <div class="form-floating-mb3">
                <input class="form-control" type="text" name="nama" id="inputNama"
                    placeholder="Masukkan Nama Lengkap" />
            </div>
            <div class="form-floating-mb3">
                <input class="form-control" type="text" name="email" id="inputEmail" placeholder="Masukkan Email" />
            </div>
            <div class="form-floating-mb3">
                <input class="form-control" name="password" id="inputPassword" type="password"
                    placeholder="Masukkan Password" />
            </div>
            <input type="submit" name="submit" value="Register" class="btn1">
        </form>
        <a href="login.php" class="dnthave">Sudah mempunyai akun? Login</a>
    </div>
</div>

</html>