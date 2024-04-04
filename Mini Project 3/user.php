<?php
session_start(); // Memulai session

// Kemudian lakukan pemeriksaan session atau operasi lainnya
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <header>
        <h1>User Panel</h1>
        <nav>
            <ul>
                <li><a href="user.php">Rent a Car</a></li>
                <li><a href="history.php">Riwayat Peminjaman</a></li>
                <li><a href="#" id="logout">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Rent a Car</h2>
        <form action="rent_process.php" method="post">
            <label for="car_id">Select Car:</label>
            <select name="car_id" id="car_id">
                <?php
                include 'database.php';
                $sql = "SELECT * FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['car_name'] . " - " . $row['car_type'] . "</option>";
                    }
                }
                ?>
            </select>
            <label for="price">Price per Day:</label>
            <input type="text" id="price" name="price" value="400000" readonly>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" onchange="calculateTotal()" required>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" onchange="calculateTotal()" required>
            <label for="total_price">Total Price:</label>
            <input type="text" id="total_price" name="total_price" readonly>
            <input type="submit" value="Rent Car">
        </form>
    </main>
    <footer>
        &copy; 2024 Rental Mobil Pick Up
    </footer>
    <script>
        document.getElementById('logout').addEventListener('click', function() {
            if(confirm('Are you sure you want to log out?')) {
                window.location.href = 'logout.php';
            }
        });
    </script>

    <script src="script.js"></script>
</body>
</html>
