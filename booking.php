<?php
include "connection.php";
session_start();
if (isset($_POST['address'], $_POST['date'], $_POST['time'], $_POST['total'])) {
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $total = $_POST['total'];
    $user_id = $_SESSION['user_id'];

    $sql = "select * from plantingcart where ID_User = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "select max(ID_Planting) as planting_max from planting where ID_User = '$user_id'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            $planting_max = $result2->fetch_assoc()['planting_max'] + 1;
        } else {
            $planting_max = 1;
        }
        while ($row = $result->fetch_assoc()) {
            $quantite = $row["quantite"];
            $id_plante = $row["ID_Plante"];
            $sql = "insert into planting (quantite, ID_Plante, ID_User, total, ID_Planting) values ('$quantite', '$id_plante', '$user_id', '$total', '$planting_max')";
            $conn->query($sql);
        }
    }

    $sql = "delete from plantingcart where ID_User = '$user_id'";
    $conn->query($sql);
}

header("Location: planting.php");
?>