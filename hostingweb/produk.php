<?php  
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
  exit;
}

include 'koneksi.php';
$select = "SELECT * FROM daftarproduk ";
$result = mysqli_query($conn, $select);

$gambar = "";
$barang = "";
$harga = "";
$desk = "";
$kategori = "";

if (isset($_POST['submit'])) {
    $gambar = $_POST['gambar'];
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];
    $desk = $_POST['desk'];
    $kategori = $_POST['kategori'];
    if ($gambar&&$barang&&$harga&&$desk&&$kategori){
        $query = "INSERT INTO `daftarproduk`(`gambar`, `namaproduk`, `harga`, `deskripsi`, `kategori`) VALUES ('$gambar', '$barang', '$harga', '$desk', '$kategori')";
        $q1 = mysqli_query($conn, $query);
        if ($q1){
		$sukses = "produk berhasil di post";
		} else {
		$error = "Gagal memasukkan data";
		}
    }else {
		$error = "Masukkan data terlebih dahulu";
	}
}
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
<?php if($error){?>
			<div class="alert alert-danger" role="alert">
		<?php echo $error;?>
		  	</div>
		<?php ;}else if ($sukses){?>
			<div class="alert alert-success" role="alert">
		<?php echo $sukses;}?>
			</div>
<div class="produk" style="padding-top: 75px;">
    <form action="" style="width: 50%; margin: auto;" method="POST">
    <div>
        <label for="gambar" class="form-label">Masukkan Gambar</label>
        <input type="text" class="form-control" id="gambar" name="gambar" >
    </div>
    <div>
        <label for="barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="barang" name="barang" >
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga">
    </div>
    <div class="mb-3">
        <label for="desk" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="desk" name="desk">
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
    </form>
    <table style="width: 80%;">
        <tr>
            <th style="padding: 10px;">Gambar</th>
            <th style="padding: 10px;">Nama Barang</th>
            <th style="padding: 10px;">Harga</th>
            <th style="padding: 10px;">Deskripsi</th>
            <th style="padding: 10px;">Kategori</th>
            <th style="padding: 10px;">Edit</th>
        </tr>
        <tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td style="padding: 10px;"><?php echo '<img style="width: 200px" src="'.$row['gambar'].'">' ?></td>
            <td style="padding: 10px;"><?php echo $row["namaproduk"];?></td>
            <td style="padding: 10px;"><?php echo $row["harga"];?></td>
            <td style="padding: 10px;"><?php echo $row["deskripsi"];?></td>
            <td style="padding: 10px;"><?php echo $row["kategori"];?></td>
            <td><a href="hapusproduk.php?id=<?php echo $row["id"];?>" class="btn btn-primary">Checklist!</a></td>
        </tr>
    <?php };?>
        </tr>
    </table>
</div>
</body>
</html>
