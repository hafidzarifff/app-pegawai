<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    // Ambil data dari form
    $id                     = $_POST['id'];
    $nip                    = $_POST['nip'];
    $nama_pegawai           = $_POST['nama_pegawai'];
    $departemen_id          = $_POST['departemen_id'];
    $tipe_kontrak           = $_POST['tipe_kontrak'];
    $tanggal_kontrak_awal   = $_POST['tanggal_kontrak_awal'];
    $tanggal_kontrak_akhir  = $_POST['tanggal_kontrak_akhir'];
    $email                  = $_POST['email'];
    $no_hp                  = $_POST['no_hp'];
    $alamat                 = $_POST['alamat'];

    // Validasi data wajib isi (contoh: NIP dan Nama Pegawai)
    if (empty($nip) || empty($nama_pegawai)) {
        echo "
            <script>
                alert('NIP dan Nama Pegawai wajib diisi!');
                window.history.back();
            </script>
        ";
        exit;
    }

    // Penanganan null untuk tanggal_kontrak_akhir
    $tanggal_kontrak_akhir_db = !empty($tanggal_kontrak_akhir) ? "'$tanggal_kontrak_akhir'" : "NULL";

    // Buat query update
    $query = "
        UPDATE tbl_pegawai SET
            nip = '$nip',
            nama_pegawai = '$nama_pegawai',
            departemen_id = '$departemen_id',
            tipe_kontrak = '$tipe_kontrak',
            tanggal_kontrak_awal = '$tanggal_kontrak_awal',
            tanggal_kontrak_akhir = $tanggal_kontrak_akhir_db,
            email = '$email',
            no_hp = '$no_hp',
            alamat = '$alamat'
        WHERE id = '$id'
    ";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "
            <script>
                alert('Data pegawai berhasil diperbarui.');
                window.location.href = 'index.php?page=pegawai/data_pegawai';
            </script>
        ";
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
        exit;
    }
}
?>
