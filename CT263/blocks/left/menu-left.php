<div class="menu-left">
    <!--title-->
    <a href="index.php?p=allproduct"><p>Product</p></a>
    <!--/title-->

    <!--Menu-->
    <ul class="menu-left-style">
        <?php 
            $loadCategory = loadCategory(); 
            while($row = mysqli_fetch_array($loadCategory))
            {
        ?>
            <a href="index.php?p=typeProduct&idCategory=<?php echo $row['ID'] ?>">
                <li> 
                    <?php echo $row['NAME'] ?>
                </li>
            </a>
        <?php 
            }
        ?>
    </ul>
    <!--/Menu-->
</div>