<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Santri Baru - Al-Fathonah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            background: #f4f9f4;
            background-image: radial-gradient(#d4fc79 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .main-card {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            border: none;
            overflow: hidden;
            background: #ffffff;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #198754, #126c42);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 5px solid #d4fc79;
        }
        .card-header-custom h3 {
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .card-header-custom p {
            font-weight: 300;
            opacity: 0.9;
            margin: 0;
            font-size: 1.1rem;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.15);
            border-color: #198754;
        }
        .section-title {
            color: #198754;
            font-weight: 700;
            border-bottom: 2px dashed #e9ecef;
            padding-bottom: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .btn-submit {
            background: linear-gradient(135deg, #198754, #126c42);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 1.1rem;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(25, 135, 84, 0.3);
            background: linear-gradient(135deg, #126c42, #0d5232);
        }
        .btn-outline-login {
            border: 2px solid #198754;
            color: #198754;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-outline-login:hover {
            background: #198754;
            color: white;
        }
        .password-section {
            background: #fff3cd;
            padding: 20px;
            border-radius: 15px;
            border-left: 5px solid #ffc107;
        }
    </style>
</head>
<body>
<div class="container" style="max-width: 900px;">
    <div class="card main-card">
        <div class="card-header-custom">
            <i class="bi bi-journal-text fs-1 mb-3 d-inline-block"></i>
            <h3>FORMULIR PENDAFTARAN SANTRI</h3>
            <p>Pondok Pesantren Al-Fathonah</p>
        </div>
        <div class="card-body p-4 p-md-5">
            <form method="POST">
                <h5 class="section-title"><i class="bi bi-person-badge"></i> Data Pribadi Santri</h5>
                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label">1. Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap sesuai ijazah" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">2. Nama Panggilan</label>
                        <input type="text" name="nama_panggilan" class="form-control" placeholder="Nama panggilan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">3. Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">4. Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota kelahiran">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">5. Anak Ke-</label>
                        <input type="number" name="anak_ke" class="form-control" placeholder="Contoh: 1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">6. Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" class="form-control" placeholder="Contoh: 3">
                    </div>
                </div>

                <h5 class="section-title"><i class="bi bi-people"></i> Data Orang Tua</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">7a. Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" placeholder="Nama lengkap ayah">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">8a. Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan ayah">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">7b. Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" placeholder="Nama lengkap ibu">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">8b. Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan ibu">
                    </div>
                </div>

                <h5 class="section-title"><i class="bi bi-geo-alt"></i> Alamat & Kontak</h5>
                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">9. Jalan/Blok</label>
                        <input type="text" name="alamat_jalan" class="form-control" placeholder="Detail alamat jalan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Desa / Kelurahan</label>
                        <input type="text" name="desa_kelurahan" class="form-control" placeholder="Nama desa">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" placeholder="Nama kecamatan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. Telp / WhatsApp</label>
                        <input type="text" name="no_telp" class="form-control" placeholder="08xx xxxx xxxx" required>
                    </div>
                </div>

                <h5 class="section-title"><i class="bi bi-building"></i> Data Sekolah Asal</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">10. Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama sekolah asal">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" name="kelas" class="form-control" placeholder="Kelas berapa">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Alamat Sekolah</label>
                        <input type="text" name="alamat_sekolah" class="form-control" placeholder="Kota sekolah">
                    </div>
                </div>
                
                <div class="password-section mt-5 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 class="text-danger fw-bold mb-1"><i class="bi bi-key-fill"></i> BUAT PASSWORD LOGIN</h6>
                            <p class="text-muted small mb-md-0">Password ini akan digunakan untuk masuk ke dashboard santri nanti.</p>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control border-warning" placeholder="Ketik password yang mudah diingat (contoh: 12345)" required>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 mt-4">
                    <button type="submit" name="simpan" class="btn btn-primary btn-submit text-white py-3"><i class="bi bi-send-check-fill me-2"></i>KIRIM FORMULIR PENDAFTARAN</button>
                    <div class="text-center mt-3">
                        <span class="text-muted">Sudah pernah mendaftar?</span>
                        <a href="login.php" class="text-success fw-bold text-decoration-none ms-1">Login di sini</a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $no_reg = "REG-" . date('ymdHis');
                $data = $_POST;
                $data['no_pendaftaran'] = $no_reg;
                unset($data['simpan']);

                $res = api_request("POST", $url, $data);
                if ($res) {
                    echo "<script>
                        alert('PENDAFTARAN BERHASIL!\\n\\nSimpan data untuk login:\\nNama: " . $_POST['nama_lengkap'] . "\\nPassword: " . $_POST['password'] . "');
                        window.location='login.php';
                    </script>";
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
