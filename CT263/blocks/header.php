
<div id="header">
    <table id="table-header" >
        <tr>
            <td>
                <!--left-header-->
                <div class="left-header">
                </div>
                <!--//left-header-->
                <!--right-header-->
                <div class="right-header">
                    <div id="Menu-1">
                        <ul class="Menu-1-lv1">


                            <?php
                            if( !isset($_SESSION['username']) ){
                                ?>
                            <li>
                                <a href="index.php?p=createAccount">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                Signup
                                </a>
                            </li>

                                <li>
                                    <a href="index.php?p=login">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        Login
                                    </a>
                                </li>
                            <?php }else{ ?>
                                <li>
                                    <a href="index.php?p=Cart" class="a-cart">
                                      <?php
                                        $ok=1;
                                        if(isset($_SESSION['cart'])) {
                                          foreach($_SESSION['cart'] as $k=>$v) {
                                           if(isset($v)) {
                                             $ok=2;
                                           }
                                          }
                                        }
                                        if ($ok != 2) {
                                          echo '<span class="badge">0</span> ';
                                        } else {
                                          $items = $_SESSION['cart'];
                                          echo '<span class="badge">'.count($items).'</span> ';
                                        }
                                      ?>
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        Cart
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Hello <?php echo $_SESSION['username']; ?>
                                    </a>

                                    <ul class="Menu-1-lv2">
                                        <li>
                                            <a href="index.php?p=Account">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Account
                                            </a>
                                        </li>
                                        <?php if(isset($_SESSION['role'])) {
                                            if ($_SESSION['role'] == "Admin"){
                                                    ?>
                                <li>
                                    <a href="Admin/index.php">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        Admin Panel
                                    </a>
                                </li>
                                        <?php }}?>
                                <li>
                                    <a href="index.php?logout" >
                                        <i class="fa fa-sign-out" aria-hidden="true" name="btlogout"></i>
                                        Logout
                                    </a>
                                </li>
                                </ul>
                                </li>
                                <?php
                            }  ?>
                        </ul>
                    </div>
                </div>
                <!--/right-header-->
                <!--clear-->
                <div class="clear"></div>
                <!--//clear-->
            </td>
        </tr>
        <tr>
            <td>
                <table id="table-logo">
                    <tr>
                        <td width="50%">
                            <!--logo-->
                            <div class="Logo">
                                <a href="#">
                                    <img src="images/sc-lionicon-dribbble-2016.png" />
                                    <p>HTX Store</p>
                                </a>
                            </div>
                            <!--/logo-->
                        </td>
                        <td width="30%" align="center">
                            <!--search-->
                            <form action="index.php?p=Search" method="post">
                                <div id="search">
                                    <input type="text" name="box-search" id="box-search" placeholder="Search..."/>
                                    <button type="submit" name="bt-search" id="bt-search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                            <!--/search-->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <!--Menu-->
                <div id="Menu-2">
                    <ul class="Menu-2-lv1">
                        <li><a href="index.php">Homepage</a></li>
                        <li>
                            <a href="index.php?p=allproduct">Product</a>
                            <ul class="Menu-2-lv2">
                                <?php
                                    $loadCategory = loadCategory();
                                    while($row = mysqli_fetch_assoc($loadCategory))
                                    {
//                                        var_dump($row);
                                ?>
                                    <li>
                                        <a href="index.php?p=typeProduct&idCategory=<?php echo $row['CATEGORY_ID'] ?>">
                                            <?php echo $row['NAME'] ?>

                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="#">Introduce</a></li>
                    </ul>
                </div>
                <!--/Menu-->
            </td>
        </tr>
    </table>
</div>
