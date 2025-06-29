<?php
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        $nip = $_POST['nip'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $departemen_id = $_POST['departemen_id'];
        $tipe_kontrak = $_POST['tipe_kontrak'];
        $tanggal_kontrak_awal = $_POST['tanggal_kontrak_awal'];
        $tanggal_kontrak_akhir = !empty($_POST['tanggal_kontrak_akhir']) ? "'".$_POST['tanggal_kontrak_akhir']."'" : "NULL";
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        // Validasi sederhana
        if (
            empty($nip) || empty($nama_pegawai) || empty($departemen_id) ||
            empty($tipe_kontrak) || empty($tanggal_kontrak_awal) ||
            empty($email) || empty($no_hp) || empty($alamat)
        ) {
            echo "<script>alert('Semua field wajib diisi!'); history.back();</script>";
            exit;
        }

        $queryInsert = "INSERT INTO tbl_pegawai 
            (nip, nama_pegawai, departemen_id, tipe_kontrak, tanggal_kontrak_awal, tanggal_kontrak_akhir, email, no_hp, alamat) 
            VALUES 
            ('$nip', '$nama_pegawai', '$departemen_id', '$tipe_kontrak', '$tanggal_kontrak_awal', $tanggal_kontrak_akhir, '$email', '$no_hp', '$alamat')";

        $submit = mysqli_query($koneksi, $queryInsert);
        if($submit) {
            echo "<script>window.location.href = 'index.php?page=pegawai/data_pegawai';</script>";
            exit;
        } else {
            die("Query Error: " . mysqli_error($koneksi));
        }
    }
?>
