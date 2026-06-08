<?php
include "connection.php";
session_start();

if (isset($_POST["address"], $_POST["date"], $_POST["time"])) {
    $address = $_POST["address"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $user_id = $_SESSION["user_id"];

    $sql = "select number_plants from consultation where ID_User = '$user_id' and type = 'maintenance'";
    $result = $conn->query($sql);
    $num_plants = 1;
    if ($result->num_rows > 0) {
        $num_plants = $result->fetch_assoc()["number_plants"];
    }

    $sql = "insert into maintenance (adresse, m_date, time, ID_User, number_plantes) values ('$address', '$date', '$time', '$user_id', '$num_plants')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maintenance Service Booking</title>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Bootstrap Script -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .navbar-inverse {
            background-color: #f7f3ee !important;
            border: none !important;
        }
        
        body {
            background-color: #f7f3ee !important;
        }
        
        nav a {
            color: #1c1b1a !important;
        }
        
        .navbar-brand {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            letter-spacing: 2px;
            font-weight: 400;
            font-size: 23px !important;
            color: #A10035 !important;
        }
        
        .navbar {
            margin-bottom: 0 !important;
        }
        
        header {
            height: 400px;
            background-image: url(https://www.elitetreecare.com/wp-content/uploads/2021/04/Earth-day-scaled.jpg);
            border-radius: 20px;
            background-repeat: no-repeat;
            background-size: 50%;
            background-position: right;
            background-color: #f0eae2;
        }
        
        h1 {
            font-family: serif;
            /*font-style: italic;*/
            letter-spacing: 2px;
            font-weight: 400;
            font-size: 70px !important;
            margin-left: 60px;
            text-shadow: 2px 2px 5px white !important;
        }
        
        .dropdown button {
            color: #A10035 !important;
            background-color: #f7f3ee!important;
            border: 2px solid #A10035 !important;
            border-radius: 30px !important;
            padding: 14px 20px !important;
            font-size: 18px !important;
            font-family: 'Playfair Display', serif !important;
            transition: all 0.35s ease;
        }
        
        .dropdown-menu {
            background-color: #f0eae2!important;
            padding: 14px;
            border-radius: 30px;
        }
        
        .dropdown-menu li a:hover {
            color: #A10035;
            background-color: #f7f3ee;
        }
        
        .dropdown-menu li a {
            font-size: 16px;
            color: #1c1b1a;
        }
        
        h2 {
            font-family: serif;
            letter-spacing: 2px;
            font-weight: 200;
            font-size: 30px !important;
            margin-top: 20px;
            text-align: center;
        }
        
        .container {
            max-width: 100%;
            margin: auto;
            padding: 40px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px #eee;
        }
        
        th,
        td {
            padding: 15px;
            text-align: center;
        }
        
        th {
            background-color: #f0eae2;
            color: #1c1b1a;
        }
        
        .product-img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
        }
        
        .remove {
            background-color: #ffdddd;
            color: lightcoral;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
        }
        
        input,
        select {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        
        .booking-section {
            max-width: 700px;
            margin: 50px auto;
            padding: 0 20px 60px;
        }
        
        .booking-step {
            background: #fff;
            border-radius: 18px;
            padding: 32px;
            margin-bottom: 7px;
            position: relative;
        }
        
        .steps {
            display: inline-block;
            background: #A10035;
            color: #f7f3ee;
            border-radius: 20px;
            padding: 4px 16px;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }
        
        .booking-step p.t {
            color: #888;
            font-size: 14px;
            margin-bottom: 24px;
            margin-top: 10px;
            font-style: italic;
            margin-left: 80px;
        }
        
        .form-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        
        .form-group label {
            font-size: 15px;
            color: #A10035;
            letter-spacing: 1px;
        }
        
        .booking-btn {
            background-color: #A10035;
            color: #f7f3ee;
            border: none;
            border-radius: 30px;
            padding: 13px 40px;
            font-size: 17px;
            font-family: 'EB Garamond', serif;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .booking-btn:hover {
            color: #A10035;
            background-color: #f7f3ee;
        }
        
        .btn-book:hover {
            background-color: #A10035;
        }
        
        .form-group select {
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 15px;
            font-family: 'EB Garamond', serif;
            color: #1c1b1a;
            background: #faf8f5;
            outline: none;
            transition: border 0.25s;
        }
        
        .form-group select:focus {
            border-color: #1c1b1a;
        }
        
        .booking-step.locked {
            opacity: 0.5;
            pointer-events: none;
        }
        
        .footer-bottom {
            text-align: center;
        }
        /*why us section*/
        
        .why-section {
            padding: 40px 20px;
        }
        
        .why-card .icon {
            font-size: 28px;
            color: #A10035;
            margin-bottom: 14px;
        }
        
        .why-card h4 {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 8px;
            text-align: center;
        }
        
        .why-card {
            text-align: center;
            padding: 30px 24px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 1500px) {
            header {
                height: auto;
                background-size: 100%;
                background-position: center;
                color: #f0eae2;
                height: 280px;
            }
            h1 {
                font-size: 42px !important;
                margin-left: 20px;
                text-shadow: 2px 2px 5px black !important;
            }
        }
    </style>



</head>

<body>

    <?php
    include "nav.php";
    ?>
    <header>
        <h1> <br>MAINTENANCE <br> SERVICE </h1>
    </header>
    <br>
    <section>
        <h2>What we offer?</h2>
        <hr>

        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="glyphicon glyphicon-tint icon"></span>
                        <h4>Watering</h4>
                        <p>We provide scheduled, precise watering tailored to each plant</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-seedling icon"></span>
                        <h4>Nutrients</h4>
                        <p>Our experts apply the right fertilizers and soil nutrients at the right time to support plant growth</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-leaf icon"></span>
                        <h4>Pesticides</h4>
                        <p>We protect your plants from pests and diseases</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="glyphicon glyphicon-scissors icon"></span>
                        <h4>Pruning</h4>
                        <p>Regular trimming and shaping keeps your plant healthy and encourages growth</p>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <form method="POST" action="maintenanceAdd.php">

        <div class="booking-section">
            <div class="booking-step <?php
        include 'connection.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user_id'])) {
        $sql = 'select * from consultation where ID_User = '.$_SESSION['user_id'].' and type like "maintenance"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "locked";
            $locked = true;
        }
        } else {
            echo "locked";
            $locked = true;
        }
        ?>" id="step1">
                <span class="steps">Step 1</span>
                <h2>Book the first visit</h2>
                <p class="t">Our team will visit your space, assess your plants, and recommend a care plan --all for free.</p>

                <div class="form-row">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="c-address">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Number of plants</label>
                        <input type="number" name="numPlants" id="s1-pnb" min="1">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group">
                        <label>Pick a date</label>
                        <input type="date" name="date" id="c-date">
                    </div>

                    <div class="form-group">
                        <label>Preferred time</label>
                        <select name="time" id="c-time">
                            <option>8:00 AM</option>
                            <option>9:00 AM</option>
                            <option>10:00 AM</option>
                            <option>11:00 AM</option>
                            <option>12:00 PM</option>
                            <option>1:00 PM</option>
                            <option>2:00 PM</option>
                            <option>3:00 PM</option>
                            <option>4:00 PM</option>
                            <option>5:00 PM</option>
                        </select>
                    </div>
                </div>
                <input class="booking-btn" type="submit" value="Book">

            </div>
        </div>

    </form>
    <form method="POST" action="maintenance.php" id="maintenanceForm">
        <div class="booking-section">
            <div class="booking-step <?php
            include "connection.php";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['user_id'])) {
        $sql = 'select * from consultation where ID_User = '.$_SESSION['user_id'].' and type like "maintenance" and confirmed = "Oui"';
            $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "locked";
            $locked = true;
        }
        } else {
            echo "locked";
            $locked = true;
        }
            ?>" id="step2">
                <span class="steps">Step 2</span>
                <h2>Choose a plan and book</h2>
                <br> <br>


                <div class="form-row">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" id="p-address" name="address" placeholder="Auto-filled from consultation" value="<?php
                        if (isset($result)) {
                        $result_fetch = $result->fetch_assoc();
                        if($result->num_rows>0){
                        echo $result_fetch['ad_location'];
                        }
                        }
                        ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Pick a date</label>
                        <input type="date" name="date" id="p-date">
                    </div>
                    <div class="form-group">
                        <label>Preferred time</label>
                        <select id="p-time" name="time">
                            <option>8:00 AM</option>
                            <option>9:00 AM</option>
                            <option>10:00 AM</option>
                            <option>11:00 AM</option>
                            <option>12:00 PM</option>
                            <option>1:00 PM</option>
                            <option>2:00 PM</option>
                            <option>3:00 PM</option>
                            <option>4:00 PM</option>
                            <option>5:00 PM</option>
                        </select>
                    </div>
                </div>
                <p>Total Cost: $<span id="totalPrice"><?php
                if (isset($result_fetch)) {
                    echo $result_fetch["number_plants"] * 5;
                } else {
                    echo "0";
                }
                ?></span></p>


                <button class="booking-btn">Confirm booking</button>
            </div>


        </div>

    </form>





    <footer>


        <div class="footer-bottom">
            <p>📍 Lebanon</p>
            <p> &copy; 2026 The Floral Atelier. All rights deserved.</p>

        </div>
    </footer>


</body>

</html>