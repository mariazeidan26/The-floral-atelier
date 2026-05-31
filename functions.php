<?php 
function clean($nettoie)
{
    $nettoie = trim($nettoie);
    $nettoie = stripslashes($nettoie);
    $nettoie = htmlspecialchars($nettoie);
    if ($nettoie === "") {
        die('valeur vide');
    }
    return $nettoie;}
function passwordchec($pass){
    
}
?>