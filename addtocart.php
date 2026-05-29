<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request";
    exit;
}

$product_id = $_POST["id"] ?? null;

if (!$product_id) {
    echo "No product ID received";
    exit;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}
$_SESSION["cart"][] = $product_id;

echo "Product added successfully";
?>