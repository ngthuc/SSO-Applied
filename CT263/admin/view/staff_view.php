<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 11:45 AM
 */

class staff_view
{

    public function create_table_staff($staff)
    {
        ?>
        <div id="table-staff">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class='checkbox-style' type='checkbox'>
                    </th>
                    <th>Name</th>
                    <th>Manager ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($staff)) {
                    echo "
                    <tbody class='row-staff'>                
                <tr class='staff-row' id='staff-" . $row['ID'] . "'>
                    <td>
                        <input class='checkbox-style' type='checkbox' name='check-staff[]' value='" . $row['ID'] . "'>
                    </td>                    
                    <td class='name-staff'>
                        <strong>
                            <a href='staff.php?action=edit&id=" . $row['ID'] . "'>" . $row['NAME'] . "</a>
                        </strong>
                        <div class='row-action'>
                            <span class='id'>ID:" . $row['ID'] . " |</span>
                            <span class='edit'>
                        <a href='staff.php?action=edit&id=" . $row['ID'] . "'>Edit</a> |</span>                            
                            <span class='delete'>
                        <a href='manage-staff.php?action=delete&id=" . $row['ID'] . "'>Delete</a> |</span>
                            <span class='preview'>
                        <a href='#'>Preview</a>
                      </span>
                        </div>
                    <td>" . $row['MANAGER_ID'] . "</td>
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
                      <strong>Success!</strong> Update success staff id = " . $id .
                "</div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Update not success staff id = " . $id .
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
                      <strong>Success!</strong> Delete staff id = " . $id . " success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete staff id = " . $id . " not success
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
                      <strong>Success!</strong> Add new staff success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Add new staff not success
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
                      <strong>Success!</strong> Delete " . $total . " staff success
                      </div>
                ";
        } else if ($total - $deleted > 0 && $deleted>0) {
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete " . $deleted . " staff success
                      </div>
                ";
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . ($total - $deleted ). " staff not success
                      </div>
                ";
        } else {
            echo "
                    <div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete " . $total . " staff not success
                      </div>
                ";
        }
    }

    public function create_form_add_new()
    {
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Add New Staff</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='staff-name' name='staff-name' type='text' placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Manager ID</span>
                    <input class='form-control' id='staff-managerid' name='staff-managerid' type='text' placeholder='' maxlength="20" >
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Phone</span>
                    <input class='form-control' id='staff-phone' name='staff-phone' type='text' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Email</span>
                    <input class='form-control' id='staff-email' name='staff-email' type='text' placeholder='' maxlength="50" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Address</span>
                    <input class='form-control' id='staff-address' name='staff-address' type='text' placeholder='' maxlength="50" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="add-new" type="submit">
                        <span class="fa fa-plus"></span> Add</button>
                    <a class="btn btn-secondary ml-3" href="manage-staff.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function create_form_edit($staff)
    {
        $row = mysqli_fetch_assoc($staff);
        ?>
        <div class="card card-default">
            <div class="card-header">
                <strong>Edit Staff</strong>
            </div>
            <div class="card-body">
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>ID</span>
                    <input class='form-control' id='staff-id' name='staff-id' type='text' value='<?php echo $row['ID']; ?>' readonly>
                </div>

                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Name</span>
                    <input class='form-control' id='staff-name' name='staff-name' type='text'  value='<?php echo $row['NAME']; ?>' placeholder='' maxlength="30" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Manager ID</span>
                    <input class='form-control' id='staff-managerid' name='staff-managerid' type='text' value='<?php echo $row['MANAGER_ID']; ?>' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Phone</span>
                    <input class='form-control' id='staff-phone' name='staff-phone' type='text' value='<?php echo $row['PHONE']; ?>' placeholder='' maxlength="20" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Email</span>
                    <input class='form-control' id='staff-email' name='staff-email' type='text' value='<?php echo $row['EMAIL']; ?>' placeholder='' maxlength="50" required>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label2'>Address</span>
                    <input class='form-control' id='staff-address' name='staff-address' type='text' value='<?php echo $row['ADDRESS']; ?>' placeholder='' maxlength="50" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary ml-3" name="save" type="submit">
                        <span class="fa fa-save"></span> Save</button>
                    <a class="btn btn-secondary ml-3" href="manage-staff.php">Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }
}