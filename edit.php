<?php
// include database connection file
include_once("connection.php");

// Menampilkan data mahasiswa sesuai nim
// Mengambil nim dari URL
$nim = $_GET['nim'];

// Fetch data mahasiswa yang sesuai dengan nim
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");

while($mhs_data = mysqli_fetch_array($result))
{
    $nim = $mhs_data['nim'];
    $nama = $mhs_data['nama'];
    $email = $mhs_data['email'];
    $alamat = $mhs_data['alamat'];
}
?>
<html>
<head>  
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="">
        <table border="0">
            <tr> 
                <td>NIM</td>
                <td><input disabled type="text" name="id-only" value=<?php echo $nim;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $nim;?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
// Cek jika form disubmit, execute update dan redirect page ke home
if(isset($_POST['update']))
{   
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // update data mahasiswa
    $result = mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', email='$email', alamat='$alamat' WHERE nim='$nim'");

    // Redirect to homepage to display updated mahasiswa
    header("Location: index.php");
}
?>