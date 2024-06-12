<?php
$conn = new mysqli("localhost", "root", "", "spp-bayar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$level = $_POST["level"];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, password, level) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $hashed_password, $level);

if ($stmt->execute()) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal']);
}

$stmt->close();
$conn->close();
?>
