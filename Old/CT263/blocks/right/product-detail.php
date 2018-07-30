<?php
    if( isset($_GET['idP']) )
        $idProduct = $_GET['idP'];
    else
        $idProduct = "";

    $loadProductById = loadVEGETABLEById($idProduct);
    $row_Prd_Detail = mysqli_fetch_array($loadProductById);
?>
<div class="right-content">
    <table class="table-product-detail" >
        <tr>
            <td rowspan="8" width="35%"><img src="images/image/product/<?php echo $row_Prd_Detail['IMAGE']; ?>"/></td>
            <td><p class="name-product"><?php echo $row_Prd_Detail['NAME']; ?></p></td>
        </tr>
        <tr>
            <td width="50%">
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> Xuất Xứ:
                    <span><?php echo $row_Prd_Detail['noisx']; ?></span>
                </p>
            </td>
        </tr>
        <!-- <tr>
            <td>
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> Ngày Sản Xuất:
                    <span><?php echo $row_Prd_Detail['DOM']; ?></span>
                </p>
            </td>
        </tr> -->
        <!-- <tr>
            <td>
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> giá tiền:
                    <span><?php echo $row_Prd_Detail['AVB']; ?>%</span>
                </p>
            </td>
        </tr> -->
        <!-- <tr>
            <td>
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> đơn vị tính:
                    <span><?php echo $row_Prd_Detail['VOLUME']; ?>ml</span>
                </p>
            </td>
        </tr> -->
        <tr>
            <td>
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> tình trạng: <span>Còn Hàng!</span>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="information-prd">
                    <i class="fa fa-check" aria-hidden="true"></i> Giá:
                    <span class="left-price-detail">
                        <?php
                            if($row_Prd_Detail['DISCOUNT']> 0){
                                echo number_format($row_Prd_Detail['DISCOUNT']);
                                echo "đ";
                            }
                        ?>
                    </span>&nbsp;
                    <span><?php echo number_format($row_Prd_Detail['PRICE']); ?> đ</span>
                </p>
            </td>
        </tr>
        <tr>
            <!-- <form acction="" method="Post"> -->
                <td>
                  <a href="index.php?p=addcart&item=<?php echo $row_Prd_Detail['ID']; ?>" style="text-decoration: none">
                    <button name="btaddtoCart" id="btaddtoCart">
                        <i class="fa fa-cart-plus " aria-hidden="true" ></i> Add to cart
                    </button>
                  </a>
                    <!-- <input type="number" name="count" id="count" min="0" value="1" class="input-num-cart "/> -->
            <!-- </form> -->
        </tr>
    </table>

    <div class="discription_product">
        <p class="title_discription">Discription</p>
        <p class="content_discription">
			<?php echo $row_Prd_Detail['DICRIPTION']; ?>
        <p>
    </div>

</div>
<div class="clear"></div>
