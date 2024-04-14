<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];

    $sql = "UPDATE cars SET car_name='$car_name', car_type='$car_type' WHERE id=$car_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Car updated successfully');</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $car_id = $_GET['id'];
    $sql = "SELECT * FROM cars WHERE id=$car_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "0 results";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link rel="stylesheet" href="edit.css">
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
    <h2>Edit Car</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="car_id" value="<?php echo $row['id']; ?>">
        <label for="car_name">Car Name:</label><br>
        <input type="text" id="car_name" name="car_name" value="<?php echo $row['car_name']; ?>"><br><br>
        <label for="car_type">Car Type:</label><br>
        <input type="text" id="car_type" name="car_type" value="<?php echo $row['car_type']; ?>"><br><br>
        <input type="submit" value="Update Car">
    </form>
    <footer>
        &copy; 2024 Rental Mobil Pick Up
    </footer>
</body>
</html>
