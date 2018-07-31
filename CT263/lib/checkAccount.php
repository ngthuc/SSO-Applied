
<?php
    if( isset($_POST['btLogin']) ){
        $username = $_POST['txtUser'];
        $password = $_POST['txtPass'];

        $username = strip_tags($username);
		    $username = addslashes($username);
		    $password = strip_tags($password);
        $password = addslashes($password);

        if($username == "" || $password == ""){
            $error = "Username and password can not be empty!!!";
        }else{
            $Account = LoginCustomer($username, $password);
            $row_Account = mysqli_num_rows($Account);
            if($row_Account > 0){

                $row_acc_roles = mysqli_fetch_array($Account);
                $check_Roles = checkRoles($row_acc_roles['ROLE_ID']);
                $row_Roles = mysqli_fetch_array($check_Roles);

                if($row_Roles['NAME'] == "Admin"){
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "Admin";
                    header("location:index.php");
                } else if($row_Roles['NAME'] == "Customer"){
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "Customer";
                    header("location:index.php");
                } else{
                    header("location:index.php?p=login");
                }

            } else{
                $error = "Username and password not correct!!!";
            }
            // var_dump(mysqli_fetch_array($Account));
        }
    }

    if(isset($_GET['logout']) ){
        if($_SESSION['username']){
          unset($_SESSION['username']);
          if(isset($_SESSION['isSSO'])){
            unset($_SESSION['isSSO']);
            echo '<meta http-equiv="refresh" content="0,url=http://localhost/sso/swa/logout.php?return=http://localhost/sso/CT263/">';
          } else {
            echo '<meta http-equiv="refresh" content="0,url=http://localhost/sso/CT263/">';
          }
        } else{
            echo '<meta http-equiv="refresh" content="0,url=http://localhost/sso/CT263/">';
        }
    }
?>
