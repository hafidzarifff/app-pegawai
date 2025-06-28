<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_univ");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}else {
    // echo "Koneksi berhasil";
}   
?>