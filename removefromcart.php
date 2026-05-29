<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request";
    exit;
}

$product_id = $_POST["id"] ?? null;

if (!$product_id) {
    echo "No product ID";
    exit;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// find and remove the item
foreach ($_SESSION["cart"] as $key => $id) {
    if ($id == $product_id) {
        unset($_SESSION["cart"][$key]);
    }
}

// reindex array (clean up indexes)
$_SESSION["cart"] = array_values($_SESSION["cart"]);

echo "Product removed";
?>