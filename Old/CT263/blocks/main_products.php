

<!--box-product-->
<div id="box-product">
    <div class="title-product">
        <table width="100%">
            <tr>
                <td width="2%"><img src="images/wine.png" /></td>
                <td>
                    <a href="#"><p>New Product</p></a>
                </td>
            </tr>
        </table>
    </div>
    <?php
        $newProduct = loadNewVegetable();
//        var_dump($newProduct);
        while($row_newproduct = (mysqli_fetch_assoc($newProduct))){
    ?>
    <a href="#">
        <div class="product">

            <div class="box-img">
                <img src="images/image/product/<?php echo $row_newproduct['IMAGE'] ?>" alt="Avatar" class="image-product">
            </div>
            <div class="text-2">
                <p><?php echo $row_newproduct['NAME'] ?></p>
                <p>
                    <span class="left-price">
                        <?php
                            if($row_newproduct['DISCOUNT'] > 0)
                                echo number_format($row_newproduct['DISCOUNT']);
                        ?>
                    </span>
                    <span class="right-price"><?php echo number_format($row_newproduct['PRICE']); ?>đ</span>
                </p>
            </div>
            <div class="middle">

                <p>Nơi sx: <font color="#FF0000"><?php echo $row_newproduct['noisx']; ?></font></p>
                <p>Phần dùng: <font color="#FF0000"><?php echo $row_newproduct['phandung']; ?></font></p>
                <a href="index.php?p=productdetail&idP=<?php echo $row_newproduct['ID']; ?>">
                        <div class="view-more">View More
                        </div>
                </a>
                <a href="index.php?p=addcart&item=<?php echo $row_newproduct['ID']; ?>">
                    <div class="add-to-card">
                        <i class="fa fa-cart-plus " aria-hidden="true" ></i> Cart
                    </div>
                </a>
            </div>
        </div>
    </a>

    <?php } ?>
    <div class="clear"></div>
</div>
<!--/box-product-->

<!--box-product-->

<!--/box-product-->
