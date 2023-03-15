
<?php  
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
  exit;
}

include 'koneksi.php';

$video = "SELECT * FROM video";
$play = mysqli_query($conn,$video);
$judul = "";
$video = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $video = $_POST['video'];
    if ($judul&&$video){
        $query = "INSERT INTO `video`(`judul`, `video`) VALUES ('$judul','$video')";
        $q1 = mysqli_query($conn, $query);
        header("Location:video.php");
        if ($q1){
		$sukses = "video berhasil di post";
		} else {
		$error = "Gagal memasukkan video";
		}
    }else {
		$error = "Masukkan video terlebih dahulu";
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
<div class="form" style="padding-top: 75px;">
    <form action="" style="width: 50%; margin: auto;" method="POST">
    <div>
        <label for="Judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="Judul" name="judul" >
    </div>
    <div class="mb-3">
        <label for="Berita" class="form-label">Masukkan video</label>
        <input type="text" class="form-control" id="Berita" name="video">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
    </form>
</div>
<table>
  <tr>
    <th>Judul</th>
    <th>Link Video</th>
    <th>Edit</th>
  </tr>
<?php while($vids = mysqli_fetch_assoc($play)){ ?>
  <tr>
    <td><?php echo $vids["judul"]; ?></td>
    <td><?php echo $vids["video"];?></td>
    <td><a href="hapusvideo.php?id=<?php echo $vids["id"];?>" class="btn btn-danger">Delete!</a></td>
  </tr>
<?php ;} ?>
</table>
</body>
</html>