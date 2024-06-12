<?php
header('Content-Type: application/json'); // Menambahkan header JSON

$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die(json_encode(['pesan' => 'gagal', 'error' => 'Connection failed: ' . $conn->connect_error]));
}

$id = $_POST["id"];
$nisn = $_POST["nisn"];
$nis = $_POST["nis"];
$nama = $_POST["nama"];
$id_kelas = $_POST["id_kelas"];
$nomor_telp = $_POST["nomor_telp"];
$alamat = $_POST["alamat"];
$id_spp = $_POST["id_spp"];

// Validasi input
if ($id === null || $nisn === null || $nis === null || $nama === null || $id_kelas === null || $nomor_telp === null || $alamat === null || $id_spp === null) {
    echo json_encode(['pesan' => 'gagal', 'error' => 'Data tidak lengkap']);
    exit;
}

$sql = "UPDATE siswa SET nisn = ?, nis = ?, nama = ?, id_kelas = ?, nomor_telp = ?, alamat = ?, id_spp = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['pesan' => 'gagal', 'error' => $conn->error]);
    exit;
}

$stmt->bind_param("sssssssi", $nisn, $nis, $nama, $id_kelas, $nomor_telp, $alamat, $id_spp, $id);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal', 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
