<?php
include "connection.php";
session_start();

if (isset($_POST['id'], $_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];

    $sql = "insert into planting (ID_User, ID_Plante, quantite) values ('$user_id', '$id', '$quantity')";
    $conn->query($sql);
}
?>