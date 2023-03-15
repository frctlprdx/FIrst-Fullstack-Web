<?php
session_start();

include 'koneksi.php';

  //produk
  $select = "SELECT * FROM daftarproduk ";
  $result = mysqli_query($conn, $select);
  //
  
  //berita
  $berita = "SELECT * FROM berita ";
  $hasil = mysqli_query($conn, $berita);
  //

  //pesanan
  $namaproduk = "";
  $jumlahproduk = "";
  $alamatpesan = "";
  $catatan = "";
  if (isset($_POST['order'])) {
    $namaproduk = $_POST['produk'];
    $jumlahproduk = $_POST['jumlah'];
    $alamatpesan = $_POST['alamatpesan'];
    $catatan = $_POST['catatanpesanan'];
    $totalharga = $jumlahproduk * 25000;
    if ($namaproduk && $jumlahproduk && $alamatpesan && $catatan &&$totalharga){
        $query = "INSERT INTO `pesanan`(`namaproduk`, `jumlah`, `harga`, `alamat`, `catatan`) VALUES ('$namaproduk','$jumlahproduk','$totalharga','$alamatpesan', '$catatan')";
        $q1 = mysqli_query($conn, $query);
        if ($q1){
		$sukses = "Terimakasih Telah Pesan";
		} else {
		$error = "Gagal Memesan";
		}
    }else {
		$error = "Pesan terlebih dahulu";
	}
}
//

//promo
$alamatpromo = "";
$promo = $_POST['kodepromo'];
if (isset($_POST['promo'])) {
  $alamatpromo = $_POST['alamatpromo'];
  if ($promo == 'kerajinantahunbaru') {
    $query = "INSERT INTO `pesanan`(`namaproduk`, `jumlah`,`harga`, `alamat`, `catatan`) VALUES ('Lampu Tidur','1','5000','$alamatpromo', '*promo*')";
    $q1 = mysqli_query($conn, $query);
    $pesan = "Promo Berhasil";
  } elseif ($promo == 'makanantahunbaru') {
    $query = "INSERT INTO `pesanan`(`namaproduk`, `jumlah`,`harga`, `alamat`, `catatan`) VALUES ('Nasi Goreng','1','5000','$alamatpromo', '*promo*')";
    $q1 = mysqli_query($conn, $query);
    $pesan = "Promo Berhasil";
  } elseif ($promo == 'minumantahunbaru') {
    $query = "INSERT INTO `pesanan`(`namaproduk`, `jumlah`,`harga`, `alamat`, `catatan`) VALUES ('Es Teh Manis','1','5000','$alamatpromo', '*promo*')";
    $q1 = mysqli_query($conn, $query);
    $pesan = "Promo Berhasil";
  } else {
    $alert = "Masukkan Kode Promo";
  }
}

//video 
$video = "SELECT * FROM video";
$play = mysqli_query($conn, $video);

