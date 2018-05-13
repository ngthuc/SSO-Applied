 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title>SB Admin - Start Bootstrap Template</title>
     <!-- Bootstrap core CSS-->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom fonts for this template-->
     <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <!-- Custom styles for this template-->
     <link href="css/sb-admin.css" rel="stylesheet">
 </head>

 <body class="bg-dark">
 <div class="container">
     <div class="card card-login mx-auto mt-5">
         <div class="card-header">Login</div>
         <div class="card-body">
             <form action="" method="post">
                 <div class="form-group">
                     <label for="exampleInputEmail1">Username</label>
                     <input class="form-control" id="Username" name="Username" type="text" aria-describedby="Username"
                            placeholder="Enter Username">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Password</label>
                     <input class="form-control" id="Password" name="Password" type="password" placeholder="Password">
                 </div>
                 <div class="form-group">
                     <div class="form-check">
                         <label class="form-check-label">
                             <input class="form-check-input" type="checkbox"> Remember Password</label>
                     </div>
                 </div>
                 <div class="text-center">

                     <?php
                     include_once __DIR__ . "/../lib/dbCon.php";
                     include_once __DIR__ . "/../lib/dbHomePage.php";
                     $error ="";
                     if (isset($_POST['btLogin'])) {
                         $username = $_POST['Username'];
                         $password = $_POST['Password'];

                         $username = strip_tags($username);
                         $username = addslashes($username);
                         $password = strip_tags($password);
                         $password = addslashes($password);

                         if ($username == "" || $password == "") {
                             $error = "Username and password can not be empty!!!";
                         } else {
                             $Account = LoginCustomer($username, $password);
                             $row_Account = mysqli_num_rows($Account);
                             if ($row_Account > 0) {

                                 $row_acc_roles = mysqli_fetch_array($Account);
                                 $check_Roles = checkRoles($row_acc_roles['ROLE_ID']);
                                 $row_Roles = mysqli_fetch_array($check_Roles);

                                 if ($row_Roles['NAME'] == "Admin") {
                                     session_start();
                                     $_SESSION['username'] = $username;
                                     $_SESSION['role'] = "Admin";
                                     header("location:index.php");
                                 } else{
                                     $error = "Can't login!!!";
                                 }

                             } else {
                                 $error = "Username and password not correct!!!";
                             }
                         }
                         echo "<p>" . $error . "</p>";
                     }

                     ?>
                 </div>
                 <button type="submit" name="btLogin" class="btn btn-primary btn-block">Login</button>
             </form>

         </div>
     </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/popper/popper.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 </body>

 </html>
