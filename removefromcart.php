<?php
session_start();

$product_id = $_POST["id"] ?? null;

if (!$product_id) {
    echo "No product ID received";
    exit;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// remove only one match
foreach ($_SESSION["cart"] as $key => $id) {
    if ($id == $product_id) {
        unset($_SESSION["cart"][$key]);
        break; // IMPORTANT: stop after removing one
    }
}

$_SESSION["cart"] = array_values($_SESSION["cart"]);

echo "removed";
?>