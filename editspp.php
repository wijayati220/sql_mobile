<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$tahun = $_POST["tahun"];
$nominal = $_POST["nominal"];

$sql = "UPDATE spp SET tahun = ?, nominal = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $tahun, $nominal, $id);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
