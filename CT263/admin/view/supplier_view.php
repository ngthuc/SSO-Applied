<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 9:27 AM
 */

class supplier_view
{
    public function create_option($supplier, $select, $add){
        if(!$add) {
            $selected = $select == "All" ? " selected" : "";
            echo "<option value='All'" . $selected . ">All Supplier</option>";
        }
        while($row = mysqli_fetch_assoc($supplier)){
            $selected = $select==$row["ID"]?" selected":"";
            echo "<option value='".$row['ID']."' ".$selected.">".$row["NAME"]."</option>";
        }
        $selected =$select==""?" selected":"";
        echo "<option value=''".$selected.">Other</option>";
    }



    public function create_table_supplier($supplier)
    {
        ?>
        <div id="table-supplier">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class='checkbox-style' type='checkbox'>
                    </th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($supplier)) {
                    echo "
                    <tbody class='row-supplier'>                
                <tr class='supplier-row' id='supplier-" . $row['ID'] . "'>
                    <td>
                        <input class='checkbox-style' type='checkbox' name='check-supplier[]' value='" . $row['ID'] . "'>
                    </td>                    
                    <td class='name-supplier'>
                        <strong>
                            <a href='supplier.php?action=edit&id=" . $row['ID'] . "'>" . $row['NAME'] . "</a>
                        </strong>
                        <div class='row-action'>
                            <span class='id'>ID:" . $row['ID'] . " |</span>
                            <span class='edit'>
                        <a href='supplier.php?action=edit&id=" . $row['ID'] . "'>Edit</a> |</span>                            
                            <span class='delete'>
                        <a href='manage-supplier.php?action=delete&id=" . $row['ID'] . "'>Delete</a> |</span>
                            <span class='preview'>
                        <a href='#'>Preview</a>
                      </span>
                        </div>
                    <td>" . $row['COUNTRY'] . "</td>
                    <td>" . $row['PHONE'] . "</td>
                    <td>" . $row['EMAIL'] . "</td>
                    <td style='overflow: hidden'>" . $row['ADDRESS'] . "...</td>                    
                </tr>
                ";
                }
                ?>
            </table>
        </div>
        <?php
    }

    public function create_table_nav_page($currentPage, $totalProduct, $limit, $link)
    {
        $totalPage = ceil($totalProduct / $limit);
        $totalPage = $totalPage < 0 ? 1 : $totalPage;
//        $totalPage = 5;
        $currentPage = $currentPage > $totalPage ? 1 : $currentPage;

        ?>
        <nav class='ml-auto'>
            <ul class='pagination justify-content-end'>
                <?php
                if ($currentPage > 1) {
                    echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage - 1) . "'><span class='fa fa-chevron-left'></span></a>
                        </li>";
                }

                //                Create page layout

                if (($currentPage - 1) < 3 && $currentPage != 1) {
                    echo "<li class='page-item " . ($currentPage == 1 ? " disabled" : "") . "'>
                        <a class='page-link' href='" . $link . "&page=1'>1</a>
                    </li>";
                } else if (($currentPage - 1) > 1) {
                    echo "<li class='page-item'>
                        <a class='page-link' href='" . $link . "&page=1'>1</a>
                    </li>
                    <li class='page-item disabled'>
                        <a class='page-link' href='#'>...</a>
                    </li>";
                }

                if (($currentPage - 1) - 1 > 0) {
                    echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage - 1) . "'>" . ($currentPage - 1) . "</a>
                        </li>";
                }
                echo "<li class='page-item disabled'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage) . "'>" . ($currentPage) . "</a>
                        </li>";
                if ($totalPage - ($currentPage + 1) > 0) {
                    echo "<li class='page-item '>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage + 1) . "'>" . ($currentPage + 1) . "</a>
                        </li>";
                }
                if (($totalPage - ($currentPage + 1)) >= 0) {
                    if (($totalPage - ($currentPage + 1)) < 2 && $currentPage != $totalPage) {
                        echo "<li class='page-item " . ($currentPage == $totalPage ? " disabled" : "") . "'>
                        <a class='page-link' href='" . $link . "&page=" . $totalPage . "'>" . $totalPage . "</a>
                    </li>";
                    } else if (($totalPage - ($currentPage + 1)) > 1) {
                        echo "<li class='page-item disabled'>
                        <a class='page-link' href='#'>...</a>
                    </li>
                    <li class='page-item'>
                        <a class='page-link' href='" . $link . "&page=" . $totalPage . "'>" . $totalPage . "</a>
                    </li>";
                    }
                }
                if ($currentPage < $totalPage && $totalPage > 1) {
                    echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage + 1) . "'><span class='fa fa-chevron-right'></span></a>
                        </li>";
                }
                ?>
            </ul>
        </nav>
        <?php
    }

    public function update_alert($result, $id)
    {
        if ($result) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Update success supplier id = " . $id .
                "</div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Update not success supplier id = " . $id .
                "</div>
                ";
        }
    }

    public function delete_alert($result, $id)
    {
        if ($result) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete supplier id = " . $id . " success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete supplier id = " . $id . " not success
                      </div>
                ";
        }
    }

    public function insert_alert($result)
    {
        if ($result) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Add new supplier success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Add new supplier not success
                      </div>
                ";
        }
    }

    public function delete_alert_multiple($deleted, $total)
    {
        if ($total - $deleted == 0) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete " . $total . " supplier success
                      </div>
                ";
        } else if ($total - $deleted > 0 && $deleted>0) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete " . $deleted . " supplier success
                      </div>
                ";
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . ($total - $deleted ). " supplier not success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . $total . " supplier not success
                      </div>
                ";
        }
    }

    public function create_form_add_new()
    {
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Add New Supplier</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='supplier-name' name='supplier-name' type='text' placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Country</span>
                    <input class='form-control' id='supplier-country' name='supplier-country' type='text' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Phone</span>
                    <input class='form-control' id='supplier-phone' name='supplier-phone' type='text' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Email</span>
                    <input class='form-control' id='supplier-email' name='supplier-email' type='text' placeholder='' maxlength="50" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Address</span>
                    <input class='form-control' id='supplier-address' name='supplier-address' type='text' placeholder='' maxlength="50" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="add-new" type="submit">
                        <span class="fa fa-plus"></span> Add</button>
                    <a class="btn btn-secondary ml-3" href="manage-supplier.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function create_form_edit($supplier)
    {
        $row = mysqli_fetch_assoc($supplier);
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Edit Supplier</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>ID</span>
                    <input class='form-control' id='supplier-id' name='supplier-id' type='text' value='<?php echo $row['ID']; ?>' readonly>
                </div>

                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='supplier-name' name='supplier-name' type='text'  value='<?php echo $row['NAME']; ?>' placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Country</span>
                    <input class='form-control' id='supplier-country' name='supplier-country' type='text' value='<?php echo $row['COUNTRY']; ?>' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Phone</span>
                    <input class='form-control' id='supplier-phone' name='supplier-phone' type='text' value='<?php echo $row['PHONE']; ?>' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Email</span>
                    <input class='form-control' id='supplier-email' name='supplier-email' type='text' value='<?php echo $row['EMAIL']; ?>' placeholder='' maxlength="50" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Address</span>
                    <input class='form-control' id='supplier-address' name='supplier-address' type='text' value='<?php echo $row['ADDRESS']; ?>' placeholder='' maxlength="50" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="save" type="submit">
                        <span class="fa fa-save"></span> Save</button>
                    <a class="btn btn-secondary ml-3" href="manage-supplier.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }
}