<?php
    include 'koneksi.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama_departemen = $_POST['nama_departemen'];

        if(empty($nama_departemen)) {
            echo "
                <script type='text/javascript'>
                    alert('Semua field harus diisi');
                    window.history.back();
                </script>
            ";
            exit;
        }else{
            $queryUpdate = "UPDATE tbl_departemen SET nama_departemen = '$nama_departemen' WHERE id = '$id'";

            $edit = mysqli_query($koneksi, $queryUpdate);
            if($edit) {
                echo "
                    <script>
                        window.location.href = 'index.php?page=departemen/data_departemen';
                    </script>
                ";
                exit;
            } else {
                echo "
                    <script type='text/javascript'>
                        alert('Gagal merubah data departemen');
                    </script>
                ";
            }
        }
    }
?>