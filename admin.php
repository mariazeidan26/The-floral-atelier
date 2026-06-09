<?php
include "connection.php";
session_start();

$sql = "select ID from users where is_admin = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["ID"] == $_SESSION["user_id"]) {
            $is_admin = true;
        }
    }
}

if (!isset($is_admin)) {
    header("Location: index.php");
}

if (isset($_POST["table"])) {
    $table = $_POST["table"];

    if ($table == "plante") {
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $statut = $_POST["statut"];
        $ID_Categorie = $_POST["ID_Categorie"];
        if (isset($_POST["prix_unitaire"]))
            $prix_unitaire = $_POST["prix_unitaire"];
        else
            $prix_unitaire = $prix;
        $details = $_POST["details"];
        $quantite = $_POST["quantite"];
        $img = $_POST["img"];

        $sql = "insert into plante (nom, prix, statut, ID_Categorie, prix_unitaire, details, quantite, img) values ('$nom', '$prix', '$statut', '$ID_Categorie', '$prix_unitaire', '$details', '$quantite', '$img')";
        $conn->query($sql);
    } else if ($table == "plante_remove") {
        $id = $_POST["ID"];

        $sql = "delete from plante where ID = '$id'";
        $conn->query($sql);
    } else if ($table == "plante_edit") {
        $id = $_POST["ID"];
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $statut = $_POST["statut"];
        $ID_Categorie = $_POST["ID_Categorie"];
        if (isset($_POST["prix_unitaire"]))
            $prix_unitaire = $_POST["prix_unitaire"];
        else
            $prix_unitaire = $prix;
        $details = $_POST["details"];
        $quantite = $_POST["quantite"];
        $img = $_POST["img"];

        $sql = "update plante set nom = '$nom', prix = '$prix', statut = '$statut', ID_Categorie = '$ID_Categorie', prix_unitaire = '$prix_unitaire', details = '$details', quantite = '$quantite', img = '$img' where ID = '$id'";
        $conn->query($sql);
    }

    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            display: flex;
            background-color: #f7f3ee;
        }
        
        .sidebar {
            width: 250px;
            height: 100%;
            background: #A10035;
            color: white;
            padding: 20px;
            position: fixed;
        }
        
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .sidebar a {
            display: block;
            padding: 12px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        
        .sidebar a:hover {
            background-color: #f7f3ee;
            color: black;
        }
        
        .main {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            overflow-x: auto;
            margin-bottom: 20px;
        }
        
        .card h3 {
            margin-bottom: 15px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
        }
        
        .available {
            background: green;
        }
        
        .out {
            background: red;
        }
        
        .pending {
            background: orange;
        }
        
        .delivered,
        .completed {
            background: blue;
        }
        
        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            margin: 2px;
        }
        
        .add {
            background: #2ecc71;
            color: white;
        }
        
        .edit {
            background: #3498db;
            color: white;
        }
        
        .delete {
            background: #A10035;
            color: white;
        }
        
        .card input,
        .card select {
            width: 100%;
            padding: 6px;
            margin: 5px 0;
        }
        
        .details {
            background: #f1f2f6;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 13px;
        }
        
        @media (max-width:600px) {
            .grid {
                grid-template-columns: 1fr;
            }
            .sidebar {
                display: none;
            }
            .main {
                margin-left: 0;
            }
        }
        
        .grid {
            display: block;
        }
        
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>


    <div class="sidebar">
        <h2>Admin</h2>
        <a href="#prod">Products</a>
        <a href="#pc">Planting Consultations</a>
        <a href="#mc">Maintenance Consultations</a>
        <a href="#pb">Planting bookings</a>
        <a href="#mb">Maintenance bookings</a>
        <a href="#of">Order fullfilment</a>
        <a href="#users">Customer database</a>
        <a href="#discount">Discounts</a>
        <a href="#payment">Payments</a>
        <a href="#rnr">Returns and refunds</a>
        <a href="#rnf">Reviews and feedbacks</a>
        <a href="#security">Security</a>
    </div>

