<?php
    include('koneksi.php');

    $id = $_GET['id'];

    // Cek apakah masih ada pegawai di departemen ini
    $cekPegawai = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM tbl_pegawai WHERE departemen_id = '$id'");
    $dataPegawai = mysqli_fetch_assoc($cekPegawai);

    if ($dataPegawai['jumlah'] > 0) {
        echo "
            <script type='text/javascript'>
                alert('Gagal menghapus: Masih ada pegawai dalam departemen ini!');
                window.location.href = 'index.php?page=departemen/data_departemen';
            </script>
        ";
        exit;
    }

    // Lanjutkan hapus jika tidak ada pegawai
    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_departemen WHERE id='$id'");

    if($queryDelete){
        echo "
            <script>
                alert('Berhasil menghapus data departemen.');
                window.location.href = 'index.php?page=departemen/data_departemen';
            </script>
        ";
        exit;
    } else {
        echo "
            <script type='text/javascript'>
                alert('Gagal menghapus data departemen.');
                window.location.href = 'index.php?page=departemen/data_departemen';
            </script>
        ";
        exit;
    }
?>
