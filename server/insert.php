<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $jurusan = $_POST["jurusan"];
    $angkatan = $_POST["angkatan"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan, angkatan, email, alamat, no_hp) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama, $nim, $jurusan, $angkatan, $email, $alamat, $no_hp);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
