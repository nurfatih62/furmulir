<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Santri - Al-Fathonah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
        }
        .login-header {
            background: #198754;
            background: linear-gradient(135deg, #198754, #126c42);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .login-header h4 {
            font-weight: 700;
            margin: 0;
            letter-spacing: 1px;
        }
        .login-header p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            font-size: 0.95rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.2);
            border-color: #198754;
        }
        .btn-login {
            background: linear-gradient(135deg, #198754, #126c42);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #126c42, #0d5232);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
        }
    </style>
</head>
<body>
<div class="container px-3" style="max-width: 450px;">
    <div class="login-card border-0">
        <div class="login-header">
            <i class="bi bi-person-circle fs-1 mb-2 d-block"></i>
            <h4>PORTAL SANTRI</h4>
            <p>Pondok Pesantren Al-Fathonah</p>
        </div>
        <div class="card-body p-4 p-md-5">
            <h5 class="text-center mb-4 text-muted fw-bold">Masuk ke Akun Anda</h5>
            <form method="POST">
                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold small mb-1">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-person"></i></span>
                        <input type="text" name="nama_lengkap" class="form-control border-start-0 ps-0" placeholder="Sesuai form pendaftaran" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold small mb-1">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                        <input type="password" name="pass" class="form-control border-start-0 ps-0" placeholder="Masukkan password" required>
                    </div>
                </div>
                <button name="login" class="btn btn-primary btn-login w-100 py-2 mt-2">LOGIN SEKARANG <i class="bi bi-arrow-right-circle ms-2"></i></button>
            </form>
            
            <?php
            if(isset($_POST['login'])){
                $nama = urlencode($_POST['nama_lengkap']);
                $pass = $_POST['pass'];
                
                $res = api_request("GET", $url . "?nama_lengkap=eq." . $nama . "&password=eq." . $pass);
                
                if(!empty($res)){
                    $_SESSION['user'] = $res[0];
                    header("Location: dashboard.php");
                } else {
                    echo "<div class='alert alert-danger mt-4 mb-0 small text-center rounded-3 border-0 bg-danger text-white'><i class='bi bi-exclamation-triangle-fill me-2'></i>Nama atau Password Salah!</div>";
                }
            }
            ?>
            <div class="text-center mt-4">
                <p class="text-muted small mb-0">Belum mendaftar?</p>
                <a href="index.php" class="text-success text-decoration-none fw-bold">Daftar Santri Baru <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
