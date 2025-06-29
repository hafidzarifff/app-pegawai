<?php
    include 'koneksi.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "ID pegawai tidak ditemukan.";
        exit;
    }

    // Fetch data pegawai berdasarkan ID Pegawai
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "Data pegawai tidak ditemukan.";
        exit;
    }

    // Fetch data departemen
    $hasil_departemen = mysqli_query($koneksi, "SELECT * FROM tbl_departemen ORDER BY nama_departemen ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Data Pegawai</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

<div class="container-fluid mt-4">
    <h1 class="h3 mb-3 text-gray-800">Edit Data Pegawai</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="form-row" method="POST" action="index.php?page=pegawai/proses_edit_data_pegawai">
                <!-- Hidden ID -->
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="mb-4 col-12">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $row['nip'] ?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $row['nama_pegawai'] ?>">
                </div>

                <div class="col-md-6">
                    <label for="departemen_id">Departemen</label>
                    <select class="form-control" id="departemen_id" name="departemen_id">
                        <?php while ($dept = mysqli_fetch_assoc($hasil_departemen)) : ?>
                            <option value="<?= $dept['id'] ?>" <?= ($dept['id'] == $row['departemen_id']) ? 'selected' : '' ?>>
                                <?= $dept['nama_departemen'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-4 col-md-4">
                    <label for="tipe_kontrak">Tipe Kontrak</label>
                    <select class="form-control" id="tipe_kontrak" name="tipe_kontrak">
                        <option value="Tetap" <?= ($row['tipe_kontrak'] == 'Tetap') ? 'selected' : '' ?>>Tetap</option>
                        <option value="Kontrak" <?= ($row['tipe_kontrak'] == 'Kontrak') ? 'selected' : '' ?>>Kontrak</option>
                    </select>
                </div>

                <div class="mb-4 col-md-4">
                    <label for="tanggal_kontrak_awal">Tanggal Kontrak Awal</label>
                    <input type="date" class="form-control" name="tanggal_kontrak_awal" id="tanggal_kontrak_awal"
                           value="<?= $row['tanggal_kontrak_awal'] ?>">
                </div>

                <div class="mb-4 col-md-4">
                    <label for="tanggal_kontrak_akhir">Tanggal Kontrak Akhir</label>
                    <?php
                    $tgl_akhir = ($row['tanggal_kontrak_akhir'] == '0000-00-00' || !$row['tanggal_kontrak_akhir']) ? '' : $row['tanggal_kontrak_akhir'];
                    ?>
                    <input type="date" class="form-control" name="tanggal_kontrak_akhir" id="tanggal_kontrak_akhir"
                           value="<?= $tgl_akhir ?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $row['email'] ?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="no_hp">No. Handphone</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $row['no_hp'] ?>">
                </div>

                <div class="mb-4 col-12">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="4"><?= $row['alamat'] ?></textarea>
                </div>

                <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="edit" value="Simpan Perubahan">
                    <a class="btn btn-danger ml-2" href="index.php?page=pegawai/data_pegawai">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>
