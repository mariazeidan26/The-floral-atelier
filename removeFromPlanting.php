<?php
include "connection.php";
session_start();

if (isset($_POST['planting_id'])) {
    $planting_id = $_POST['planting_id'];

    $sql = "delete from planting where ID_Adresse = '$planting_id'";
    $conn->query($sql);
}
?>