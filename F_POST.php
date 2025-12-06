<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    <style>
        /* --- MODERN FORM STYLE --- */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        form {
            background: white;
            width: 100%;
            max-width: 500px;
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
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }

        /* Input Text Styling */
        input[type=text], input[type=number], input[type=date], input[type=email], textarea, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
            transition: border 0.3s;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Radio & Checkbox Styling */
        .radio-group, .checkbox-group {
            margin-bottom: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }

        .radio-group label, .checkbox-group label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
            cursor: pointer;
        }

        input[type=radio], input[type=checkbox] {
            margin-right: 5px;
            accent-color: #4CAF50; /* Warna hijau modern */
        }

        /* Submit Button */
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="proses_post_sanitasi.php" method="POST">
        
        <h2>Form Data Mahasiswa</h2>

        <label>NIM :</label>
        <input type="text" name="nim" maxlength="14" placeholder=". . ." required>

        <label>Nama :</label>
        <input type="text" id="nama" name="nama" onblur="cekNama()" required>

        <label>Umur :</label>
        <input type="number" id="umur" name="umur" onblur="cekUmur()" required>

        <label>Tempat Lahir :</label>
        <input type="text" name="tempat_lahir">

        <label>Tanggal Lahir :</label>
        <input type="date" name="tanggal_lahir">

        <label>No HP :</label>
        <input type="text" name="no_hp">

        <label>Alamat :</label>
        <textarea name="alamat" rows="3"></textarea>

        <label>Kota :</label>
        <select name="kota">
            <option>Semarang</option>
            <option>Solo</option>
            <option>Brebes</option>
            <option>Kudus</option>
            <option>Demak</option>
            <option>Salatiga</option>
        </select>

        <label>Jenis Kelamin :</label>
        <div class="radio-group">
            <label><input type="radio" name="jk" value="Laki - Laki"> Laki - Laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
        </div>

        <label>Status :</label>
        <div class="radio-group">
            <label><input type="radio" name="status" value="Kawin"> Kawin</label>
            <label><input type="radio" name="status" value="Belum Kawin"> Belum Kawin</label>
        </div>

        <label>Pilih Hobi :</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
            <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label><br>
            <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
            <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
        </div>
        <label>Email :</label>
        <input type="email" name="email">

        <input type="submit" value="Kirim Data">
    </form>

    <script>
        function cekNama() {
            var nama = document.getElementById("nama").value;
            if (nama !== "") {
                var regex = /^[a-zA-Z\s]+$/;
                if (!regex.test(nama)) {
                    alert("Nama hanya boleh huruf!");
                    document.getElementById("nama").value = ""; 
                } else {
                    confirm("Apakah nama '" + nama + "' sudah benar?");
                }
            }
        }

        function cekUmur() {
            var umur = document.getElementById("umur").value;
            if (umur !== "") {
                confirm("Apakah umur anda benar " + umur + " tahun?");
            }
        }
    </script>

</body>
</html>