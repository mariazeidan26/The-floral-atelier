<table>
<?php
include "connection.php";
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
                                $total = 0;
                                $sql = "SELECT * from planting where ID_User = ".$_SESSION['user_id'];
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
                                    $total += $prix_unitaire * $row['quantite'];
                                }
                                        ?>
                                                            <tr>
                        <td><img class="product-img" src="<?php echo $img ?>"></td>
                        <td><?php echo $nom ?></td>
                        <td> <?php echo $row['quantite'] ?> </td>
                        <td class="subtotal"><?php echo $prix_unitaire * $row['quantite'] ?>$</td>
                        <td><button class="remove" onclick="removeFromPlanting(<?php echo $row['ID_Adresse'] ?>)">X</button></td>
                    </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">No plants to plant.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                                <script>
                                    var htmlToAdd = document.querySelector('tbody').innerHTML;
                                    window.parent.document.querySelector('#plantingTableBody').innerHTML = htmlToAdd;
                                    window.parent.document.querySelector('#plantingTotal').innerText = "$<?php echo $total ?>";
                                    </script>