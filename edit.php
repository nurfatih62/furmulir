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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f9f4;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .edit-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            background: #fff;
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #198754, #126c42);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
        }
        .form-control:focus {
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.15);
            border-color: #198754;
        }
        .btn-update {
            background: #198754;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-update:hover {
            background: #126c42;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
            color: white;
        }
        .btn-back {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="edit-card">
        <div class="card-header-custom">
            <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Update Data & Biaya</h5>
        </div>
        <div class="card-body p-4">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($s['nama_lengkap']) ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Panggilan</label>
                        <input type="text" name="nama_panggilan" value="<?= htmlspecialchars($s['nama_panggilan']) ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($s['tempat_lahir']) ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($s['tanggal_lahir']) ?>" class="form-control">
                    </div>
                </div>
                
                <hr class="my-4 text-muted">
                <h6 class="text-success fw-bold mb-3"><i class="bi bi-wallet2 me-2"></i>Rincian Biaya (Poin 11)</h6>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Pendaftaran</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" name="biaya_pendaftaran" value="<?= htmlspecialchars($s['biaya_pendaftaran']) ?>" class="form-control border-start-0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Infaq Bulanan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" name="biaya_infaq" value="<?= htmlspecialchars($s['biaya_infaq']) ?>" class="form-control border-start-0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Uang Makan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" name="biaya_makan" value="<?= htmlspecialchars($s['biaya_makan']) ?>" class="form-control border-start-0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Titip Jajan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" name="biaya_jajan" value="<?= htmlspecialchars($s['biaya_jajan']) ?>" class="form-control border-start-0">
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-2 d-flex flex-column gap-2">
                    <button name="update" class="btn btn-update w-100"><i class="bi bi-save me-2"></i>SIMPAN PERUBAHAN</button>
                    <a href="data.php" class="btn btn-light border btn-back w-100"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
