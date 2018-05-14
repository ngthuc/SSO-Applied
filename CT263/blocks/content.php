<?php
    if( isset($_GET["p"]) )
        $p = $_GET["p"];
    else    $p = "";
?>

<div id="content">
    <!--banner-->
    <?php
        switch($p)
        {
            case "allproduct":
                require "left/left-content.php";
                require "right/all_product.php";
                break;
            case "typeProduct":
                require "left/left-content.php";
                require "right/type_product.php";
                break;
            case "login":
                if( !isset($_SESSION['username']) ){
                    require "left/left-content.php";
                    require "right/login.php";
                    break;
                }else{
                    require "banner.php";
                    require "main_products.php";
                    break;
                }
            case "sso":
                if(!isset($_SESSION['username']) ){
                    require "left/left-content.php";
                    require "right/callback.php";
                    break;
                } else{
                    require "banner.php";
                    require "main_products.php";
                    break;
                }
            case "createAccount":
                if( !isset($_SESSION['username']) ){
                    require "left/left-content.php";
                    require "right/createAccount.php";
                    break;
                }else{
                    require "banner.php";
                    require "main_products.php";
                    break;
                }
            case "Account":
                require "left/left-content.php";
                require "right/Account.php";
                break;
            case "Cart":
                if( isset($_SESSION['username']) ){
                    require "cart.php";
                    break;
                }else{
                    require "left/left-content.php";
                    require "right/login.php";
                    break;
                }

            // case "Search":
            //     require "left/left-content.php";
            //     require "right/search.php";
            //     break;
            case "productdetail":
                require "left/left-content.php";
                require "right/product-detail.php";
                break;

            case "addcart":
                require "addcart.php";
                break;
            case "delcart":
                require "delcart.php";
                break;
            default:
                require "banner.php";
                require "main_products.php";
        }
    ?>

</div>
