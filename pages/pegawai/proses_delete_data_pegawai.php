<?php
    include('koneksi.php');
    
    $id = $_GET['id'];

    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_pegawai WHERE id='$id'");

    if($queryDelete){
        echo "
            <script>
                window.location.href = 'index.php?page=pegawai/data_pegawai';
            </script>
        ";
        exit;
    }else{
        echo "
            <script type='text/javascript'>
                alert('Gagal menghapus data pegawai');
            </script>
        ";
    }
?>