<head>
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css?v=1">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Bootstrap Script -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <!--slideshow-->
    <meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <?php
    include 'connection.php';
session_start();
        include 'nav.php';

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $searchSplit = explode(" ", $search);
    $sql = "select * from plante where nom like '%$searchSplit[0]%'";
    $i = 0;
    foreach ($searchSplit as $word) {
        if ($i == 0) {
            $i = 1;
            continue;
        }
        $sql .= " or nom like '%$word%'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <h1>Search results for "<?php echo $search ?>"</h1>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="<?php echo $row['statut'] == 'Available' ? 'product' : 'product unavailable' ?>">
                <img src="<?php echo $row['img'] ?>">
                <h4> <?php echo $row['nom'] ?> <button class="info-btn" onclick="toggleInfo(this)"> i </button> </h4>
                <p><?php echo $row['prix'] ?>$</p>
                <p class="description"> <?php echo $row['details'] ?> </p>

                <input type="number" min="1" value="1">

 <div class="buttons">
                    <div class="row">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                                <button class="buy" onclick="addToCart(<?php echo $row['ID'] ?>, this.parentNode.parentNode.parentNode.querySelector('input[type=\'number\']').value)"> Buy</button>
                            <?php
                        }
                        else {
                            ?>
                            <button class="buy" onclick="confirmRedirect()"> Buy</button>
                            <?php
                        }
                        ?>
                          <?php
                          if ($row['ID_Categorie'] != 2) {
                        if (isset($_SESSION['user_id'])) {
                            ?>
                        <button class="plant" onclick="addToPlanting(<?php echo $row['ID'] ?>, this.parentNode.parentNode.parentNode.querySelector('input[type=\'number\']').value)"> Plant</button>
                            <?php
                        }
                        else {
                            ?>
                            <button class="plant" onclick="confirmRedirect()">Plant</button>
                            <?php
                        }
                          }
                        ?>
                    </div>
                     <?php
                     if ($row['ID_Categorie'] == 3) {
                        if (isset($_SESSION['user_id'])) {
                            ?>
                        <button class="customize" onclick="addToBouquet(<?php echo $row['ID'] ?>, this.parentNode.parentNode.querySelector('input[type=number]').value)"> Add to your bouquet</button>
                            <?php
                        }
                        else {
                            ?>
                            <button class="customize" onclick="confirmRedirect()">Add to your bouquet</button>
                            <?php
                        }
        }
                        ?>
                </div>
                 <p> <?php echo $row['statut'] ?> </p>
            </div>
            <?php
        }
    } else {
        ?>
        <h2>No results found.</h2>
        <?php
    }
}
             ?>

<script src="login.js?v=9"></script>
</body>
</html>