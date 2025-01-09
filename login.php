<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <link rel="icon" href="/siatur/storage/nsp.jpg">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline shadow-lg">
            <div class="card-header text-center">
                <a href="./index2.html" class="h1">Net Sun Power</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login Terlebih Dahulu!</p>

                <form action="./index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Nomor Induk Pegawai">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="row mt-2 mb-3">
                        <a href="index.php" class="btn btn-block btn-primary">
                            <i class="fab mr-2"></i> LOGIN
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./dist/js/adminlte.min.js"></script>
</body>

</html>