<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background: #6a11cb; background: linear-gradient(to right, #2575fc, #6a11cb); height: 100vh; display: flex; align-items: center; }</style>
</head>
<body>
<div class="container" style="max-width: 400px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4">
            <h4 class="text-center mb-4 fw-bold">LOGIN SANTRI</h4>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama sesuai pendaftaran" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Masukkan password Anda" required>
                </div>
                <button name="login" class="btn btn-primary w-100 py-2">MASUK KE DASHBOARD</button>
            </form>
            
            <?php
            if(isset($_POST['login'])){
                // Mencari di Supabase berdasarkan Nama Lengkap DAN Password
                // urlencode digunakan jika nama mengandung spasi agar query API aman
                $nama = urlencode($_POST['nama_lengkap']);
                $pass = $_POST['pass'];
                
                $res = api_request("GET", $url . "?nama_lengkap=eq." . $nama . "&password=eq." . $pass);
                
                if(!empty($res)){
                    // Jika data ditemukan
                    $_SESSION['user'] = $res[0];
                    header("Location: dashboard.php");
                } else {
                    echo "<div class='alert alert-danger mt-3 small text-center'>Nama atau Password Salah! Perhatikan huruf kapital dan spasi.</div>";
                }
            }
            ?>
            <div class="text-center mt-3">
                <a href="index.php" class="small text-decoration-none">Belum daftar? Klik di sini</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
