<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
  exit;
}

include 'koneksi.php';

$select = "SELECT * FROM user ";
$result = mysqli_query($conn, $select);
$i = 1;
?>


<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Admin Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="table.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-link" href="admin.php">User</a>
        <a class="nav-link" href="kontak.php">kontak</a>
        <a class="nav-link" href="berita.php">Berita</a>
        <a class="nav-link" href="produk.php">Produk</a>
        <a class="nav-link" href="pesanan.php">Pesanan</a>
        <a class="nav-link" href="video.php">Video</a>
        <a class="nav-link" href="logout.php">logout</a>
      </div>
    </div>
  </div>
</nav>
<table>
<tr>
    <th>No.</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Password</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row["username"];?></td>
        <td><?php echo $row["email"];?></td>
        <td style="padding: 0px;"><?php echo $row["password"];?></td>
    </tr>
<?php }
;?>
</table>
</body>
</html>