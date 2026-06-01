<?php
    include 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">

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
                    <li><a href="#"> Home </a> </li>
                    <li><a href="#categories"> Categories </a> </li>
                </ul>


                <form class="navbar-form navbar-left" action="/action_page.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                        </div>
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li> <a class="nav-link" href="cart.html"> 🛒 <span id="cartcount"></span> </a> </li>
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        ?>
                    <li>
                        <a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign up </a>
                    </li>
                    <li>
                        <a href="login.php"> <span class="glyphicon glyphicon-log-in"></span> Login </a>
                    </li>
                    <li>
                    <?php
                    } else {
                        ?>
                        <a onclick='logout()'> <span class="glyphicon glyphicon-log-out"></span> Logout </a>
                        <?php
                    }
                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"> </li>
            <li data-target="#myCarousel" data-slide-to="1"> </li>
            <li data-target="#myCarousel" data-slide-to="2"> </li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="css/logo.jpeg" alt="logo" style="width:100%;">
                <div class="carousel-caption">

                </div>
            </div>

            <div class="item">
                <img src="css/flowers.jpeg" alt="flower image" style="width:100%; ">
                <div class="carousel-caption ">
                    <h3> Where every petal tells a story </h3>
                </div>
            </div>

            <div class="item ">
                <img src="css/planting.jpeg" alt="service " style="width:100% ; ">
                <div class="carousel-caption ">
                    <h3> Where every petal tells a story </h3>
                </div>
            </div>
        </div>

        <!-- left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section id="categories ">
        <div class="categories-container">
            <button class="category-btn" onclick="showSection('flowers',this) ">Flowers</button>
            <button class="category-btn" onclick="showSection('bouquets',this) ">Bouquets</button>
            <button class="category-btn" onclick="showSection('plants',this) ">Plants</button>
            <button class="category-btn" onclick="showSection('services',this) ">Services</button>
        </div>
    </section>


    <section id="products">
        <!-- flowers-->
        <div id="flowers" class="product-section">
            <div class="product">
                <img src="css/whiteOrchid.jpeg">
                <h4> White Orchid <button class="info-btn" onclick="toggleInfo(this)"> i </button> </h4>
                <p>10$</p>
                <p class="description"> Soft and graceful, the white orchid adds a peaceful charm to any setting. </p>

                <input type="number" min="1" value="1">


                <div class="buttons">
                    <div class="row">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                                <button class="buy"> Buy</button>
                            <?php
                        }
                        else {
                            include "buyDisabled.php";
                        }
                        ?>
                        <button class="plant"> Plant</button>
                    </div>
                    <button class="customize"> Add to your bouquet</button>
                </div>
            </div>
        </div>

        <!-- Bouquets-->
        <div id="bouquets" class="product-section">
            <div class="bouquets-grid">
                <div class="left">

                    <div class="product">
                        <img src="css/bouquet1.jpeg">
                        <h4> Pink Harmony </h4>
                        <p>40$</p>
                        <input type="number" min="1" value="1">

                        <div class="buttons">
                            <div class="row">
                                <!-- Removed PHP from .html file; use JavaScript-only call. Add an ID via data-id if needed. -->
                                <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                                <button class="buy"> Buy</button>
                            <?php
                        }
                        else {
                            include "buyDisabled.php";
                        }
                        ?>
                        
                            </div>

                        </div>

                    </div>
                </div>
                <div class="right">
                    <div class="cart-item">
                        <h3 class="title">Customise your own bouquet</h3>
                        <br>
                        <table class="bouquet-table">
                            <tr>
                                <th>Flower</th>
                                <th>quantity</th>
                                <th>Price per one</th>
                                <th>remove</th>
                            </tr>

                            <tr>
                                <td class="flower-o"><img src="css/whiteOrchid.jpeg"> White Orchid</td>
                                <td> <input type="number" value="1" min="1"> </td>
                                <td>3$</td>
                                <td><button class="remove">X</button></td>
                            </tr>
                        </table>


                    </div>
                    <button class="buy">create bouquet</button>

                </div>
            </div>
        </div>
    </section>




    <!-- plants -->
    <div id="plants" class="product-section">
        <div class="product">
            <img src="css/ruffledFanPalm.jpeg">
            <h4> Ruffled Fan Palm <button class="info-btn" onclick="toggleInfo(this)"> i </button></h4>
            <p>15$</p>
            <p class="description"> Bring a touch of the tropics indoors.</p>
            <input type="number" min="1" value="1">

            <div class="buttons">
                <div class="row">
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                                <button class="buy"> Buy</button>
                            <?php
                        }
                        else {
                            include "buyDisabled.php";
                        }
                        ?>
                    <button class="plant"> Plant</button>
                </div>
            </div>
        </div>
    </div>



    <!--services -->
    <div id="services" class="product-section">
        <div class="buttons services-buttons">
            <?php
                        if (isset($_SESSION['user_id'])||true) {
                            ?>
            <button class="service-btn" onclick="goToPlanting()"> Book a planting service </button>
            <button class="service-btn" onclick="goToMaintenance()"> Book a maintenance service </button>
                            <?php
                        }
                        else {
                            ?>
            <button class="service-btn" onclick="confirmRedirectOther()"> Book a planting service </button>
            <button class="service-btn" onclick="confirmRedirectOther()"> Book a maintenance service </button>
            <?php
                        }
                        ?>
        </div>

    </div>
    </section>


    <section class="rate-contact">
        <form>
        <h2 class="section-title">Rate your experience</h2>

        <select class="rating" name="rating">
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
        </select>

        <textarea class="feedback" name="feedback" placeholder="Your feedback help us grow" required></textarea>
        <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                                    <input type="submit" class="btn" value="Submit">
                            <?php
                        }
                        else {
                            ?>
                                    <button class="btn" onclick="confirmRedirectOther()">Submit</button>
            <?php
                        }
                        ?>
        </form>

        <h2 class="section-title">Contact us</h2>
        <a href="https://wa.me/" target="_blank" class="whatsapp-btn"> Whatsapp</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=example@gmail.com" target="_blank" class="gmail-btn">Gmail</a>

    </section>

    <footer>


        <div class="footer-bottom">
            <p>📍 Lebanon</p>
            <p> &copy; 2026 The Floral Atelier. All rights deserved.</p>

        </div>
    </footer>







    <script>
        function showSection(sectionId, btn) {
            const section = document.getElementById(sectionId);
            const isActive = section.classList.contains("active");


            document.querySelectorAll(".product-section").forEach(sec => {
                sec.classList.remove("active");
            });


            document.querySelectorAll(".category-btn").forEach(b => {
                b.classList.remove("active");
            });


            if (isActive) {
                return;
            }


            section.classList.add("active");
            btn.classList.add("active");
        }


        function toggleInfo(btn) {
            const product = btn.closest('.product');
            const desc = product.querySelector('.description');

            if (!desc) return;

            if (desc.style.display === "block") {
                desc.style.display = "none";
            } else {
                desc.style.display = "block";
            }
        }
    </script>
    <script src="login.js?v=2"></script>





</body>

</html>