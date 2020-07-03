<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <a href="index.php">Kembali</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php

    // Cek jika form disubmit, masukkan data mahasiswa ke database
    if(isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        // include database connection file
        include_once("connection.php");

        // Insert mahasiswa
        $sql = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$email','$alamat')";

        if ($conn->query($sql) === TRUE) {
        // Tampilkan pesan
        echo "Mahasiswa " . $nim . " - " . $nama . " berhasil ditambahkan. <a href='index.php'>Lihat mahasiswa</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>