<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Password tidak cocok'); window.location='register.php';</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $koneksi->prepare("INSERT INTO tb_admin (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Pendaftaran berhasil, silakan masuk'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyimpan data'); window.location='register.php';</script>";
        }
    }
}
?>