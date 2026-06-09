<?php
session_start();
include 'connection.php';

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $alreadyExist = true;
    } else {
        $sql = "insert into users (nom, email, mot_de_passe) values ('$name', '$email', '$password')";
        $conn->query($sql);
        $accountCreated = true;
        $sql = "select * from users where email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $id = $result->fetch_assoc()['ID'];
            $_SESSION['user_id'] = $id;
            header('Location: index.php');
        }
    }
}
?>

<html>

<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }
        
        .gradient-custom-4 {
            /* fallback for old browsers */
            background: rgb(214, 157, 214);
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgb(214, 157, 214));
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgb(214, 157, 214))
        }
    </style>
</head>

<body>
    <section class="vh-100 bg-image" .gradient-custom-3 style="
    background-image: url(css/signup.jpeg);
    background-size: cover;
    background-position: center;
    height: 400px;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="POST" action='signup.php' onsubmit="return validateSignUp()">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name='name' id="form3Example1cg" class="form-control form-control-lg" required />
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name='email' id="email" class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name='password' id="pass" class="form-control form-control-lg" required />
                                        <label class="form-label" for="pass">Password</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="confirmpass" class="form-control form-control-lg" required />
                                        <label class="form-label" for="confirmpass">Confirm your password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Signup</button>
                                    </div>
                                    <div>
                                        <?php if (isset($alreadyExist)) { ?>
                                            <p style="color: red; margin-top: 10px;">An account with this email already exists. <a href="login.php">Login instead</a></p>
                                        <?php } elseif (isset($accountCreated)) { ?>
                                            <p style="color: green; margin-top: 10px;">Account created successfully! <a href="index.php">Go to main page</a></p>
                                        <?php } ?>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js'></script>
    <script src="login.js"></script>
</body>

</html>