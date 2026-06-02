<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Planting Service Booking</title>
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
            background-image: url(css/l.jpeg);
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
        
        #applyFilters {
            background-color: #A10035!important;
            color: #f7f3ee !important;
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
        
        .filters-section {
            background-color: #f0eae2;
        }
        
        h2 {
            font-family: serif;
            letter-spacing: 2px;
            font-weight: 200;
            font-size: 30px !important;
            text-shadow: #1c1b1a;
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
                height: 280px;
                background-size: 100%;
                background-position: bottom center;
                color: #f0eae2;
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

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <p class="navbar-brand"> The floral atelier </p>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"> Home </a> </li>
                    <li><a href="index.php#categories"> Categories </a> </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li> <a class="nav-link" href="cart.php"> 🛒 <span id="cartcount">0</span> </a> </li>
                    <li>
                        <a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign up </a>
                    </li>
                    <li>
                        <a href="login.php"> <span class="glyphicon glyphicon-log-in"></span> Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <h1> <br>PLANTING <br> SERVICE </h1>
    </header>
    <br>
    <section>
        <h2>Why choose us?</h2>
        <hr>

        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-seedling icon"></span>
                        <h4>Expert planters</h4>
                        <p>Our team bring years of expertise to every project</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-handshake icon"></span>
                        <h4>Free consultation</h4>
                        <p>We visit your space first, plan the design, and make sure everything is right</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-leaf icon"></span>
                        <h4>Tailored to you</h4>
                        <p>Every design is customized to fit your space and style</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="why-card">
                        <span class="fa-solid fa-star icon"></span>
                        <h4>Premium quality</h4>
                        <p>We only use the finest plants</p>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <section>
        <div class="container">
            <h2 class="section-title">Your selected plants</h2><br>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Plant</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th colspan="2">Remove</th>
                    </tr>
                </thead>
                <tbody id="plantingTableBody">
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong><span id="plantingTotal">0</span>$</strong></td>
                    </tr>


                </tfoot>

            </table>
        </div>

    </section>

    <form method="POST" action="consultation.php" id="consultation-form">

        <div class="booking-section">
            <div class="booking-step" id="step1">
                <span class="steps">Step 1</span>
                <h2>Book your free consultation</h2>
                <p class="t">Our team will visit your space and plan the perfect planting design --all for free.</p>

                <div class="form-row">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="c-address">
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
                <input class="booking-btn" type="submit" value="Book free consultation">

            </div>
        </div>

    </form>
        <div class="booking-section">
            <div class="booking-step locked" id="step2">
                <span class="steps">Step 2</span>
                <h2>Book a planting service</h2>
                <p class="t">Available after your consultation is confirmed</p>


                <div class="form-row">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" id="p-address" disabled placeholder="Auto-filled from consultation">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Pick a date</label>
                        <input type="date" id="p-date" disabled>
                    </div>
                    <div class="form-group">
                        <label>Preferred time</label>
                        <select id="p-time" disabled>
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


                <p>Total Cost: $<span id="totalPricePlantingService">0</span></p>
                <button class="booking-btn" onclick="confirmBooking()">Confirm booking</button>
            </div>



        </div>





    <footer>


        <div class="footer-bottom">
            <p>📍 Lebanon</p>
            <p> &copy; 2026 The Floral Atelier. All rights deserved.</p>

        </div>
    </footer>

<script src="login.js?v=12"></script>
<script>
displayPlanting();
    </script>
</body>

</html>