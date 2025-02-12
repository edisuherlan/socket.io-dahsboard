<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan MySQL Anda
$pass = "";
$dbname = "db_dashboard";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
