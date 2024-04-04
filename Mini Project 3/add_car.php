<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="admin.php">Cars</a></li>
                <li><a href="add_car.php">Add Car</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Add Car</h2>
        <form action="add_car_process.php" method="post">
            <label for="car_name">Car Name:</label><br>
            <input type="text" id="car_name" name="car_name" required><br><br>
            <label for="car_type">Car Type:</label><br>
            <input type="text" id="car_type" name="car_type" required><br><br>
            <input type="submit" value="Add Car">
        </form>
    </main>
    <footer>
        &copy; 2024 Rental Mobil Pick Up
    </footer>
</body>
</html>
