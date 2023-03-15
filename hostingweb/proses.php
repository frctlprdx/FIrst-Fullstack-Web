<?php

$nama = $_POST['nama'];
$pass = $_POST['pass'];
    if ($pass == 'admin') {
    header("location:admin.php");
    } elseif ($pass = 'user') {
    header("location:index1.php");
    }
    else {
    header("location:index.php");
    }
?>