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
    <title>Cetak Formulir - <?= $s['nama_lengkap'] ?></title>
    <style>
        /* Pengaturan Kertas A4 */
        @page {
            size: A4;
            margin: 1cm; /* Margin diperkecil agar muat */
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt; /* Font diperkecil dari 12pt ke 10pt */
            line-height: 1.3;
            margin: 0;
            padding: 0;
        }
        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }
        .kop h2 { margin: 0; font-size: 14pt; }
        .kop p { margin: 0; font-size: 9pt; }
        
        h3 { 
            text-align: center; 
            text-decoration: underline; 
            margin: 10px 0; 
            font-size: 12pt; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 3px 0; /* Jarak antar baris dipersempit */
            vertical-align: top;
        }
        .label { width: 35%; }
        .titik { width: 2%; }
        
        .section-title {
            font-weight: bold;
            margin-top: 8px;
            text-transform: uppercase;
            font-size: 10pt;
            border-bottom: 1px solid #eee;
        }

        .footer {
            margin-top: 20px;
            width: 100%;
        }
        .footer td { text-align: center; width: 50%; }

        /* Sembunyikan tombol saat cetak */
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="background: #f0f0f0; padding: 10px; text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer;">KLIK UNTUK CETAK</button>
        <button onclick="window.history.back()" style="padding: 10px 20px; cursor: pointer;">KEMBALI</button>
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
            <td><strong><?= strtoupper($s['nama_lengkap']) ?></strong></td>
        </tr>
        <tr>
            <td class="label">2. Nama Panggilan</td>
            <td class="titik">:</td>
            <td><?= $s['nama_panggilan'] ?></td>
        </tr>
        <tr>
            <td class="label">3. Jenis Kelamin</td>
            <td class="titik">:</td>
            <td><?= $s['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <td class="label">4. Tempat, Tanggal Lahir</td>
            <td class="titik">:</td>
            <td><?= $s['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($s['tanggal_lahir'])) ?></td>
        </tr>
        <tr>
            <td class="label">5. Anak Ke -</td>
            <td class="titik">:</td>
            <td><?= $s['anak_ke'] ?></td>
        </tr>
        <tr>
            <td class="label">6. Jumlah Saudara Kandung</td>
            <td class="titik">:</td>
            <td><?= $s['jumlah_saudara'] ?> orang</td>
        </tr>

        <tr><td colspan="3" class="section-title">Data Orang Tua</td></tr>
        <tr>
            <td class="label">7. Nama Ayah / Ibu</td>
            <td class="titik">:</td>
            <td><?= $s['nama_ayah'] ?> / <?= $s['nama_ibu'] ?></td>
        </tr>
        <tr>
            <td class="label">8. Pekerjaan Ayah / Ibu</td>
            <td class="titik">:</td>
            <td><?= $s['pekerjaan_ayah'] ?> / <?= $s['pekerjaan_ibu'] ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">Alamat & Kontak</td></tr>
        <tr>
            <td class="label">9. Alamat Lengkap</td>
            <td class="titik">:</td>
            <td><?= $s['alamat_jalan'] ?></td>
        </tr>
        <tr>
            <td class="label">&nbsp;&nbsp;&nbsp;No. Telp / WA</td>
            <td class="titik">:</td>
            <td><?= $s['no_telp'] ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">Data Sekolah</td></tr>
        <tr>
            <td class="label">10. Nama Sekolah / Kelas</td>
            <td class="titik">:</td>
            <td><?= $s['nama_sekolah'] ?> / Kelas: <?= $s['kelas'] ?></td>
        </tr>
        <tr>
            <td class="label">&nbsp;&nbsp;&nbsp;Alamat Sekolah</td>
            <td class="titik">:</td>
            <td><?= $s['alamat_sekolah'] ?></td>
        </tr>

        <tr><td colspan="3" class="section-title">11. Rincian Biaya</td></tr>
        <tr>
            <td colspan="3">
                <table style="margin-left: 10px; width: 95%;">
                    <tr>
                        <td width="50%">a. Pendaftaran: Rp <?= number_format($s['biaya_pendaftaran'], 0, ',', '.') ?></td>
                        <td>c. Uang Makan: Rp <?= number_format($s['biaya_makan'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>b. Infaq Bulanan: Rp <?= number_format($s['biaya_infaq'], 0, ',', '.') ?></td>
                        <td>d. Titip Jajan: Rp <?= number_format($s['biaya_jajan'], 0, ',', '.') ?></td>
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

    <div style="margin-top: 15px; font-size: 8pt; color: #666; font-style: italic;">
        * No. Pendaftaran: <?= $s['no_pendaftaran'] ?> | Dicetak pada: <?= date('d/m/Y H:i') ?>
    </div>

</body>
</html>
