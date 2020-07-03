<?php
// include database connection file
include_once("connection.php");

// Mengambil nim dari URL
$nim = $_GET['nim'];

// Delete data mahasiswa berdasarkan nim
$result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$nim'");

// Setelah delete, kembali ke home
header("Location:index.php");
?>