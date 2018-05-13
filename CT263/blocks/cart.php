<div class="box-cart">
    <form method="Post">
        <table  width="100%">
            <tr>
                <td>
                    <p class="title-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Your Cart</p>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table-cart" cellspacing="0">
                        <tr>
                            <td width="15%"><p class="titel-cart">Image</p></td>
                            <td width="35%"><p class="titel-cart">Name</p></td>
                            <td><p class="titel-cart">Price</p></td>
                            <td width="10%"><p class="titel-cart">Count</p></td>
                            <td><p class="titel-cart">Total Price</p></td>
                            <td width="10%"><p class="titel-cart">Delete</p></td>
                        </tr>
            <?php
            $ok=1;
            if(isset($_SESSION['cart'])) {
             foreach($_SESSION['cart'] as $k => $v) {
              if(isset($k)) {
               $ok=2;
              }
             }
            }
            if($ok == 2) {
              foreach($_SESSION['cart'] as $key=>$value)
              {
               $item[]=$key;
              }
              // $str=implode(",",$item);

              getProductCart($item);
            }
            ?>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          
          <input type="submit" name="btUpdateCart" id="btUpdateCart" value="Update Cart"/>
        </td>
      </tr>
      <tr>
        <td align="right">
          <span class="spanCart">Total: </span><span class="spanCart"><?php getTotalPriceCart($item); ?> VND</span>
        </td>
      </tr>
      <tr>
        <td align="right">
          <a href"index.php" class="bt-cart" >Payment</a>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php
if(isset($_POST['btUpdateCart']))
{
 foreach($_POST['qty'] as $key=>$value)
 {
  if( ($value == 0) and (is_numeric($value)))
  {
   unset ($_SESSION['cart'][$key]);
  }
  elseif(($value > 0) and (is_numeric($value)))
  {
   $_SESSION['cart'][$key]=$value;
  }
 }
 echo '<meta http-equiv="refresh" content="0">';
}
?>
