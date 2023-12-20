<?php
$hostname       = "localhost";
$user           = "root";
$pwd            = "";
$db             = "kerjasama";
$koneksi = mysqli_connect($hostname, $user, $pwd, $db);

if (!$koneksi) {
    die("Belum terkoneksi");
} else {
    // echo "Koneksi berhasil";
}
