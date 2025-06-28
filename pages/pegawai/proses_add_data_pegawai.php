<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama_pegawai'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tanggal_awal = $_POST['tanggal_kontrak_awal'];
    $tanggal_akhir = $_POST['tanggal_kontrak_akhir'];
    $departemen = $_POST['departemen_id'];
    $status = $_POST['status'];

    // Validasi sederhana
    if (empty($nip) || empty($nama) || empty($email) || empty($no_hp) || empty($alamat) || empty($tanggal_awal) || empty($tanggal_akhir) || empty($departemen) || empty($status)) {
        echo "<script>alert('Semua field harus diisi!'); history.back();</script>";
        exit;
    }

    $query = "INSERT INTO tbl_pegawai 
        (nip, nama_pegawai, email, no_hp, alamat, tanggal_kontrak_awal, tanggal_kontrak_akhir, departemen_id, status) 
        VALUES 
        ('$nip', '$nama', '$email', '$no_hp', '$alamat', '$tanggal_awal', '$tanggal_akhir', '$departemen', '$status')";

    $submit = mysqli_query($koneksi, $query);

    if ($submit) {
        echo "<script>window.location.href = 'index.php?page=pegawai/data_pegawai';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data'); history.back();</script>";
    }
}
?>
