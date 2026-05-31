<?php
if (gethostname() === "fedora" || file_exists("/home/joetrak")) {
    $conn = new mysqli('localhost', 'Floral_Atelier', 'MFA021', 'floral_atelier');
} else {
    $conn = new mysqli('localhost', 'root', '', 'floral_atelier');
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
