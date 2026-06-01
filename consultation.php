<?php
include "connection.php";
session_start();

if (isset($_POST['address'], $_POST['date'], $_POST['time'])) {
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];

    $sql = "insert into consultation (ID_User, ad_location, preferred, date_chosen, type) values ('$user_id', '$address', '$time', '$date', 'planting')";
    $conn->query($sql);
}
header("Location: planting.php");
?>