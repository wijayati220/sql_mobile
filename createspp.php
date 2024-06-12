<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tahun = $_POST["tahun"];
$nominal = $_POST["nominal"];

$sql = "INSERT INTO spp (tahun, nominal) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $tahun, $nominal);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
