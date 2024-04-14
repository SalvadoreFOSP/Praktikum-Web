<?php
session_start(); // Mulai session

include 'database.php';

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
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<li><a href='user.php'>Pinjam Mobil</a></li>";
                    echo "<li><a href='logout.php'>Log Out</a></li>";
                } else {
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo "<li><a href='register.php'>Register</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Daftar Riwayat Peminjaman</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Mobil</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil riwayat peminjaman dari database
                    $sql = "SELECT rentals.*, users.username, cars.car_name FROM rentals 
                            JOIN users ON history.user_id = users.id 
                            JOIN cars ON history.car_id = cars.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["car_name"] . "</td>";
                            echo "<td>" . $row["start_date"] . "</td>";
                            echo "<td>" . $row["end_date"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada riwayat peminjaman.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        &copy; 2024 Rent a Car
    </footer>
</body>
</html>
