<?php
if((isset($_GET['p']) == 'login') && isset($_SESSION['username'])) {
  header('Location: index.php');
  // echo '<meta http-equiv="refresh" content="0,url=http://localhost/sso/CT263/">';
}
?>
<div class="right-content">
    <div class="form-login">
        <form action="" method="POST">
            <table width="100%"  class="table-form-login">
                <tr>
                    <td>
                        <p>Login</p>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="text" name="txtUser" id="txtUser" class="txt-form" placeholder="UserName"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="password" name="txtPass" id="txtPass" class="txt-form" placeholder="Password"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <span>
                            <font color="red"><?php echo (isset($error)) ? $error : "" ?></font>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="btLogin" id="btLogin" value="Login" class="bt-form"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <hr>
                        <button class="bt-form">
                          <a type="button" href="http://localhost/sso/swa/auth.php/" id="login" style="text-decoration:none;color:white;">Đăng nhập với Auth0</a>
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div class="clear"></div>
