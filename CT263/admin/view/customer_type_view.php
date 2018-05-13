<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 11:45 AM
 */

class customer_type_view
{
    public function create_option($customer_type, $select, $add)
    {
        if (!$add) {
            $selected = $select == "All" ? " selected" : "";
            echo "<option value='All'" . $selected . ">All customer type</option>";
        }
        while ($row = mysqli_fetch_assoc($customer_type)) {
            $selected = $select == $row["ID"] ? " selected" : "";
            echo "<option value='" . $row['ID'] . "' " . $selected . ">" . $row["NAME"] . "</option>";
        }
        $selected = $select == "" ? " selected" : "";
        echo "<option value=''" . $selected . ">Other</option>";
    }

    public function create_table_customer_type($customer_type)
    {
        ?>
        <div id="table-customer_type">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class='checkbox-style' type='checkbox'>
                    </th>
                    <th>Name</th>
                    <th>Discount</th>
                    <th>Describe</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($customer_type)) {
                    echo "
                    <tbody class='row-customer_type'>                
                <tr class='customer_type-row' id='customer_type-" . $row['ID'] . "'>
                    <td>
                        <input class='checkbox-style' type='checkbox' name='check-customer_type[]' value='" . $row['ID'] . "'>
                    </td>                    
                    <td class='name-customer_type'>
                        <strong>
                            <a href='customer-type.php?action=edit&id=" . $row['ID'] . "'>" . $row['NAME'] . "</a>
                        </strong>
                        <div class='row-action'>
                            <span class='id'>ID:" . $row['ID'] . " |</span>
                            <span class='edit'>
                        <a href='customer_type.php?action=edit&id=" . $row['ID'] . "'>Edit</a> |</span>                            
                            <span class='delete'>
                        <a href='manage-customer_type.php?action=delete&id=" . $row['ID'] . "'>Delete</a> |</span>
                            <span class='preview'>
                        <a href='#'>Preview</a>
                      </span>
                        </div>
                    <td>" . $row['DISCOUNT'] . "</td>
                    <td style='overflow: hidden'>" . $row['Describe2'] . "...</td>                    
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
                      <strong>Success!</strong> Update success customer_type id = " . $id .
                "</div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Update not success customer_type id = " . $id .
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
                      <strong>Success!</strong> Delete customer_type id = " . $id . " success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete customer_type id = " . $id . " not success
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
                      <strong>Success!</strong> Add new customer_type success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Add new customer_type not success
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
                      <strong>Success!</strong> Delete " . $total . " customer_type success
                      </div>
                ";
        } else if ($total - $deleted > 0 && $deleted > 0) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete " . $deleted . " customer_type success
                      </div>
                ";
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . ($total - $deleted) . " customer_type not success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . $total . " customer_type not success
                      </div>
                ";
        }
    }

    public function create_form_add_new()
    {
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Add New customer_type</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='customer_type-name' name='customer_type-name' type='text'
                           placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Discount</span>
                    <input class='form-control' id='customer_type-discount' name='customer_type-discount' type='number'
                           step=any placeholder='' maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="description">Discription:</label>
                    <textarea class="form-control" rows="10" id="customer_type-description"
                              name="customer_type-description" maxlength="1000"></textarea>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="add-new" type="submit">
                        <span class="fa fa-plus"></span> Add
                    </button>
                    <a class="btn btn-secondary ml-3" href="manage-customer_type.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function create_form_edit($customer_type)
    {
        $row = mysqli_fetch_assoc($customer_type);
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Edit customer_type</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>ID</span>
                    <input class='form-control' id='customer_type-id' name='customer_type-id' type='text'
                           value='<?php echo $row['ID']; ?>' readonly>
                </div>

                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='customer_type-name' name='customer_type-name' type='text'
                           value='<?php echo $row['NAME']; ?>' placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Discount</span>
                    <input class='form-control' id='customer_type-discount' name='customer_type-discount' type='number'
                           step=any value='<?php echo $row['DISCOUNT']; ?>' placeholder='' maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="description">Discription:</label>
                    <textarea class="form-control" rows="10" id="customer_type-description"
                              name="customer_type-description" maxlength="1000" value=''><?php echo $row['DESCRIBE']; ?></textarea>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="save" type="submit">
                        <span class="fa fa-save"></span> Save
                    </button>
                    <a class="btn btn-secondary ml-3" href="manage-customer_type.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }
}