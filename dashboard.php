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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Santri - <?= htmlspecialchars($s['nama_lengkap']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #198754, #126c42);
            padding: 15px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            background: #fff;
        }
        .card-header-custom {
            background-color: transparent;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 25px;
        }
        .card-header-custom h5 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
        }
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e0e4e8;
            font-size: 0.95rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.15);
            border-color: #198754;
        }
        .btn-update {
            background: #ffc107;
            border: none;
            color: #000;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .btn-update:hover {
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(224, 168, 0, 0.3);
        }
        .status-card {
            background: linear-gradient(135deg, #ffffff, #f4f9f4);
            border: 2px dashed #198754;
            text-align: center;
        }
        .status-title {
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .status-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #198754;
            margin-bottom: 20px;
        }
        .btn-print {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-print:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
            background: linear-gradient(135deg, #0b5ed7, #094eb3);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom mb-5">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-person-workspace me-2"></i>Dashboard: <?= htmlspecialchars($s['nama_lengkap']) ?></span>
        <a href="logout.php" class="btn btn-danger btn-sm px-3 rounded-pill fw-bold shadow-sm"><i class="bi bi-box-arrow-right me-1"></i>Keluar</a>
    </div>
</nav>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-lg-8 order-2 order-lg-1">
            <div class="card card-custom">
                <div class="card-header-custom">
                    <h5><i class="bi bi-pencil-square text-success me-2"></i>Lengkapi / Ubah Data Biodata</h5>
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
                            <div class="col-md-6">
                                <label class="form-label">No Telp / WA</label>
                                <input type="text" name="no_telp" value="<?= htmlspecialchars($s['no_telp']) ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Alamat Lengkap</label>
                                <input type="text" name="alamat_jalan" value="<?= htmlspecialchars($s['alamat_jalan']) ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="nama_ayah" value="<?= htmlspecialchars($s['nama_ayah']) ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" name="nama_ibu" value="<?= htmlspecialchars($s['nama_ibu']) ?>" class="form-control">
                            </div>
                            
                            <div class="col-12 mt-4">
                                <h6 class="text-success fw-bold border-bottom pb-2"><i class="bi bi-cash-coin me-2"></i>Rincian Biaya (Bisa Diisi/Disesuaikan)</h6>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rencana Infaq</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light">Rp</span>
                                    <input type="number" name="biaya_infaq" value="<?= htmlspecialchars($s['biaya_infaq']) ?>" class="form-control border-start-0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rencana Uang Makan</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light">Rp</span>
                                    <input type="number" name="biaya_makan" value="<?= htmlspecialchars($s['biaya_makan']) ?>" class="form-control border-start-0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Biaya Pendaftaran</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light">Rp</span>
                                    <input type="number" name="biaya_pendaftaran" value="<?= htmlspecialchars($s['biaya_pendaftaran']) ?>" class="form-control border-start-0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Titip Jajan</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light">Rp</span>
                                    <input type="number" name="biaya_jajan" value="<?= htmlspecialchars($s['biaya_jajan']) ?>" class="form-control border-start-0">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-2">
                            <button name="update" class="btn btn-update w-100"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Simpan Perubahan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Column -->
        <div class="col-lg-4 order-1 order-lg-2">
            <div class="card card-custom status-card p-4">
                <div class="status-title">Status Pendaftaran</div>
                <div class="status-number"><?= htmlspecialchars($s['no_pendaftaran']) ?></div>
                <hr class="w-50 mx-auto mt-0 mb-4 opacity-25">
                <div class="mb-4 text-muted small">
                    <i class="bi bi-info-circle-fill text-primary me-1"></i> Silakan cetak formulir resmi ini untuk dibawa sebagai bukti saat pendaftaran ulang ke pesantren.
                </div>
                <a href="cetak.php?id=<?= $id ?>" target="_blank" class="btn btn-primary btn-print text-white w-100">
                    <i class="bi bi-printer-fill me-2"></i>CETAK FORMULIR A4
                </a>
            </div>
            
            <div class="card card-custom p-3 text-center border-0 bg-white">
                <img src="https://cdn-icons-png.flaticon.com/512/1903/1903162.png" alt="Pesantren" width="60" class="mx-auto mb-2 opacity-50">
                <p class="small text-muted mb-0">Pastikan semua data terisi dengan benar sesuai dengan dokumen asli (KK/Ijazah).</p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
