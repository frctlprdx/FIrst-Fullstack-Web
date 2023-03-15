<?php
session_start();

include 'koneksi.php';

if (isset($_POST['login'])) {
	$username=$_POST['nama'];
	$password = $_POST['pass'];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if ($password == 'admin') {
		$_SESSION["login"] = true;
		header("Location:admin.php");
	} elseif (mysqli_num_rows($result) === 1){
		$_SESSION["login"] = true;
		$_SESSION["user"] = $username;
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			header("Location:index.php");
			exit;
		} else {
			$error = "Password dan Username tidak sesuai";
		}
	} else {
		$error = "Masukkan username dan password";
	}


}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<style>
body {			
	background-color: whitesmoke;
	}
.login {
	text-align: center;
	padding-top: 400px;
}

input[type=text] {
	padding: 12px 20px;
	display: inline-block;
	margin-bottom: 5px;
	border:none;
	background-color: transparent;
	border-bottom: 1px solid #38b09d;
	border-radius: 4px;
	box-sizing: border-box;
}

input[type=password] {
	padding: 12px 20px;
	display: inline-block;
	border:none;
	margin-bottom: 5px;
	border-bottom: 1px solid #38b09d;
	border-radius: 4px;
	background-color: transparent;
	box-sizing: border-box;
}

.navbar {
	background-color: #38b09d;
}

input[type=submit] {
  padding: 12px 20px;
  margin-top: 5px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: #38b09d;
}

input[type=submit]:hover {
  color: #38b09d;
  background-color: black;
}


	</style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-md">
    <a class="navbar-brand" href="register.php"><button class="btn btn-outline-dark me-2" type="button">Register</button></a>
  </div>
</nav>
	<div class="login">
		<div class="input">
			<h3>Halaman Login</h3>
			<form action="" method="post">
				<input type="text" name="nama" placeholder="Masukkan Username"><br>
				<input type="password" name="pass" placeholder="Masukkan Password"><br>
				<input type="submit" name="login" value="LOGIN">
			</form>
		</div>
	</div>
	<?php if($error){?>
				<div class="alert alert-danger" role="alert" style="width: 400px; margin: auto;">
			<?php echo $error ?>
		  		</div>
			<?php ;}?>
</body>
</html>
