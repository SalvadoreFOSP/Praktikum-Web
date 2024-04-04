<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil Pick Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Rental Mobil Pick Up</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Available Cars</h2>
        <div class="car-list">
            <?php
            include 'database.php';
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='car'>";
                    echo "<h3>" . $row["car_name"] . "</h3>";
                    echo "<p>Type: " . $row["car_type"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No cars available";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        &copy; 2024 Rental Mobil Pick Up
    </footer>
</body>
</html>
