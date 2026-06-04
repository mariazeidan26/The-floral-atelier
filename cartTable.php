<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<table class="table table-centered mb-0 table-nowrap">
    <thead>
        <tr>
            <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
            <th class="border-top-0" scope="col">Product Description</th>
            <th class="border-top-0" scope="col">Price</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $user_id = $_SESSION['user_id'];
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

                        ?>
                    <tr>
                        <th scope="row"><img src="<?php echo $product['img']; ?>" alt="product-img" title="product-img"
                                class="avatar-lg rounded"></th>
                        <td>
                            <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark"> <?php echo $product['nom']; ?></a>
                            </h5>


                            <a href="#" class="text-muted px-1">
                                <p>Quantity: <?php echo $row['quantite']; ?></p>

                                <i class="mdi mdi-trash-can-outline" onclick="removeFromCart(<?php echo $row['ID']; ?>)"> </i>
                            </a>
                            <p class="text-muted mb-0 mt-1">
                                $<?php echo $product['ID_Categorie'] == 2 ? $product['prix_unitaire'] : $product['prix']; ?> *
                                <?php echo $row['quantite']; ?></p>
                        </td>
                        <td>$<?php echo ($product['ID_Categorie'] == 2 ? $product['prix_unitaire'] : $product['prix']) * $row['quantite']; ?>
                        </td>


                    </tr>
                    <?php
                    } else if ($product_type == 'Bouquet') {
                        $subTotal += $product['total'];
                        ?>
                    <tr>
                        <td></td>
                        <td>
                            <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark"> Custom bouquet</a>
                            </h5>


                            <a href="#" class="text-muted px-1">

                                <i class="mdi mdi-trash-can-outline" onclick="removeFromCart(<?php echo $row['ID']; ?>)"> </i>
                            </a>
                            <p class="text-muted mb-0 mt-1">
                        </td>
                        <td>$<?php echo $product['total'] ?>
                        </td>


                    </tr>
                    <?php
                    }
                }
                ?>

                <?php
            }
        } else {
            echo '<tr><td colspan="3">Your cart is empty.</td></tr>';
        }
        ?>
        <tr>
            <td colspan="2">
                <h5 class="font-size-14 m-0">Sub Total :</h5>
            </td>
            <td>
                $<?php echo $subTotal; ?>
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <h5 class="font-size-14 m-0">Shipping Charge :</h5>
            </td>
            <td>
                $3
            </td>
        </tr>


        <tr class="bg-light">
            <td colspan="2">
                <h5 class="font-size-14 m-0">Total:</h5>
            </td>
            <td>
                $<?php echo $subTotal + 3 ?>
            </td>
        </tr>
    </tbody>
</table>
<script>
    var htmlToAdd = document.querySelector('table').innerHTML;
    window.parent.document.querySelector('#cartTable').innerHTML = htmlToAdd;
    displayBooking(window.parent.document);
</script>