<?php
include 'database.php';

// Mengambil riwayat peminjaman pengguna dari database
$sql = "SELECT * users.username, cars.car_name FROM rentals
        JOIN cars ON rentals.car_id = cars.id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Riwayat Peminjaman</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="history">
            <h2>Daftar Riwayat Peminjaman</h2>
            <ul>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo "User: " . $row["username"] . " - Mobil: " . $row["car_name"] . " - Mulai: " . $row["start_date"] . " - Selesai: " . $row["end_date"];
                        echo "</li>";
                    }
                } else {
                    echo "<li>Tidak ada riwayat peminjaman.</li>";
                }
                ?>
            </ul>
        </div>
    </main>
    <footer>
        &copy; 2024 Rental Mobil Pick Up
    </footer>
</body>
</html>
