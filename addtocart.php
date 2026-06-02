<?php
include "connection.php";
session_start();

if (isset($_POST['id'], $_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];

    $sql = "insert into cart (ID_item, item_type, ID_user, quantite) values ('$id', 'Plante', '$user_id', '$quantity')";
    $conn->query($sql);
}
?>