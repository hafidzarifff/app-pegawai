<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])) {
        $nama_departemen = $_POST['nama_departemen'];

        if(empty($nama_departemen)) {
            echo "
                <script type='text/javascript'>
                    alert('Semua field harus diisi');
                </script>
            ";
            exit;
        }else{
            $queryInsert = "INSERT INTO tbl_departemen (nama_departemen) 
            VALUES ('$nama_departemen')";

            $submit = mysqli_query($koneksi, $queryInsert);
            if($submit) {
                echo "
                    <script>
                        window.location.href = 'index.php?page=departemen/data_departemen';
                    </script>
                ";
                exit;

            } else {
                echo "
                    <script type='text/javascript'>
                        alert('Gagal menyimpan data departemen');
                    </script>
                ";
            }
        }
    }
?>