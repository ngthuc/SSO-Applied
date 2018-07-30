<?php

    if( isset($_GET["idCategory"]) )
        $idCategory = $_GET["idCategory"];
    else
        $idCategory = "all";

    $loadCategoryById = loadCategoryById($idCategory);
    $row_Category = mysqli_fetch_array($loadCategoryById);
?>
<div class="right-content">
    <!--box-product-->
    <div id="box-product">
        <div class="title-product">
            <table width="100%">
                <tr>
                    <td width="2%"><img src="images/wine.png" /></td>
                    <td>
                        <a href="#"><p><?php echo $row_Category['NAME']; ?></p></a>
                    </td>
                </tr>
            </table>
        </div>

        <?php
                $noPage = 6;
                if( isset($_GET['page'] ) )
                {
                    $page = $_GET['page'];
                    settype($page, "int");
                }else{
                     $page = 1;
                }
                $from = ($page - 1) * $noPage;

                $load_Vegetable_Category_page = loadVegetableByCategory_paging($idCategory, $from, $noPage);
                while( $row_Vegetable_Category_page = mysqli_fetch_array($load_Vegetable_Category_page) ){
        ?>
            <a href="index.php?p=productdetail&idP=<?php echo $row_Vegetable_Category_page['Vegetable_ID']; ?>">
                <div class="product">
                    <?php
//                        if($row_Vegetable_Category_page['Vegetable_ISNEW'] > 0)
//                            echo '<img src="images/new.png" class="new-product"/>';
                    ?>
                    <div class="box-img">
                        <img src="images/image/product/<?php echo $row_Vegetable_Category_page['IMAGE']; ?>" alt="Avatar" class="image-product">
                    </div>
                    <div class="text-2">
                        <p><?php echo $row_Vegetable_Category_page['NAME']; ?></p>
                        <p>
                            <span class="left-price">
                                <?php
                                    if($row_Vegetable_Category_page['DISCOUNT'] > 0)
                                        echo number_format($row_Vegetable_Category_page['DISCOUNT']);
                                ?>
                            </span>
                            <span class="right-price"><?php echo number_format($row_Vegetable_Category_page['PRICE']); ?> đ</span>
                        </p>
                    </div>
                    <div class="middle">
                        <p>Xuất xứ: <font color="#FF0000"><?php echo $row_Vegetable_Category_page['SUPPLIER_ID']; ?></font></p>
                        <p>Nồng độ: <font color="#FF0000"><?php echo $row_Vegetable_Category_page['ABV']; ?></font></p>
                        <p>Thể tích: <font color="#FF0000"><?php echo $row_Vegetable_Category_page['VOLUME']; ?>ml</font></p>
                        <a href="index.php?p=productdetail&idP=<?php echo $row_Vegetable_Category_page['ID']; ?>">
                            <div class="view-more">View More
                            </div>
                        </a>
                        <a href="#">
                            <div class="add-to-card">
                                <i class="fa fa-cart-plus " aria-hidden="true" ></i> Cart
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        <?php  }  ?>

        <div class="clear"></div>
        <div class="paging">
        <!--vong lap for-->
            <?php
                $load_Vegetable_idCategory = loadVegetableByCategory($idCategory);
                $Total_Product = mysqli_num_rows($load_Vegetable_idCategory);
                $Total_Page = ceil($Total_Product/$noPage);
                for( $i=1; $i<=$Total_Page; $i++ ){
            ?>
                <a href="index.php?p=typeProduct&idCategory=<?php echo $idCategory?>&page=<?php echo $i?>"><?php echo $i?></a>
            <?php } ?>
            <!--/vong lap for-->
        </div><!--paging-->
    </div>
    <!--/box-product-->
</div>
<div class="clear"></div>
