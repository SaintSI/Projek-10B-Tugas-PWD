<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input POST</title>
</head>
<body>

<h2>Data yang Dikirim dengan Metode POST</h2>

<?php
    $nim = $_POST['nim'] ?? '-';
    $nama = $_POST['nama'] ?? '-';
    $umur = $_POST['umur'] ?? '-';
    $tempat_lahir = $_POST['tempat_lahir'] ?? '-';
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '-';
    $no_hp = $_POST['no_hp'] ?? '-';
    $alamat = $_POST['alamat'] ?? '-';
    $kota = $_POST['kota'] ?? '-';
    $email = $_POST['email'] ?? '-';

    echo "NIM : " . $nim . "<br>";
    echo "Nama : " . $nama . "<br>";
    echo "Umur : " . $umur . "<br>";
    echo "Tempat Lahir : " . $tempat_lahir . "<br>";
    echo "Tanggal Lahir : " . $tanggal_lahir . "<br>";
    echo "No HP : " . $no_hp . "<br>";
    echo "Alamat : " . $alamat . "<br>";
    echo "Kota : " . $kota . "<br>";

    if (isset($_POST['jk'])) {
        $jk = $_POST['jk'];
        if ($jk == "Laki - Laki") { 
            echo "Jenis Kelamin : Laki - Laki<br>";
        } else {
            echo "Jenis Kelamin : Perempuan<br>";
        }
    } else {
        echo "Jenis Kelamin : Belum dipilih<br>";
    }

    if (isset($_POST['status'])) {
        echo "Status : " . $_POST['status'] . "<br>";
    } else {
        echo "Status : Belum dipilih<br>";
    }

    echo "Hobi : ";
    if (!empty($_POST['hobi'])) { 
        foreach ($_POST['hobi'] as $hobi_item) {
            echo $hobi_item . ", ";
        }
    } else {
        echo "Tidak Memiliki Hobi";
    }

    echo "<br>Email : " . $email . "<br>";
?>

</body>
</html>