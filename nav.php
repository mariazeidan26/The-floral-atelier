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
                    <li><a href="./index.php"> Home </a> </li>
                    <li><a href="./index.php#categories"> Categories </a> </li>
                </ul>


                <form class="navbar-form navbar-left" method="GET" action="search.php">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                        </div>
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li> <a class="nav-link" href="cart.php"> 🛒 <span id="cartcount"></span> </a> </li>
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        ?>
                    <li>
                        <a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign up </a>
                    </li>
                    <li>
                        <a href="login.php"> <span class="glyphicon glyphicon-log-in"></span> Login </a>
                    </li>
                    
                    <?php
                    } else {
                        ?>
                        <li><a onclick='logout()'> <span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
                        <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>