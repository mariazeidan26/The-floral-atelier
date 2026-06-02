<?php
include 'connection.php';
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM cart WHERE ID = $product_id";
    $conn->query($sql);
}
?>