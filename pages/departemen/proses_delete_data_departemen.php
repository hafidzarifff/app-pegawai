<?php
    include('koneksi.php');
    
    $id = $_GET['id'];

    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_departemen WHERE id='$id'");

    if($queryDelete){
        echo "
            <script>
                window.location.href = 'index.php?page=departemen/data_departemen';
            </script>
        ";
        exit;
    }else{
        echo "
            <script type='text/javascript'>
                alert('Gagal menghapus data mahasiswa');
            </script>
        ";
    }
?>