<div class="main">

        <div class="grid" id="prod">

            <!-- PRODUCTS -->
            <form class="card" method="POST">
                <h3>Products</h3>

                <input type="text" id="plante_nom_i" name="nom" placeholder="Product name">
                <select id="plante_categorie_i" name="ID_Categorie"
                    onchange="document.querySelector('#plante_prix_u_i').disabled = this.value != '3'">
                    <?php
                    $sql = "select * from categorie";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $nom = $row["nom"];
                            ?>
                            <option value="<?php echo $id ?>"><?php echo $nom ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <input type="text" id="plante_prix_i" name="prix" placeholder="Price">
                <input type="text" id="plante_prix_u_i" name="prix_unitaire" placeholder="Unitary Price" disabled>
                <input type="text" id="plante_details_i" name="details" placeholder="Details">
                <input type="number" id="plante_quantite_i" name="quantite" placeholder="Quantity">
                <select name="statut" id="plante_statut_i">
                    <option>Available</option>
                    <option>Out of Stock</option>
                </select>
                <input type="text" id="plante_img_i" name="img" placeholder="Image Link"
                    onchange="document.querySelector('#previewImg').src = this.value">
                <img src="" id="previewImg" style="width: 150px; height:150px"><br>

                <input type="hidden" name="table" id="planteTable" value="plante">
                <input type="hidden" name="ID" id="plante_id" value="-1">
                <button class="btn add" id="planteAdd" type="submit">Add Product</button>

                <table>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Unitary Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                    $sql = "select * from plante";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td id="plante_img"><img style="width: 50px; height: 50px"
                                        src="<?php echo $row['img'] ?>"><br><?php echo $row['img'] ?></td>
                                <td id="plante_nom"><?php echo $row["nom"] ?></td>
                                <td id="plante_details"><?php echo $row["details"] ?></td>
                                <td id="plante_categorie"><?php
                                $id = $row["ID_Categorie"];
                                $sql = "select nom from categorie where ID = '$id'";
                                $result2 = $conn->query($sql);
                                if ($result2->num_rows > 0) {
                                    echo $result2->fetch_assoc()["nom"];
                                }
                                ?></td>
                                <td id="plante_prix"><?php echo $row["prix"] ?></td>
                                <td id="plante_prix_u"><?php echo $row["prix_unitaire"] != null ? $row["prix_unitaire"] : "-" ?>
                                </td>
                                <td id="plante_quantite"><?php echo $row["quantite"] ?></td>
                                <?php
                                if ($row["statut"] == "Available") {
                                    ?>
                                    <td id="plante_statut"><span class="status available">Available</span></td>
                                    <?php
                                } else {
                                    ?>
                                    <td id="plante_statut"><span class="status out">Out of Stock</span></td>
                                    <?php
                                }
                                ?>
                                <td>
                                    <button class="btn edit" type="button" id="<?php echo $row['ID'] ?>" onclick="document.querySelector('#planteTable').value = 'plante_edit';
                                        document.querySelector('#plante_nom_i').value = this.parentNode.parentNode.querySelector('#plante_nom').textContent;
                                        document.querySelector('#plante_details_i').value = this.parentNode.parentNode.querySelector('#plante_details').textContent;
                                        for (var node of document.querySelector('#plante_categorie_i').childNodes) {
                                        if (node.textContent == this.parentNode.parentNode.querySelector('#plante_categorie').textContent) {
                                        document.querySelector('#plante_categorie_i').value = node.value;
                                        document.querySelector('#plante_prix_u_i').disabled = node.value != '3';
                                        }
                                        }
                                        document.querySelector('#plante_prix_i').value = this.parentNode.parentNode.querySelector('#plante_prix').textContent;
                                        document.querySelector('#plante_prix_u_i').value = this.parentNode.parentNode.querySelector('#plante_prix_u').textContent.trim();
                                        document.querySelector('#plante_quantite_i').value = this.parentNode.parentNode.querySelector('#plante_quantite').textContent;
                                        document.querySelector('#plante_img_i').value = this.parentNode.parentNode.querySelector('#plante_img').textContent;
                                        document.querySelector('#previewImg').src = document.querySelector('#plante_img_i').value;
                                        document.querySelector('#planteAdd').className = 'btn edit';
                                        document.querySelector('#planteAdd').textContent = 'Edit Product';
                                        document.querySelector('#plante_id').value = this.id;
                                        ">Edit</button>
                                    <button class="btn delete" id="<?php echo $row['ID'] ?>" type="submit" onclick="document.querySelector('#planteTable').value = 'plante_remove';
                                        document.querySelector('#plante_id').value = this.id;">Remove</button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </form>

            <!--Consultations-->
            <div class="card" id="pc">
                <h3>Planting consultations</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>

                        <th>Address</th>
                        <th>Date</th>
                        <th>Time</th>

                        <th>status</th>

                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>

                        <td>Jounieh</td>
                        <td>2026-06-15</td>
                        <td>10:00AM</td>
                        <td><span class="status pending">Pending</span></td>

                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Confirm</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="card" id="mc">
                <h3>Maintenance consultations</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>

                        <th>Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Plants number</th>

                        <th>status</th>

                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>

                        <td>Jounieh</td>
                        <td>2026-06-20</td>
                        <td>10:00AM</td>
                        <td>30</td>
                        <td><span class="status pending">Pending</span></td>

                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Confirm</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>
            </div>





            <!--Planting service booking-->
            <div class="card" id="pb">
                <h3>Planting service booking</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>

                        <th>Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Total ($)</th>

                        <th>status</th>

                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>

                        <td>Jounieh</td>
                        <td>2026-06-15</td>
                        <td>10:00AM</td>
                        <td>150$</td>
                        <td><span class="status pending">Pending</span></td>

                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Confirm</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>
            </div>


            <!--Maintenance service booking-->
            <div class="card" id="mb">
                <h3>Maintenance service booking</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>

                        <th>Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Plants number</th>
                        <th>Total ($)</th>

                        <th>status</th>

                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>

                        <td>Jounieh</td>
                        <td>2026-06-15</td>
                        <td>10:00AM</td>
                        <td>30</td>
                        <td>150$</td>
                        <td><span class="status pending">Pending</span></td>

                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Confirm</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>
            </div>




























            <!-- ORDERS -->
            <div class="card" id="of">
                <h3>Order Fulfilment</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Delivered</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>

                    <tr>
                        <td>#102</td>
                        <td>Johnny</td>
                        <td><span class="status delivered">delivered</span></td>
                        <td>
                            <select>
                                <option>Pending</option>
                                
                                <option>Delivered</option>
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- CUSTOMERS -->
            <div class="card" id="users">
                <h3>Customer database</h3>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <button class="btn add">Add User</button>


                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>
                        <td>Lea@gmail.com</td>
                        <td>
                            <button class="btn edit">Profile</button>
                            <button class="btn delete">Remove</button>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="details">
                                <strong>Registration:</strong> April 2026<br>
                                <strong>Total Orders:</strong>2<br>
                                <strong>Order History:</strong><br> - #101 (Pending)<br> - #082 (Delivered)
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- MARKETING -->
            <div class="card" id="discount">
                <h3>Discounts</h3>
                <input type="text" placeholder="Discount code">
                <input type="number" placeholder="%">
                <button class="btn add">Create</button>
                <br>
                <br>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Staff50</td>
                        <td>50%</td>
                        <td>
                            <button class="btn delete">Remove</button> </td>

                    </tr>
                </table>
            </div>

            <!-- PAYMENTS -->
            <div class="card" id="payment">
                <h3>Payments</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>

                    <tr>
                        <td>#101</td>
                        <td>Lea</td>
                        <td>$10</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>
                            <select>
                                <option>Pending</option>
                                <option>completed</option>
                                
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>

                    <tr>
                        <td>#083</td>
                        <td>Layla</td>
                        <td>$20</td>
                        <td><span class="status completed">Completed</span></td>
                        <td>
                            <select>
                                <option>Pending</option>
                                <option>completed</option>
                                
                            </select>
                            <button class="btn edit">Update</button>
                        </td>
                    </tr>
                </table>


            </div>

            <!-- RETURNS -->
            <div class="card" id="rnr">
                <h3>Returns and refunds</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>#083</td>
                        <td>Layla</td>
                        <td>Damaged item</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>
                            <button class="btn edit">Edit</button>

                        </td>
                    </tr>

                    <tr>
                        <td>#102</td>
                        <td>Johnny</td>
                        <td>Wrong item</td>
                        <td><span class="status delivered">Refunded</span></td>
                        <td>
                            <button class="btn edit">Edit</button>
                        </td>
                    </tr>
                </table>

                <br>
                <h4>Process refund</h4>
                <input type="text" placeholder="Order ID">
                <input type="text" placeholder="Reason">
                <select>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
                <button class="btn add">Submit</button>


            </div>

            <!--Reviews and feedbacks-->
            <div class="card" id="rnf">

                <h3>Reviews and feedbacks</h3>
                <table>
                    <tr>
                        <th>user</th>
                        <th>rating</th>
                        <th>feedback</th>
                    </tr>

                    <tr>
                        <td> clara </td>
                        <td>⭐⭐⭐⭐⭐</td>
                        <td>The service was amazing and fast</td>
                    </tr>
                </table>

            </div>

            <!-- SECURITY -->
            <div class="card" id="security">
                <h3>Security</h3>
                <p><strong>Access:</strong>Admin</p>
                <br>
                <h4> Recent Activity:</h4>
                <ul>
                    <li>updated products</li>
                </ul>
            </div>

        </div>
    </div>


</body>

</html>