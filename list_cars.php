<?php
include 'database.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Car ID: " . $row['id'] . "<br>";
        echo "Car Name: " . $row['car_name'] . "<br>";
        echo "Car Type: " . $row['car_type'] . "<br>";
        echo "<a href='admin.php?action=edit&id=" . $row['id'] . "'>Edit</a> | ";
        echo "<a href='admin.php?action=delete&id=" . $row['id'] . "'>Delete</a><br><br>";
    }
} else {
    echo "No cars found";
}
?>
