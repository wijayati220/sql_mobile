<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama_kelas = $_POST["nama_kelas"];
$kompetensi_keahlian = $_POST["kompetensi_keahlian"];

$sql = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nama_kelas, $kompetensi_keahlian);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
