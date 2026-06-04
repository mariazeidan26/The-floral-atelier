<?php
include "connection.php";
session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "select * from bouquetcart where ID_User = '$user_id'";
    $result = $conn->query($sql);

    $total = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['ID_Plante'];
            $sql2 = "select * from plante where ID = '$id'";
            $result2 = $conn->query($sql2);
            $total += $result2->fetch_assoc()['prix_unitaire'] * $row['quantite'];
        }
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "select max(ID_Bouquet) as bouquet_max from bouquet where ID_User = '$user_id'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            $bouquet_max = $result2->fetch_assoc()['bouquet_max'] + 1;
        } else {
            $bouquet_max = 1;
        }
        while ($row = $result->fetch_assoc()) {
            $quantite = $row["quantite"];
            $id_plante = $row["ID_Plante"];
            $sql = "insert into bouquet (quantite, ID_Plante, ID_User, total, ID_Bouquet) values ('$quantite', '$id_plante', '$user_id', '$total', '$bouquet_max')";
            $conn->query($sql);
        }
    }

    $sql = "delete from bouquetcart where ID_User = '$user_id'";
    $conn->query($sql);

    $sql = "insert into cart (ID_item, item_type, ID_user, quantite) values ('$bouquet_max', 'Bouquet', '$user_id', 1)";
    $conn->query($sql);
?>