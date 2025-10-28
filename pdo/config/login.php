<?php

require_once __DIR__ . '/config/database.php';

$email = $_POST['email'] ?? '';
$password_plain = $_POST['password'] ?? '';

$sql = "SELECT id, nama, email, password FROM tabel_admin WHERE email = :email LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password_plain, $user['password'])) {
    
    session_start();
    $_SESSION['admin_id'] = $user['id'];
    $_SESSION['admin_nama'] = $user['nama'];
    echo "Login berhasil. Selamat datang, " . htmlspecialchars($user['nama']);
} else {
    echo "Email atau password salah.";
}
