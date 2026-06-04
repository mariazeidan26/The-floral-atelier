<?php
include "connection.php";
session_start();

if (isset($_POST['bouquet_id'])) {
    $bouquet_id = $_POST['bouquet_id'];

    $sql = "delete from bouquetcart where ID = '$bouquet_id'";
    $conn->query($sql);
}
?>