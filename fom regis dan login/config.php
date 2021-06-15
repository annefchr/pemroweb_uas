<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "pemroweb_uas";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Koneksi gagal!')</script>");
}

?>