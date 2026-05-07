<?php 
include 'config.php';
$id = $_GET['id'];
$res = api_request("GET", $url . "?id=eq." . $id);
if(empty($res)) die("Data tidak ditemukan");
$s = $res[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Formulir - <?= htmlspecialchars($s['nama_lengkap']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Pengaturan Kertas A4 */
        @page {
            size: A4;
            margin: 1cm; /* Margin diperkecil agar muat */
        }
        body {
            font-family: 'Arial', sans-serif; /* Arial untuk cetak resmi */
            font-size: 10pt; 
            line-height: 1.3;
            margin: 0;
            padding: 0;
            color: #000;
        }
        .kop {
            text-align: center;
            border-bottom: 3px double #000;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }
        .kop h2 { margin: 0; font-size: 14pt; font-family: 'Times New Roman', serif; }
        .kop p { margin: 0; font-size: 10pt; }
        
        h3 { 
            text-align: center; 
            text-decoration: underline; 
            margin: 15px 0; 
            font-size: 12pt; 
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 4px 0; 
            vertical-align: top;
        }
        .label { width: 35%; }
        .titik { width: 2%; }
        
        .section-title {
            font-weight: bold;
            margin-top: 10px;
            text-transform: uppercase;
            font-size: 10pt;
            border-bottom: 1px solid #aaa;
            padding-bottom: 2px;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }
        .footer td { text-align: center; width: 50%; }

        /* Sembunyikan tombol saat cetak dan ubah tampilan layar */
        .screen-only {
            background: #f4f9f4; 
            padding: 15px; 
            text-align: center; 
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            font-family: 'Poppins', sans-serif;
        }
        .btn-print {
            background: linear-gradient(135deg, #198754, #126c42);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0 5px;
        }
        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0 5px;
        }
        @media print {
            .no-print { display: none !important; }
            body { font-size: 11pt; }
        }
    </style>
</head>
<body>

    <div class="screen-only no-print">
        <h4 style="margin: 0 0 10px 0;">Tampilan Cetak Formulir</h4>
        <button onclick="window.print()" class="btn-print">🖨️ KLIK UNTUK CETAK</button>
        <button onclick="window.close()" class="btn-back">TUTUP HALAMAN</button>
    </div>

    <div class="kop">
        <h2>PONDOK PESANTREN AL-FATHONAH KUDUKERAS</h2>
        <p>Jl. H. Mastra, Desa Kudukeras Kec. Babakan Kab. Cirebon Jawa Barat 45191</p>
        <p>Telp/WA: 0822-1617-7911 / 0812-1147-5450</p>
    </div>

    <h3>FORMULIR PENDAFTARAN SANTRI</h3>

    <table>
        <tr>
            <td class="label">1. Nama Lengkap</td>
            <td class="titik">:</td>
            <td><strong><?= strtoupper(htmlspecialchars($s['nama_lengkap'])) ?></strong></td>
        </tr>
        <tr>
            <td class="label">2. Nama Panggilan</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['nama_panggilan']) ?></td>
        </tr>
        <tr>
            <td class="label">3. Jenis Kelamin</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['jenis_kelamin']) ?></td>
        </tr>
        <tr>
            <td class="label">4. Tempat, Tanggal Lahir</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['tempat_lahir']) ?>, <?= date('d-m-Y', strtotime($s['tanggal_lahir'])) ?></td>
        </tr>
        <tr>
            <td class="label">5. Anak Ke -</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['anak_ke']) ?></td>
        </tr>
        <tr>
            <td class="label">6. Jumlah Saudara Kandung</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['jumlah_saudara']) ?> orang</td>
        </tr>

        <tr><td colspan="3" class="section-title">Data Orang Tua</td></tr>
        <tr>
            <td class="label">7. Nama Ayah / Ibu</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['nama_ayah']) ?> / <?= htmlspecialchars($s['nama_ibu']) ?></td>
        </tr>
        <tr>
            <td class="label">8. Pekerjaan Ayah / Ibu</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['pekerjaan_ayah']) ?> / <?= htmlspecialchars($s['pekerjaan_ibu']) ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">Alamat & Kontak</td></tr>
        <tr>
            <td class="label">9. Alamat Lengkap</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['alamat_jalan']) ?></td>
        </tr>
        <tr>
            <td class="label">&nbsp;&nbsp;&nbsp;No. Telp / WA</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['no_telp']) ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">Data Sekolah</td></tr>
        <tr>
            <td class="label">10. Nama Sekolah / Kelas</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['nama_sekolah']) ?> / Kelas: <?= htmlspecialchars($s['kelas']) ?></td>
        </tr>
        <tr>
            <td class="label">&nbsp;&nbsp;&nbsp;Alamat Sekolah</td>
            <td class="titik">:</td>
            <td><?= htmlspecialchars($s['alamat_sekolah']) ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">11. Rincian Biaya</td></tr>
        <tr>
            <td colspan="3">
                <table style="margin-left: 10px; width: 95%;">
                    <tr>
                        <td width="50%">a. Pendaftaran: Rp <?= number_format((float)$s['biaya_pendaftaran'], 0, ',', '.') ?></td>
                        <td>c. Uang Makan: Rp <?= number_format((float)$s['biaya_makan'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>b. Infaq Bulanan: Rp <?= number_format((float)$s['biaya_infaq'], 0, ',', '.') ?></td>
                        <td>d. Titip Jajan: Rp <?= number_format((float)$s['biaya_jajan'], 0, ',', '.') ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="footer">
        <tr>
            <td>
                <br>Orang Tua/Wali Santri,<br><br><br><br>
                ( ______________________ )
            </td>
            <td>
                Cirebon, <?= date('d F Y') ?><br>Panitia Pendaftaran,<br><br><br><br>
                ( ______________________ )
            </td>
        </tr>
    </table>

    <div style="margin-top: 20px; font-size: 9pt; color: #555; font-style: italic; border-top: 1px dashed #ccc; padding-top: 5px;">
        * No. Pendaftaran: <strong><?= htmlspecialchars($s['no_pendaftaran']) ?></strong> | Dicetak pada: <?= date('d/m/Y H:i') ?>
    </div>

</body>
</html>
