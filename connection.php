<?php
$conn = new mysqli('localhost', 'root', '', 'floral_atelier');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>