<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<script>
    window.parent.document.querySelector('#discountInfo').textContent = "";
    window.parent.document.querySelector('#discountInfoGreen').textContent = "";
    window.parent.document.querySelector('#cartPriceTotal').style.textDecoration = "";
    window.parent.document.querySelector('#cartPriceTotal').style.opacity = "";
    window.parent.document.querySelector('#cartPriceTotalDiscount').textContent = "";
</script>
<?php

$user_id = $_SESSION['user_id'];
if (isset($_POST["code"])) {
    $code = $_POST["code"];

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

            if ($row["usage_max"] > $amount_used) {
                ?>
                <script>
                    window.parent.document.querySelector('#discountInfoGreen').textContent = "Code is valid: " + Math.round(<?php echo $reduction; ?>) + "% Discount";
                    window.parent.document.querySelector('#cartPriceTotal').style.textDecoration = "line-through";
                    window.parent.document.querySelector('#cartPriceTotal').style.opacity = "0.5";
                    var targetString = ("" + (parseFloat(window.parent.document.querySelector('#cartPriceTotal').textContent.replace("$", "")) * <?php echo (100 - $reduction) / 100.0; ?>));
                    window.parent.document.querySelector('#cartPriceTotalDiscount').textContent = "$ " +(targetString.indexOf('.')==-1?targetString:targetString.substring(0,targetString.indexOf('.')+3));
                </script>
                <?php
            } else {
                ?>
                <script>
                    window.parent.document.querySelector('#discountInfo').textContent = "Code use limit reached";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                window.parent.document.querySelector('#discountInfo').textContent = "Code has expired";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.parent.document.querySelector('#discountInfo').textContent = "Invalid code";
        </script>
        <?php
    }
}
?>