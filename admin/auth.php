<?php
// include_once "../bin/koneksi.php";
session_start();

$username       = "";
$password       = "";
$me             = "";
$error          = "";
$success        = "";

$hostname           = "localhost";
$user               = "root";
$pwd                = "";
$db                 = "kerjasama";


$koneksi = mysqli_connect($hostname, $user, $pwd, $db);
if (!$koneksi) {
    die("Belum terkoneksi");
} else {
    // echo "Koneksi berhasil";
}

if (isset($_COOKIE['cookie_username'])) {
    $cookie_username        = $_COOKIE['cookie_username'];
    $cookie_password        = $_COOKIE['cookie_password'];

    $sql            = "SELECT * FROM tb_user WHERE username = '$username'";
    $query          = mysqli_query($koneksi, $sql);
    $result         = mysqli_fetch_array($query);
    if ($result['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if (isset($_SESSION['session_username'])) {
    header("location: index");
    exit();
}

if (isset($_POST['login'])) {
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error      = "Silahkan masukkan username dan password";
    } else {
        $sql            = "SELECT * FROM tb_user WHERE username = '$username'";
        $query          = mysqli_query($koneksi, $sql);
        $result         = mysqli_fetch_array($query);

        if (empty($result['username'])) {
            $error      = "Username '$username' tidak terdaftar";
        } elseif ($result['password'] != md5($password)) {
            $error      = "Password yang dimasukkan tidak sesuai";
        } else {
            $success    = "Login berhasil, anda akan diarahkan ke halaman admin";
        }

        if (empty($error)) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if ($me == 1) {
                $cookie_name    = "cookie_username";
                $cookie_value   = $username;
                $cookie_time    = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time);

                $cookie_name    = "cookie_password";
                $cookie_value   = md5($password);
                $cookie_time    = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time);
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Admin - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="../assets//img//poltesa-logo.png" class="img-fluid" style="width: 120px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">POLTESA</p>
                <p class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Website Kerjasama Politeknik Negeri Sambas</p>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Selamat Datang, Admin</h2>
                        <p>Silahkan isi data admin yang sesuai</p>
                        <?php
                        if ($success) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $success ?>
                            </div>
                        <?php
                            header("refresh:2; url=auth");
                        } elseif ($error) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error ?>
                            </div>
                        <?php
                            header("refresh:2; url=auth");
                        }
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control bg-light" name="username" id="username" placeholder="Masukkan username">
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control bg-light" name="password" id="password" placeholder="Masukkan password">
                        </div>
                        <div class="mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Ingat saya</small></label>
                            </div>
                            <!-- <div class="forgot">
                                <small><a href="#">Lupa Password?</a></small>
                            </div> -->
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" value="Login" name="login" class="btn btn-lg btn-primary fs-6 col-lg-12 col-12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>