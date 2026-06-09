<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "SELECT * FROM cart WHERE ID_user = $user_id";
    $result = $conn->query($sql);
    $subTotal = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_type = $row['item_type'];
            $sql = "";
            if ($product_type == 'Plante') {
                $sql = "select * from plante where ID = " . $row['ID_item'];
            }
            if ($product_type == 'Bouquet') {
                $sql = "select * from bouquet where ID = " . $row['ID_item'];
            }
            $result2 = $conn->query($sql);
            if ($result2->num_rows > 0) {
                $product = $result2->fetch_assoc();
                if ($product_type == 'Plante') {
                    if ($product['ID_Categorie'] == 2) {
                        $subTotal += $product['prix_unitaire'] * $row['quantite'];
                    } else {
                        $subTotal += $product['prix'] * $row['quantite'];
                    }
                } else if ($product_type == 'Bouquet') {
                    $subTotal += $product['total'];
                }
            }
        }
    }
    $total2 = $subTotal + 3;
    $user_id = $_SESSION['user_id'];
    $sql = "select total from planting where ID_User = '$user_id' and is_paid = 'Non' group by ID_Planting";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total2 += $row['total'];
        }
    }

    $sql = "select number_plantes from maintenance where ID_User = '$user_id' and is_paid = 'Non'";
    $result = $conn->query($sql);
    $total3 = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total3 += $row['number_plantes'] * 5;
        }
    }
    $total2 += $total3;

    $code = null;
    if (isset($_POST["discountCode"])) {
        $code = $_POST["discountCode"];

        $sql = "select * from promotion where code = '$code'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $reduction = $row["valeur_reduction"];
            $date_expiration = $row["date_expiration"];
            if (time() < $date_expiration) {
                $amount_used = 0;

                $sql = "select * from commande where ID_User = '$user_id' and discount_code = '$code' group by ID_Panier";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $amount_used = $result->num_rows;
                }

                if ($row["usage_max"] < $amount_used) {
                    $totalReducted = $total2 * (100 - $reduction) / 100.0;
                } else {
                    $totalReducted = $total2;
                    $code = null;
                }
            } else {
                $totalReducted = $total2;
                $code = null;
            }
        } else {
            $totalReducted = $total2;
            $code = null;
        }
    }
    $total = $totalReducted;

    $sql = "select max(ID_Panier) as panier_max from commande where ID_User = '$user_id'";
    $result2 = $conn->query($sql);
    if ($result2->num_rows > 0) {
        $panier_max = $result2->fetch_assoc()['panier_max'] + 1;
    } else {
        $panier_max = 1;
    }

    $sql = "select total, ID_Adresse from planting where ID_User = '$user_id' and is_paid = 'Non' group by ID_Planting";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_item = $row["ID_Adresse"];
            $sql = "insert into commande (quantite, ID_item, ID_User, item_type, ID_Panier, total, name, email, phone, address, discount_code) values ('1', '$id_item', '$user_id', 'Service', '$panier_max', '$total', '$name', '$email', '$phone', '$address', '$code')";
            $conn->query($sql);
            $inserted_once = true;
        }
    }

    $sql = "select number_plantes, ID_Adresse from maintenance where ID_User = '$user_id' and is_paid = 'Non'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_item = $row["ID_Adresse"];
            $sql = "insert into commande (quantite, ID_item, ID_User, item_type, ID_Panier, total, name, email, phone, address, discount_code) values ('1', '$id_item', '$user_id', 'Maintenance', '$panier_max', '$total', '$name', '$email', '$phone', '$address', '$code')";
            $conn->query($sql);
            $inserted_once = true;
        }
    }

    $sql = "select * from cart where ID_User = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $quantite = $row["quantite"];
            $id_item = $row["ID_item"];
            $item_type = $row["item_type"];

            $sql = "insert into commande (quantite, ID_item, ID_User, item_type, ID_Panier, total, name, email, phone, address, discount_code) values ('$quantite', '$id_item', '$user_id', '$item_type', '$panier_max', '$total', '$name', '$email', '$phone', '$address', '$code')";
            $conn->query($sql);
            $inserted_once = true;
        }
    }

    $sql = "delete from cart where ID_User = '$user_id'";
    $conn->query($sql);

    $sql = "update planting set is_paid = 'Oui' where ID_User = '$user_id'";
    $conn->query($sql);

    $sql = "update maintenance set is_paid = 'Oui' where ID_User = '$user_id'";
    $conn->query($sql);
   
   $mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $mail->Username = 'thefloralatelier2026@gmail.com';
    $mail->Password = 'roua xkkk zjbx kgmp';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('thefloralatelier2026@gmail.com', 'Order Confirmed!');
    $mail->addAddress($email);

    $mail->Subject = 'Dear '.$name;
    $mail->Body = 'Thank you for ordering from The Floral Atelier , your order has been confirmed and is now being prepared. The delivery will me within 2 to 3 days.
Best regards,
The Floral Atelier: where every petal tells a story.';

    $mail->send();
    header('location:index.php');


} catch (Exception $e) {
    $mail->ErrorInfo = $e->getMessage();
}
}
?>