<div class="menu-left">
    <!--title-->
    <a href="index.php?p=allproduct"><p>Sale Product</p></a>
    <!--/title-->

    <!--product-->
    <?php 
        $saleProduct = loadSaleVegetable();
        while($row_saleproduct = (mysqli_fetch_array($saleProduct))){
    ?>
        <div class="product-new">
            <a href="index.php?p=productdetail&idP=<?php echo $row_saleproduct['ID']; ?>">
            <table width="100%" >
                    <tr>
                        <td width="30%" align="center">
                            <img src="images/image/product/<?php echo $row_saleproduct['IMAGE']; ?>" alt=""/>
                        </td>
                        <td>
                            <p><?php echo $row_saleproduct['NAME']; ?></p>
                                <p class="left-price-sale">
                                    <?php echo number_format($row_saleproduct['DISCOUNT']);?>đ
                                </p>
                                <p class="right-price-sale">
                                    <?php echo number_format($row_saleproduct['PRICE']);?>đ
                                </p>
                        </td>
                    </tr>
            </table>
            </a>
        </div>
    <?php } ?>
    <!--/product-->
</div>