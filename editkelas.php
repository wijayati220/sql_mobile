<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$nama_kelas = $_POST["nama_kelas"];
$kompetensi_keahlian = $_POST["kompetensi_keahlian"];

$sql = "UPDATE kelas SET nama_kelas = ?, kompetensi_keahlian = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nama_kelas, $kompetensi_keahlian, $id);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
