<?php  
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
  exit;
}

include 'koneksi.php';
$judul = "";
$tanggal = "";
$berita = "";
$sukses = "";
$error = "";
$kategori = "";
$select = "SELECT * FROM berita ";
$result = mysqli_query($conn, $select);
$i = 1;

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $rangkuman = $_POST['rangkuman'];
    $kategori = $_POST['kategori'];
    if ($judul&&$tanggal&&$rangkuman){
        $query = "INSERT INTO `berita`(`kategori`,`judul`, `tanggal`, `rangkuman`) VALUES ('$kategori','$judul','$tanggal','$rangkuman')";
        $q1 = mysqli_query($conn, $query);
        header("Location:berita.php");
        if ($q1){
		$sukses = "Berita berhasil di post";
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="table.css">
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
<div class="form" style="padding-top: 75px;">
    <form action="" style="width: 50%; margin: auto;" method="POST">
    <div>
        <label for="Judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="Judul" name="judul" >
    </div>
    <div class="mb-3">
        <label for="Berita" class="form-label">Masukkan Rangkuman Berita</label>
        <input type="text" class="form-control" id="Berita" name="rangkuman">
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Masukkan Tanggal</label>
        <input type="text" class="form-control" id="tanggal" name="tanggal">
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Masukkan kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
    </form>
</div>
<div class="berita">
   <table>
        <tr>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Berita</th>
            <th>Edit</th>
        </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["Kategori"];?></td>
            <td><?php echo $row["judul"];?></td>
            <td><?php echo $row["tanggal"];?></td>
            <td><?php echo $row["rangkuman"];?></td>
            <td><a href="hapusberita.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php };?>
   </table>
</div>

</body>
</html>