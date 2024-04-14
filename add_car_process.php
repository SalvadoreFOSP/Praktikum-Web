<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];

    $sql = "INSERT INTO cars (car_name, car_type) VALUES ('$car_name', '$car_type')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Car added successfully');</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
