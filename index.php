<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5" style="max-width: 800px;">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white text-center py-3">
            <h3>FORMULIR PENDAFTARAN SANTRI</h3>
            <p class="mb-0">Pondok Pesantren Al-Fathonah</p>
        </div>
        <div class="card-body p-4">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-8"><label>1. Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
                    <div class="col-md-4"><label>2. Nama Panggilan</label><input type="text" name="nama_panggilan" class="form-control"></div>
                    <div class="col-md-4"><label>3. Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select"><option>Laki-laki</option><option>Perempuan</option></select>
                    </div>
                    <div class="col-md-4"><label>4. Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control"></div>
                    <div class="col-md-4"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control"></div>
                    <div class="col-md-6"><label>5. Anak Ke-</label><input type="number" name="anak_ke" class="form-control"></div>
                    <div class="col-md-6"><label>6. Jumlah Saudara</label><input type="number" name="jumlah_saudara" class="form-control"></div>
                    
                    <h6 class="mt-4 border-bottom pb-2">Data Orang Tua</h6>
                    <div class="col-md-6"><label>7a. Nama Ayah</label><input type="text" name="nama_ayah" class="form-control"></div>
                    <div class="col-md-6"><label>8a. Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" class="form-control"></div>
                    <div class="col-md-6"><label>7b. Nama Ibu</label><input type="text" name="nama_ibu" class="form-control"></div>
                    <div class="col-md-6"><label>8b. Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" class="form-control"></div>

                    <h6 class="mt-4 border-bottom pb-2">Alamat & Keamanan</h6>
                    <div class="col-md-12"><label>9. Jalan/Desa/Kec</label><input type="text" name="alamat_jalan" class="form-control"></div>
                    <div class="col-md-4"><label>Desa</label><input type="text" name="desa_kelurahan" class="form-control"></div>
                    <div class="col-md-4"><label>Kecamatan</label><input type="text" name="kecamatan" class="form-control"></div>
                    <div class="col-md-4"><label>No. Telp/WA</label><input type="text" name="no_telp" class="form-control" required></div>

                    <div class="col-md-6"><label>10. Nama Sekolah</label><input type="text" name="nama_sekolah" class="form-control"></div>
                    <div class="col-md-3"><label>Kelas</label><input type="text" name="kelas" class="form-control"></div>
                    <div class="col-md-3"><label>Alamat Sekolah</label><input type="text" name="alamat_sekolah" class="form-control"></div>
                    
                    <div class="col-md-6"><label class="text-danger fw-bold">BUAT PASSWORD LOGIN</label><input type="password" name="password" class="form-control" placeholder="Bebas, contoh: 12345" required></div>
                </div>

                <div class="mt-4 d-grid gap-2">
                    <button type="submit" name="simpan" class="btn btn-success btn-lg">SIMPAN PENDAFTARAN</button>
                    <a href="login.php" class="btn btn-outline-primary">Sudah Daftar? Login di sini</a>
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
                    // Pop-up pemberitahuan menggunakan Nama Lengkap
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
</body>
</html>
