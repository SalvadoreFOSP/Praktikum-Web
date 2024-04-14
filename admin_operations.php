<?php
include 'database.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'add':
        include 'add_car.php';
        break;
    case 'edit':
        include 'edit_car.php';
        break;
    case 'delete':
        include 'delete_car.php';
        break;
    default:
        include 'list_cars.php';
}
?>
