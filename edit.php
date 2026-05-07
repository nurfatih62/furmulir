<?php 
include 'config.php';
$id = $_GET['id'];
$s = api_request("GET", $url . "?id=eq." . $id)[0];

if(isset($_POST['update'])){
    unset($_POST['update']);
    api_request("PATCH", $url . "?id=eq." . $id, $_POST);
    header("Location: data.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container card p-4" style="max-width: 600px;">
        <h5>Update Data & Biaya (Poin 11)</h5>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?= $s['nama_lengkap'] ?>" class="form-control mb-2">
            
            <label>Nama Panggilan</label>
            <input type="text" name="nama_panggilan" value="<?= $s['nama_panggilan'] ?>" class="form-control mb-2">
            
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="<?= $s['tempat_lahir'] ?>" class="form-control mb-2">
            
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="<?= $s['tanggal_lahir'] ?>" class="form-control mb-2">
            
            <hr>
            <h6>Poin 11. Rincian Biaya</h6>
            <label>Pendaftaran</label>
            <input type="number" name="biaya_pendaftaran" value="<?= $s['biaya_pendaftaran'] ?>" class="form-control mb-2">
            <label>Infaq Bulanan</label>
            <input type="number" name="biaya_infaq" value="<?= $s['biaya_infaq'] ?>" class="form-control mb-2">
            <label>Uang Makan</label>
            <input type="number" name="biaya_makan" value="<?= $s['biaya_makan'] ?>" class="form-control mb-2">
            <label>Titip Jajan</label>
            <input type="number" name="biaya_jajan" value="<?= $s['biaya_jajan'] ?>" class="form-control mb-2">
            
            <button name="update" class="btn btn-primary mt-3 w-100">SIMPAN PERUBAHAN</button>
            <a href="data.php" class="btn btn-light w-100 mt-2">Kembali</a>
        </form>
    </div>
</body>
</html>
