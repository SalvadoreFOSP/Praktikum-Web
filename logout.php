<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghapus sesi

// Arahkan kembali ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit;
?>
