<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="admin.php">Cars</a></li>
                <li><a href="add_car.php">Add Car</a></li>
                <li><a href="#" id="logout">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Cars List</h2>
        <table>
            <tr>
                <th>Car Name</th>
                <th>Car Type</th>
                <th>Action</th>
            </tr>
            <?php
            include 'database.php';
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["car_name"] . "</td>";
                    echo "<td>" . $row["car_type"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_car.php?id=" . $row["id"] . "'>Edit</a>";
                    echo " | ";
                    echo "<a href='delete_car.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No cars found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
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
</body>
</html>

