<?php
include 'connection.php';
session_start();

if (isset($_POST['email'], $_POST['password'])) {
  $email = trim($_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "update users set mot_de_passe = '$password' where email = '$email'";
  $conn->query($sql);
  header('Location: login.php');
}

?>

<head>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: white;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, white);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, white)
    }
  </style>
</head>

<body style="color:FFDBFD  ;">
  <section style="background-image:url(https://i.pinimg.com/1200x/72/6e/7f/726e7fa92b2976bcaa925914b8b5aa8a.jpg); 
background-size: cover; 
background-position: center; 
background-repeat: no-repeat; 
height: 100vh;"
    class="vh-100 gradient-custom">
    <div class="container py-5 h-100" style="color:FFFFFF;" >
      <div class="row d-flex justify-content-center align-items-center h-100" >
        <div class="col-12 col-md-8 col-lg-6 col-xl-5" style="background-color:FFDBFD;">
          <div class="card bg-dark text-white" style="border-radius: 1rem; background-color: FFDBFD;">
            <div class="card-body p-5 text-center" style="background-color:FFFFFF">

              <form  method='POST' action='forgetform.php' class="mb-md-5 mt-md-4 pb-5" onsubmit="return document.getElementById('typePasswordX').value == document.getElementById('typePasswordCX').value">

                <h2 style="color: black;" class="text-uppercase mb-5">Forgot password</h2>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" name='email' id="typeEmailX" style="color: black;" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX" style="color: black;">Email</label>
                </div><br>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" name='password' id="typePasswordX" style="color: black;" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX" style="color: black;"> New Password</label>
                </div><br>
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordCX" style="color: black;" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordCX" style="color: black;">Confirm New Password</label>
                </div>

                <button class="btn btn-outline-light btn-lg px-5 mt-5 mb-0"
                  type="submit" style="color: black;">Change password</button>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<script src='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js'></script>
</body>

</html>
