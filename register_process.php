<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registrasi berhasil, arahkan kembali ke halaman awal
        header("Location: index.php");
        exit; // Pastikan untuk keluar dari skrip setelah mengarahkan
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
