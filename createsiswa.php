<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nisn = $_POST["nisn"];
$nis = $_POST["nis"];
$nama = $_POST["nama"];
$id_kelas = $_POST["id_kelas"];
$nomor_telp = $_POST["nomor_telp"];
$alamat = $_POST["alamat"];
$id_spp = $_POST["id_spp"];

$sql = "INSERT INTO siswa (nisn, nis, nama, id_kelas, nomor_telp, alamat, id_spp) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nisn, $nis, $nama, $id_kelas, $nomor_telp, $alamat, $id_spp);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
