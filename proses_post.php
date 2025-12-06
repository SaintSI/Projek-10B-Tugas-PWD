<?php
function bersihkan($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function validasiNama($nama) {
    if (empty($nama)) return "Nama tidak boleh kosong.";
    if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) return "Nama hanya boleh huruf.";
    return true;
}

function validasiUmur($umur) {
    if (empty($umur)) return "Umur tidak boleh kosong.";
    if (!is_numeric($umur)) return "Umur harus angka.";
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
$jk = isset($_POST['jk']) ? bersihkan($_POST['jk']) : "Belum dipilih";
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "Belum dipilih";

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

if ($cek_nama !== true) die("<h3 style='color:red; text-align:center;'>Error: $cek_nama <br><a href='F_POST.php'>Kembali</a></h3>");
if ($cek_umur !== true) die("<h3 style='color:red; text-align:center;'>Error: $cek_umur <br><a href='F_POST.php'>Kembali</a></h3>");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data POST</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .btn { display: inline-block; margin-top: 15px; padding: 10px 15px; background: #333; color: #fff; text-decoration: none; border-radius: 5px; }
        @media (max-width: 600px) { .container { width: 100%; } }
    </style>
</head>
<body>

<div class="container">
    <h2>Data yang Dikirim (POST)</h2>
    <table>
        <tr><td>NIM</td><td>: <?= $nim ?></td></tr>
        <tr><td>Nama</td><td>: <?= $nama ?></td></tr>
        <tr><td>Umur</td><td>: <?= $umur ?></td></tr>
        <tr><td>Tempat Lahir</td><td>: <?= $tempat_lahir ?></td></tr>
        <tr><td>Tanggal Lahir</td><td>: <?= $tanggal_lahir ?></td></tr>
        <tr><td>No HP</td><td>: <?= $no_hp ?></td></tr>
        <tr><td>Alamat</td><td>: <?= $alamat ?></td></tr>
        <tr><td>Kota</td><td>: <?= $kota ?></td></tr>
        <tr><td>Jenis Kelamin</td><td>: <?= $jk ?></td></tr>
        <tr><td>Status</td><td>: <?= $status ?></td></tr>
        <tr><td>Hobi</td><td>: <?= $hobi_output ?></td></tr>
        <tr><td>Email</td><td>: <?= $email ?></td></tr>
    </table>
    
    <a href="F_POST.php" class="btn">Kembali ke Form</a>
</div>

</body>
</html>