<?php
// Memanggil file connection.php untuk membuat koneksi dengan database
include_once("connection.php");

// Fetch semua data mahasiswa dari database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nim ASC");
?>

<html>
<head>    
    <title>Data Mahasiswa</title>
</head>

<body>
<a href="add.php">Tambah mahasiswa</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>NIM</th> <th>Nama</th> <th>Email</th> <th>Alamat</th> <th>Aksi</th>
    </tr>
    <?php  
    while($mhs_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$mhs_data['nim']."</td>";
        echo "<td>".$mhs_data['nama']."</td>";
        echo "<td>".$mhs_data['email']."</td>";
        echo "<td>".$mhs_data['alamat']."</td>";
        echo "<td><a href='edit.php?nim=$mhs_data[nim]'>Edit</a> | <a href='delete.php?nim=$mhs_data[nim]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>