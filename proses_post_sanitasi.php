<?php

function bersihkan($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function validasiNama($nama) {
    if (empty($nama)) return "Nama tidak boleh kosong.";
    if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) return "Nama hanya boleh mengandung huruf dan spasi.";
    return true;
}

function validasiUmur($umur) {
    if (empty($umur)) return "Umur tidak boleh kosong.";
    if (!is_numeric($umur)) return "Umur harus berupa angka.";
    return true;
}

$nim = bersihkan($_POST['nim'] ?? '-');
$nama = bersihkan($_POST['nama'] ?? '-');
$umur = bersihkan($_POST['umur'] ?? '-');
$tempat_lahir = bersihkan($_POST['tempat_lahir'] ?? '-');
$tanggal_lahir = bersihkan($_POST['tanggal_lahir'] ?? '-');
$no_hp = bersihkan($_POST['no_hp'] ?? '-');
$alamat = bersihkan($_POST['alamat'] ?? '-');
$email = bersihkan($_POST['email'] ?? '-');
$kota = bersihkan($_POST['kota'] ?? '-');
$jk = isset($_POST['jk']) ? bersihkan($_POST['jk']) : "-";
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "-";

$hobi_list = [];
if (!empty($_POST['hobi'])) {
    foreach ($_POST['hobi'] as $h) {
        $hobi_list[] = bersihkan($h);
    }
    $hobi_output = implode(", ", $hobi_list);
} else {
    $hobi_output = "Tidak ada hobi";
}

$cek_nama = validasiNama($nama);
$cek_umur = validasiUmur($umur);

if ($cek_nama !== true) {
    die("<div style='color:red; text-align:center; padding:50px; font-family:sans-serif;'>
            <h3>Gagal: $cek_nama</h3>
            <a href='F_POST.php'>Kembali ke Form</a>
         </div>");
}

if ($cek_umur !== true) {
    die("<div style='color:red; text-align:center; padding:50px; font-family:sans-serif;'>
            <h3>Gagal: $cek_umur</h3>
            <a href='F_POST.php'>Kembali ke Form</a>
         </div>");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Mahasiswa</title>
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 600px; 
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            border-bottom: 2px solid #4CAF50; 
            padding-bottom: 10px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            vertical-align: top;
        }

        td:first-child {
            font-weight: 600;
            color: #555;
            width: 35%;
        }

        td:last-child {
            color: #333;
            text-align: right;
        }

        .highlight {
            color: #4CAF50;
            font-weight: bold;
        }

        .btn-back {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: background 0.3s;
            box-sizing: border-box;
        }

        .btn-back:hover {
            background-color: #45a049;
        }

        @media (max-width: 600px) {
            .container { padding: 25px; }
            td { display: block; width: 100%; text-align: left; padding: 5px 0; border: none; }
            td:first-child { margin-top: 15px; color: #888; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
            td:last-child { border-bottom: 1px solid #eee; padding-bottom: 15px; font-size: 16px; font-weight: 500; }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Terverifikasi ✅</h2>
    
    <table>
        <tr><td>NIM             :</td><td><?= $nim ?></td></tr>
        <tr><td>Nama Lengkap    :</td><td class="highlight"><?= $nama ?></td></tr>
        <tr><td>Umur            :</td><td><?= $umur ?> Tahun</td></tr>
        <tr><td>Tempat Lahir    :</td><td><?= $tempat_lahir ?></td></tr>
        <tr><td>Tanggal Lahir   :</td><td><?= $tanggal_lahir ?></td></tr>
        <tr><td>No. Handphone   :</td><td><?= $no_hp ?></td></tr>
        <tr><td>Alamat          :</td><td><?= $alamat ?></td></tr>
        <tr><td>Kota Domisili   :</td><td><?= $kota ?></td></tr>
        <tr><td>Jenis Kelamin   :</td><td><?= $jk ?></td></tr>
        <tr><td>Status          :</td><td><?= $status ?></td></tr>
        <tr><td>Hobi            :</td><td><?= $hobi_output ?></td></tr>
        <tr><td>Email           :</td><td><?= $email ?></td></tr>
    </table>

    <a href="F_POST.php" class="btn-back">Input Data Baru</a>
</div>

</body>
</html>