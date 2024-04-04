<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memperoleh data dari formulir
    $car_id = $_POST['car_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Memeriksa apakah mobil sudah dipinjam pada rentang tanggal yang diminta
    $sql_check = "SELECT * FROM rentals WHERE car_id='$car_id' AND ('$start_date' BETWEEN start_date AND end_date OR '$end_date' BETWEEN start_date AND end_date)";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        // Mobil sudah dipinjam, tampilkan pesan sebagai alert
        echo "<script>alert('Car is already rented for the selected dates');</script>";
        echo "<script>window.location.href = 'user.php';</script>";
    } else {
        // Tambahkan proses penyewaan mobil ke database
        $sql_rent = "INSERT INTO rentals (car_id, start_date, end_date) VALUES ('$car_id', '$start_date', '$end_date')";
        if ($conn->query($sql_rent) === TRUE) {
            // Penyewaan berhasil, tampilkan pesan sebagai alert dan arahkan kembali ke halaman user
            echo "<script>alert('Car rented successfully');</script>";
            echo "<script>window.location.href = 'user.php';</script>";
        } else {
            echo "Error: " . $sql_rent . "<br>" . $conn->error;
        }
    }
}
?>
