<?php 

include 'config.php';
session_start();
$err = "";
$username = "";
$password = "";
$ingataku = "";

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$ingataku = ($_POST['ingataku']);
}
	if ($username == '' or $password == ''){
		$err .= "<li>Masukkan semua data!</li>";
	}
	else{
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result-> num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['username'];

			 if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
			header("Location: welcome.php");
	} else {
		echo "<script>alert('Kesalahan memasukkan data, silahkan coba kembali.')</script>";
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

	<title>Login FirstStep</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<center><p>Bergabunglah dengan kami!</p></center>
			<br>
			<div class="input-group">
				<input type="username" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<center>
				<div>
					<input type="checkbox" id="login_check" name="ingataku" value="1">
					<?php if($ingataku == '1') echo "checked"?>
					<label for="login_check"> Remember Me </label><br>
				</div>
			</center>
			<br>
			<center><p class="login-register-text">Belum memiliki akun?<a href="register.php"> Register</a></p></center>
		</form>
	</div>
</body>
</html>


