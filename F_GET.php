<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data (GET)</title>
</head>
<body>

    <h2>Form Input Data Mahasiswa - GET</h2>
    <form action="proses_get.php" method="GET">
        NIM : <input type="text" name="nim"><br><br>
        Nama : <input type="text" name="nama"><br><br>
        Umur : <input type="number" name="umur"><br><br>
        Tempat Lahir : <input type="text" name="tempat_lahir"><br><br>
        Tanggal Lahir : <input type="date" name="tanggal_lahir"><br><br>
        No HP : <input type="text" name="no_hp"><br><br>
        Alamat : <br>
        <textarea name="alamat" cols="30" rows="4"></textarea><br><br>
        Kota :
        <select name="kota">
            <option>Semarang</option>
            <option>Solo</option>
            <option>Brebes</option>
            <option>Kudus</option>
            <option>Demak</option>
            <option>Salatiga</option>
        </select><br><br>
        Jenis Kelamin :
        <input type="radio" name="jk" value="Laki - Laki"> Laki - Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>
        Status :
        <input type="radio" name="status" value="Kawin"> Kawin
        <input type="radio" name="status" value="Belum Kawin"> Belum Kawin
        <br><br>
        Pilih Hobi Anda : <br>
        <input type="checkbox" name="hobi[]" value="membaca"> Membaca <br>
        <input type="checkbox" name="hobi[]" value="olahraga"> Olahraga <br>
        <input type="checkbox" name="hobi[]" value="musik"> Musik <br>
        <input type="checkbox" name="hobi[]" value="traveling"> Traveling <br>
        <br>
        Email : <input type="email" name="email"><br><br>
        <input type="submit" value="kirim">
    </form>
</body>
</html>