<?php
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "fullstack";
$conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM `pesanan` WHERE id = $id");

$konfirmasi = mysqli_affected_rows($conn);

if ($konfirmasi > 0) {
    header("location:pesanan.php");
}
?>