//kontak
$kontaknama = "";
$kontakemail = "";
$kontaknomor = "";
$kontakalamat = "";
if (isset($_POST['kontak'])) {
  $kontaknama = $_POST['kontaknama'];
  $kontakemail = $_POST['kontakemail'];
  $kontaknomor = $_POST['kontaknomor'];
  $kontakalamat = $_POST['kontakalamat'];
  if ($kontaknama && $kontakemail && $kontaknomor && $kontakalamat){
      $query = "INSERT INTO `kontak`(`nama`, `email`, `nomer`, `alamat`) VALUES ('$kontaknama','$kontakemail','$kontaknomor', '$kontakalamat')";
      $q1 = mysqli_query($conn, $query);
      if ($q1){
  $kontsuk = "Terimakasih Telah berlangganan";
  } else {
  $konter = "Gagal berlangganan";
  }
  }else {
  $konter = "masukkan data terlebih dahulu";
}
}
//
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="background-color: #38b09d;">
  <div class="container">
    <?php if (!isset($_SESSION["login"])) { ?>
      <a class="navbar-brand">Welcome Guest</a>
    <?php ;} else if (isset($_SESSION["user"])) { ?>
      <a class="navbar-brand">Welcome <?php echo $_SESSION["user"];?></a>
      <?php ;} ?>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="#carouselExampleCaptions">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#produk">Penjualan Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#promo">Promo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#kontak">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#video">Video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#post">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#sosmed">Fitur Lain</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color:#38b09d;"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" style="background-color:#38b09d;"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" style="background-color:#38b09d;"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100"  width="800" height="400" style="background-image: url(https://cdn.idntimes.com/content-images/post/20170801/sate-ayam-f9eff6f4f84b0fafac5a61a2aeec114c_600x400.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;"></svg>
          <div class="carousel-caption d-none d-md-block">
            <h5>Selamat Tahun baru!!</h5>
            <p>Dapatkan diskon sampai 101%</p>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" style="background-image: url(https://images.pexels.com/photos/265704/pexels-photo-265704.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500);background-position: center;background-repeat: no-repeat;background-size: cover;"></svg>
    
          <div class="carousel-caption d-none d-md-block" >
            <h5>Bosan Dengan Minuman itu itu saja ?</h5>
            <p>Cek disini untuk mendapatkan minuman yang dijamin menyegarkan</p>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" style="background-image: url(https://p4.wallpaperbetter.com/wallpaper/859/317/106/minimalism-simple-simple-background-flowers-wallpaper-preview.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;"></svg>
    
          <div class="carousel-caption d-none d-md-block">
            <h5>Butuh hiasan ?</h5>
            <p>Silahkan kunjungi halaman ini dan pilih sesuai dengan selera anda</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  <div id="produk" class="produk">
  <?php while ($produk = mysqli_fetch_assoc($result)) { ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <?php $image = $produk['gambar']; echo '<img style="width: 150px" src="'.$image.'" >';?>
    <h5 class="card-title"><?php echo $produk['namaproduk'] ?></h5>
    <p class="card-text"><?php echo $produk['deskripsi'] ?></p>
    <p class="card-text">Kategori : <?php echo $produk['kategori'] ?></p>
    <a href="#pesan" class="btn btn-primary">RP<?php echo $produk['harga'] ?></a>
  </div>
</div>
    <?php } ?>
  </div>
  <div class="pesan shadow-lg p-3 mb-5 bg-body rounded" >
    <h1>Pesan sekarang </h1>
    <form action="" method="POST" style="margin: 100px 0 100px 0;">
      <input type="text" name="produk" placeholder="Produk - Produk - Produk">
      <input type="text" name="jumlah" placeholder="Jumlah - Jumlah - Jumlah">
      <input type="text" name="alamatpesan" placeholder="Alamat">
      <input type="text" name="catatanpesanan" placeholder="Catatan"><br>
      <input type="submit" name="order" value="Checkout!">
    </form>
    <?php if($error){?>
			<div class="alert alert-danger" role="alert">
		<?php echo $error;?>
		  	</div>
		<?php ;}else if ($sukses){?>
			<div class="alert alert-success" role="alert">
		<?php echo $sukses;}?>
			</div>
  </div>


  <div id="promo" class="promo ">
     <p>Masukkan Kode Promo</p>
     <div class="shadow-lg p-3 mb-5 bg-body rounded">
      <form action="" method="POST">
        <input type="text" name="kodepromo">
        <input type="text" name="alamatpromo"> <br>
        <input type="submit" name="promo" value="Masukkan Promo">
    </form>
    <?php if($alert){?>
			<div class="alert alert-danger" role="alert">
		<?php echo $alert;?>
		  	</div>
		<?php ;}else if ($pesan){?>
			<div class="alert alert-success" role="alert">
		<?php echo $pesan;}?>
			</div>
  </div>
  </div>
<div id="kontak" class="kontak">
   <div class="tampil shadow-lg p-3 mb-5 bg-body">
   <?php while ($news = mysqli_fetch_assoc($hasil)) { ?>
    <div class="card">
  <div class="card-header">
    <?php echo $news["judul"] ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?php echo $news ["rangkuman"] ?></p>
      <footer>Kategori : <?php echo $news["kategori"] ?> - Tanggal berita di post : <?php echo $news["tanggal"];?></footer>
    </blockquote>
  </div>
</div>
    <?php };?>
  </div>
  <div id="post" class="post">
    <div>
    <h1>Ingin Update lebih lanjut ?</h1>
    <form action="" method="post">
      <input type="text" name="kontaknama" placeholder="Masukkan nama">
      <input type="text" name="kontakemail" placeholder="Masukkan email">
      <input type="text" name="kontaknomor" placeholder="Masukkan nomor">
      <input type="text" name="kontakalamat" placeholder="Masukkan alamat"><br>
      <input type="submit" name="kontak"value="Berlangganan!">
    </form>
    <?php if($konter){?>
			<div class="alert alert-danger" role="alert">
    <?php echo $konter;?>
		  </div>
		<?php ;}else if ($kontsuk){?>
			<div class="alert alert-success" role="alert">
		<?php echo $kontsuk;}?>
			</div>
  </div>
  </div>
  <div id="video" class="shadow-lg p-3 mb-5 bg-body ">
    <?php while($vids = mysqli_fetch_assoc($play)){ ?>
    <h1 style="text-align: center;"><?php echo $vids["judul"]; ?></h1>
    <?php $playvideo = $vids['video']; echo '<iframe style="display: block; margin: auto;" src="'.$playvideo.'"</iframe>';?>
  <?php } ?>
  </div>
  <div id="sosmed" class="sosmed" style="padding-bottom: 40px;">
  <h1 style="color: grey; padding: 20px 0 20px 20px;">Bisa Kontak kita di :</h1>
  <div class="kontak" style="text-align: center; font-size: 30px;">
    <a href="" style="text-decoration: none; font-style: italic;color: grey;">Instagram</a><br>
    <a href="" style="text-decoration: none; font-style: italic;color: grey;">Twitter</a><br>
    <a href="" style="text-decoration: none; font-style: italic;color: grey;">Facebook</a>
  </div>
</div>
  </body>
</html>
 
