<table>
<?php
include "connection.php";
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
                                $sql = "SELECT * from bouquetcart where ID_User = ".$_SESSION['user_id'];
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                $sql = 'SELECT * from plante where ID = '.$row['ID_Plante'];
                                $result2 = $conn->query($sql);
                                if ($result2->num_rows > 0) {
                                    $row2 = $result2->fetch_assoc();
                                    $prix_unitaire = $row2['prix_unitaire'];
                                    $img = $row2['img'];
                                    $nom = $row2['nom'];
                                }
                                        ?>
                                <tr>
                                <td class="flower-o"><img src="<?php echo $img ?>"> <?php echo $nom ?></td>
                                <td> <?php echo $row['quantite'] ?> </td>
                                <td><?php echo $prix_unitaire ?>$</td>
                                <td><?php echo $prix_unitaire * $row['quantite'] ?>$</td>
                                <td><button class="remove" onclick="removeFromBouquet(<?php echo $row['ID'] ?>)">X</button></td>
                                </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">Your bouquet is empty. Add some flowers to it!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                                <script>
                                    var htmlToAdd = `
                                    <tr>
                                    <th>Flower</th>
                                <th>Quantity</th>
                                <th>Price per one</th>
                                <th>Total price</th>
                                <th>Remove</th>
                                </tr>
                                    ` + document.querySelector('tbody').innerHTML;
                                    window.parent.document.querySelector('#bouquetTable').innerHTML = htmlToAdd;
                                    </script>