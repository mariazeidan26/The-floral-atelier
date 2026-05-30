<?php
session_start();
include 'connection.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from user where email = '$email' and mot_de_passe = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $id = $result->fetch_assoc()['ID'];
        $_SESSION['user_id'] = $id;
        $loggedIn = true;
    } else {
        $invalidMail = true;
    }
}
?>

<html>

<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: pink;
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, pink);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, pink)
        }
    </style>
</head>

<body style="color: black;">
    <section style="background-image: url('css/signup.jpeg'); 
background-size: cover; 
background-position: center; 
background-repeat: no-repeat; 
height: 100vh; color: black;" class="vh-100 gradient-custom">
        <div class="container py-5 h-100" style="color: black;">
            <div class="row d-flex justify-content-center align-items-center h-100" style="color: black;">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5" style="color: black;">
                    <div class="card bg-dark text-black" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center" style="background-color:white; color: black;">


                            <div class="mb-md-5 mt-md-4 pb-5" style="color: black;">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-black-50 mb-5" style="color:black;">Please enter your Email and Password!
                                </p>
                                <form method="POST" action="login.php">
                                    <div data-mdb-input-init class="form-outline form-black mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email" style="color: black;">Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-black mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password" style="color: black;">Password</label>
                                    </div>

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" style="color: black;">Login</button>
                                    <div>
                                         <p id="error" style="color:red; text-align:center;"></p>
                                        <?php
                                        if (isset($invalidMail)) {
                                            echo '<p style="color: red; margin-top: 10px;">Invalid email or password</p>';
                                        }
                                        if (isset($loggedIn)) {
                                            echo '<p style="color: green; margin-top: 10px;">Logged in successfully <a href="index.php">Go to main page</a></p>';
                                        }   
                                        ?>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                                <div>
                                    <p class="mb-0 mt-2">Don't have an account? <a href="signup.html" class="text-gray-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="login.js?v=1" defer></script>



</body>

</html>