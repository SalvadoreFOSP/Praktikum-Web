<?php
include 'database.php';

// Ambil ID mobil yang akan dihapus dari parameter URL
$car_id = $_GET['id'];

// Hapus terlebih dahulu catatan terkait di tabel 'rentals'
$sql_delete_rentals = "DELETE FROM rentals WHERE car_id = $car_id";
$conn->query($sql_delete_rentals);

// Sekarang Anda bisa menghapus mobil dari tabel 'cars'
$sql_delete_car = "DELETE FROM cars WHERE id = $car_id";
$conn->query($sql_delete_car);

// Redirect kembali ke halaman admin setelah penghapusan
header("Location: admin.php");
exit();
?>
