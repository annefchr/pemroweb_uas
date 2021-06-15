<?php 

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
     header("Location: index.php");
 }

if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$tanggal = $_POST['tanggal'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];

	if (!empty($_POST["nama"]) || !empty($_POST["username"]) || !empty($_POST["password"]) || !empty($_POST["tanggal"]) || !empty($_POST["telepon"]) || !empty($_POST["alamat"])) {
		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result-> num_rows > 0) {
			$sql = "INSERT INTO admin (nama_admin, username, password, tanggal_lahir, telepon, alamat) VALUES ('$nama', '$username', '$password', '$tanggal','$telepon', '$alamat')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Registrasi berhasil dilakukan.')</script>";
				$_POST['nama'] = "";
				$_POST['username'] = "";
				$_POST['password'] = "";
				$_POST['tanggal'] = "";
				$_POST['telepon'] = "";
				$_POST['alamat'] = "";
			} else {
				echo "<script>alert('Ada kesalahan, silahkan coba lagi!')</script>";
			}
		} else {
			echo "<script>alert('Username telah digunakan!')</script>";
		}
		
	} else {
		echo "<script>alert('Isi semua data dengan lengkap!')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register FirstStep</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <center><p>Untuk menjadi bagian dari FirstStep!</p></center>
            <br>
			<div class="input-group">
				<input type="text" placeholder="Nama" name="nama" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="text" placeholder="Tanggal Lahir" name="tanggal" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telepon" name="telepon" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat" name="alamat" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<center><p class="login-register-text">Sudah memiliki akun? <a href="index.php">Login</a></p></center>
		</form>
	</div>
</body>
</html>