<?php
include "connection.php";
session_start();

if (isset($_POST['address'], $_POST['date'], $_POST['time'], $_POST['numPlants'])) {
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];
    $numPlants = $_POST['numPlants'];
    
    $sql = "insert into consultation (ID_User, ad_location, preferred, date_chosen, number_plants, type) values ('$user_id', '$address', '$time', '$date', '$numPlants', 'maintenance')";
    $conn->query($sql);
}
header("Location: maintenance.php");
?>