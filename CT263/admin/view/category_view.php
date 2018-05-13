<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 8:07 AM
 */

class category_view
{
    public function create_option($category, $select, $add)
    {
        if (!$add) {
            $selected = $select == "All" ? " selected" : "";
            echo "<option value='All'" . $selected . ">All Category</option>";
        }
        while ($row = mysqli_fetch_assoc($category)) {
            $selected = $select == $row["ID"] ? " selected" : "";
            echo "<option value='" . $row['ID'] . "' " . $selected . ">" . $row["NAME"] . "</option>";
        }
        $selected = $select == "" ? " selected" : "";
        echo "<option value=''" . $selected . ">Other</option>";
    }

    public function create_table_category($category)
    {
        ?>
        <div id="table-category">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class='checkbox-style' type='checkbox'>
                    </th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($category)) {
                    echo "
                    <tbody class='row-category'>                
                <tr class='category-row' id='category-" . $row['ID'] . "'>
                    <td>
                        <input class='checkbox-style' type='checkbox' name='check-category[]' value='" . $row['ID'] . "'>
                    </td>                    
                    <td class='name-category'>
                        <strong>
                            <a href='category.php?action=edit&id=" . $row['ID'] . "'>" . $row['NAME'] . "</a>
                        </strong>
                    </td>
                    <td>" . $row['CATEGORY_ID'] . "</td>
                    <td style='overflow: hidden'>" . $row['Describe2'] . "...</td>                    
                </tr>
                <tr>
                  <td colspan='4' class='nav-action'>
                        ID: " . $row['ID'] . "
                    <strong>
                    | 
                      <span class='edit'>
                        <a href='category.php?action=edit&id=" . $row['ID'] . "'>
                          <span class='fa fa-edit'></span> Edit</a> |</span>
                      <span class='delete'>
                        <a href='category.php?action=delete&id=" . $row['ID'] . "'>
                          <span class='fa fa-remove'></span> Delete</a>
                      </span>
                    </strong>
                  </td>
                </tr>
                </tbody>
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
                      <strong>Success!</strong> Update success category id = " . $id .
                "</div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Update not success category id = " . $id .
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
                      <strong>Success!</strong> Delete category id = " . $id . " success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete category id = " . $id . " not success
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
                      <strong>Success!</strong> Add new category success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Add new category not success
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
                      <strong>Success!</strong> Delete " . $total . " category success
                      </div>
                ";
        } else if ($total - $deleted > 0 && $deleted>0) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete " . $deleted . " category success
                      </div>
                ";
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . ($total - $deleted ). " category not success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . $total . " category not success
                      </div>
                ";
        }
    }

    public function create_form_add_new()
    {
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Add New Category</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Category Name</span>
                    <input class='form-control' id='category-name' name='category-name' type='text' placeholder='' maxlength="30">
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Category Code</span>
                    <input class='form-control' id='category-code' name='category-code' type='text' placeholder='' maxlength="6" required>
                </div>
                <div class="form-group">
                    <label for="description">Discription:</label>
                    <textarea class="form-control" rows="10" id="category-description" name="category-description" maxlength="1000"></textarea>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="add-new" type="submit">
                        <span class="fa fa-plus"></span> Add</button>
                    <a class="btn btn-secondary ml-3" href="category.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function create_form_edit($category)
    {
        $row = mysqli_fetch_assoc($category);
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Edit Category</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>ID</span>
                    <input class='form-control' id='category-id' name='category-id' type='text' value='<?php echo $row['ID']; ?>' readonly>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Category Name</span>
                    <input class='form-control' id='category-name' name='category-name' type='text' value='<?php echo $row['NAME']; ?>' maxlength="30">
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Category Code</span>
                    <input class='form-control' id='category-code' name='category-code' type='text' value='<?php echo $row['CATEGORY_ID']; ?>' maxlength="6">
                </div>
                <div class="form-group">
                    <label for="description">Discription:</label>
                    <textarea class="form-control" rows="10" id="category-description" name="category-description" maxlength="1000"><?php echo $row['Describe']; ?></textarea>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="save" type="submit">
                        <span class="fa fa-save"></span> Save</button>
                    <a class="btn btn-secondary ml-3" href="category.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }


}