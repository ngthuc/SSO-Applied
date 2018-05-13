
<div class="right-content">
    <!--box-product-->
    <div id="box-product">
        <div class="title-product">
            <table width="100%">
                <tr>
                    <td width="2%"><img src="images/wine.png" /></td>
                    <td>
                        <a href="index.php?p=allproduct"><p>All Product</p> </a>
                    </td>
                </tr>
            </table>
        </div>

        <?php
                $noPage = 9;
                if( isset($_GET['page'] ) )
                {
                    $page = $_GET['page'];
                    settype($page, "int");
                }else{
                     $page = 1;
                }
                $from = ($page - 1) * $noPage;

                $loadAllVegetable_page = loadAllVegetable_paging($from, $noPage);
                while( $row_allVegetable_page = mysqli_fetch_array($loadAllVegetable_page) ){
        ?>
            <a href="index.php?p=productdetail&idP=<?php echo $row_allVegetable_page['ID']; ?>">
                <div class="product">
                    <div class="box-img">
                        <img src="images/image/product/<?php echo $row_allVegetable_page['IMAGE']; ?>" alt="Avatar" class="image-product">
                    </div>
                    <div class="text-2">
                        <p><?php echo $row_allVegetable_page['NAME']; ?></p>
                        <p>
                            <span class="left-price">
                                <?php 
                                    if($row_allVegetable_page['DISCOUNT'] > 0)
                                        echo number_format($row_allVegetable_page['DISCOUNT']); 
                                ?>
                            </span>
                            <span class="right-price"><?php echo number_format($row_allVegetable_page['PRICE']); ?> đ</span>
                        </p>
                    </div>
                    <div class="middle">
                        <p>Product: <font color="#FF0000"><?php echo $row_allVegetable_page['SUPPLIER_ID']; ?></font></p>
                        <p>ABV: <font color="#FF0000"><?php echo $row_allVegetable_page['ABV']; ?></font></p>
                        <p>Volmune: <font color="#FF0000"><?php echo $row_allVegetable_page['VOLUME']; ?>ml</font></p>
                        <a href="index.php?p=productdetail&idP=<?php echo $row_allVegetable_page['ID']; ?>">
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
        
            <?php 
                $loadAllVegetable = loadAllVegetable();
                $Total_Product = mysqli_num_rows($loadAllVegetable);
                $Total_Page = ceil($Total_Product/$noPage);
                for( $i=1; $i<=$Total_Page; $i++ ){
            ?>
                <a href="index.php?p=allproduct&page=<?php echo $i?>"><?php echo $i?></a>  
            <?php } ?>
        </div>
    </div>
    <!--/box-product-->
</div>
<div class="clear"></div>