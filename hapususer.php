<?php
header('Content-Type: application/json');

// Membuat koneksi ke database
$conn = new mysqli("localhost", "root", "", "spp-bayar");

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die(json_encode(['pesan' => 'gagal', 'error' => 'Connection failed: ' . $conn->connect_error]));
}

// Mendapatkan data yang dikirimkan melalui metode POST
$name = $_POST["name"];

// Menyiapkan query SQL untuk menghapus data
$sql = "DELETE FROM users WHERE name = ?";

// Mempersiapkan statement SQL
$stmt = $conn->prepare($sql);

// Mengecek apakah statement SQL berhasil dipersiapkan
if (!$stmt) {
    echo json_encode(['pesan' => 'gagal', 'error' => $conn->error]);
    exit;
}

// Mengikat parameter ke dalam statement SQL
$stmt->bind_param("s", $name);

// Mengeksekusi statement SQL
if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal', 'error' => $stmt->error]);
}

// Menutup statement dan koneksi database
$stmt->close();
$conn->close();
?>
