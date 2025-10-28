<?php
require_once __DIR__ . '/config/database.php';

$nama = "Admin Utama";
$email = "admin@example.com";
$password_hash = password_hash("12345", PASSWORD_DEFAULT);

$sql = "INSERT INTO tabel_admin (nama, email, password) VALUES (:nama, :email, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nama' => $nama, ':email' => $email, ':password' => $password_hash]);

echo "Data admin berhasil ditambahkan.";
