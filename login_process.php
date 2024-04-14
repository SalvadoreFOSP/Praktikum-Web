<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna dengan username dan password yang sesuai
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil
        $_SESSION['username'] = $username;
        $row = $result->fetch_assoc();
        if ($row['username'] == 'admin' && $row['password'] == 'admin') {
            $_SESSION['admin'] = true;
            header("Location: admin.php");
            exit; // Pastikan untuk keluar dari skrip setelah mengarahkan
        } else {
            header("Location: user.php");
            exit; // Pastikan untuk keluar dari skrip setelah mengarahkan
        }
    } else {
        echo "Invalid username or password";
    }
}
?>
