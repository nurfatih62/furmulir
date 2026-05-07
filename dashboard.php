<?php 
include 'config.php'; 
if(!isset($_SESSION['user'])) header("Location: login.php");
$id = $_SESSION['user']['id'];
// Refresh data terbaru
$s = api_request("GET", $url . "?id=eq." . $id)[0];

if(isset($_POST['update'])){
    unset($_POST['update']);
    api_request("PATCH", $url . "?id=eq." . $id, $_POST);
    echo "<script>alert('Data Berhasil Diperbarui!'); window.location='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-success mb-4">
    <div class="container">
        <span class="navbar-brand">Dashboard: <?= $s['nama_lengkap'] ?></span>
        <a href="logout.php" class="btn btn-danger btn-sm">Keluar</a>
    </div>
</nav>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card p-4">
                <h5>Lengkapi / Ubah Data Biodata</h5>
                <hr>
                <form method="POST">
                    <div class="row g-2">
                        <div class="col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" value="<?= $s['nama_lengkap'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Nama Panggilan</label><input type="text" name="nama_panggilan" value="<?= $s['nama_panggilan'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" value="<?= $s['tempat_lahir'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="<?= $s['tanggal_lahir'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>No Telp</label><input type="text" name="no_telp" value="<?= $s['no_telp'] ?>" class="form-control"></div>
                        <div class="col-md-12"><label>Alamat</label><input type="text" name="alamat_jalan" value="<?= $s['alamat_jalan'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Nama Ayah</label><input type="text" name="nama_ayah" value="<?= $s['nama_ayah'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu" value="<?= $s['nama_ibu'] ?>" class="form-control"></div>
                        
                        <h6 class="mt-4">Poin 11. Rincian Biaya (Anda bisa mengisi ini)</h6>
                        <div class="col-md-6"><label>Rencana Infaq</label><input type="number" name="biaya_infaq" value="<?= $s['biaya_infaq'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Rencana Uang Makan</label><input type="number" name="biaya_makan" value="<?= $s['biaya_makan'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Biaya Pendaftaran</label><input type="number" name="biaya_pendaftaran" value="<?= $s['biaya_pendaftaran'] ?>" class="form-control"></div>
                        <div class="col-md-6"><label>Titip Jajan</label><input type="number" name="biaya_jajan" value="<?= $s['biaya_jajan'] ?>" class="form-control"></div>
                    </div>
                    <button name="update" class="btn btn-warning mt-3">Update Data Terkini</button>
                </form>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card p-4 bg-white shadow">
                <h6>Status Pendaftaran</h6>
                <h4 class="text-success"><?= $s['no_pendaftaran'] ?></h4>
                <hr>
                <p>Silakan cetak formulir resmi untuk dibawa saat pendaftaran ulang.</p>
                <a href="cetak.php?id=<?= $id ?>" target="_blank" class="btn btn-primary btn-lg w-100">CETAK FORMULIR A4</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
