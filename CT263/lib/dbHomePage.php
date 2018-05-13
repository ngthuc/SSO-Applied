<?php

    function loadCategory()
    {
        $query = "
            Select * From category
            Order By CATEGORY_ID DESC;
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadCategoryById($idCategory)
    {
        $query = "
            Select * From category
            where CATEGORY_ID = '$idCategory'
            Order By CATEGORY_ID DESC;
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadAllVegetable()
    {
        $query = "
            Select * From vegetable
            Order By ID DESC;
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadAllVegetable_paging($from, $noPage)
    {
        $query = "
            Select * From vegetable
            Order By ID DESC
            Limit $from, $noPage
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadVegetableById($idProduct)
    {
        $query = "
            Select * From vegetable
            WHERE ID = '$idProduct'
            Order By ID DESC;
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadVegetableByCategory($idCategory)
    {
        $query = "
            Select * From vegetable
            WHERE CATEGORY_ID = '$idCategory'
            Order By ID DESC;
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadVegetableByCategory_paging($idCategory, $from, $noPage)
    {
        $query = "
            Select * From vegetable
            WHERE CATEGORY_ID = '$idCategory'
            Order By ID DESC
            Limit $from, $noPage
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadNewVegetable()
    {
        $query = "
            Select * From vegetable

            Order By ID DESC
            LIMIT 0,4
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function loadSaleVegetable()
    {
        $query = "
            Select * From vegetable
            WHERE DISCOUNT > 0
            Order By ID DESC
            LIMIT 0,4
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function LoginCustomer($username, $password){
        $query = "
            SELECT * FROM account
            WHERE USER_NAME = '$username'
            And ACC_PASSWORD = '$password'
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }


    function checkRoles($idRoles){
        $query = "
                SELECT * FROM roles
                WHERE ID = '$idRoles'
        ";
        return mysqli_query($GLOBALS['conn'],$query);
    }

    function getProductCart($str){
      foreach ($str as $key => $id) {
        $sql = "SELECT * FROM vegetable WHERE id = $id";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        while($row=mysqli_fetch_array($result)) {
          echo '<tr>
              <td><img src="images/image/product/'.$row['IMAGE'].'" class="img-in-cart"/></td>
              <td><p>'.$row['NAME'].'</p></td>
              <td><p class="font-style-cart">'.number_format($row['PRICE']).'</p></td>
              <td>
                  <input type="number" name="qty['.$row['ID'].']" id="count" min="1" value="'.$_SESSION['cart'][$row['ID']].'" class="input-num-cart"/>
              </td>
              <td><p class="font-style-cart">'. number_format($_SESSION['cart'][$row['ID']]*$row['PRICE'],0) .'</p></td>
              <td>
                  <a href="index.php?p=delcart&productid='.$row['ID'].'" class="delete-product" name="deleteProduct" id="deleteProduct">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
              </td>
          </tr>';
        }
      }
    }

    function getTotalPriceCart($str){
      $total = 0;
      if($str && (count($str) > 0)) {
        foreach ($str as $key => $id) {
          $sql = "SELECT * FROM vegetable WHERE id = $id";
          $result = mysqli_query($GLOBALS['conn'],$sql);
          while($row=mysqli_fetch_array($result)) {
            $total+=$_SESSION['cart'][$row['ID']]*$row['PRICE'];
          }
        }
      }
      echo number_format($total);
    }
?>
