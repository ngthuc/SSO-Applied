<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 10/28/2017
 * Time: 1:21 PM
 */

function create_navbar($manage){
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../index.php">HTX Store Manage </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Product">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-tags"></i>
            <span class="nav-link-text">Manage Product</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Product") echo " show";?>" id="collapseComponents">
                        <li>
                            <a href="add-new-product.php">Add New</a>
                        </li>
                        <li>
                            <a href="manage-product.php">Products</a>
                        </li>
                        <li>
                            <a href="category.php">Category</a>
                        </li>
                        <!--li>
                            <a href="ie-product.php">Import/Export</a>
                        </li-->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Shop">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Manage Store</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Store") echo " show";?>" id="collapseComponents2">
                        <li>
                            <a href="manage-store.php">Stores</a>
                        </li>
                        <li>
                            <a href="introduction.php">Introduction</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Order">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Manage Order</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Order") echo " show";?>" id="collapseComponents3">
                        <li>
                            <a href="add-new-order.php">Add New</a>
                        </li>
                        <li>
                            <a href="manage-order.php">Orders</a>
                        </li>
                        <!--li>
                            <a href="ie-order.php">Import/Export</a>
                        </li-->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Customer">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents6" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Customer</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Customer") echo " show";?>" id="collapseComponents6">
                        <li>
                            <a href="customer.php?action=new">Add new</a>
                        </li>
                        <li>
                            <a href="manage-customer.php">Customers</a>
                        </li>
                        <li>
                            <a href="customer-type.php">Customer Type</a>
                        </li>
                        <!--li>
                            <a href="ie-customer.php">Import/Export</a>
                        </li-->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Staff">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents7" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Staff</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Staff") echo " show";?>" id="collapseComponents7">
                        <li>
                            <a href="staff.php?action=new">Add new</a>
                        </li>
                        <li>
                            <a href="manage-staff.php">Staffs</a>
                        </li>
                        <!--li>
                            <a href="ie-staff.php">Import/Export</a>
                        </li-->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Supplier">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents8" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Supplier</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Supplier") echo " show";?>" id="collapseComponents8">
                        <li>
                            <a href="supplier.php?action=new">Add new</a>
                        </li>
                        <li>
                            <a href="manage-supplier.php">Suppliers</a>
                        </li>
                        <!--li>
                            <a href="ie-supplier.php">Import/Export</a>
                        </li-->
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Account">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Account</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Manage Account") echo " show";?>" id="collapseComponents4">
                        <li>
                            <a href="add-new-account.php">Add new</a>
                        </li>
                        <li>
                            <a href="manage-account.php">Accounts</a>
                        </li>
                        <li>
                            <a href="roles.php">Roles</a>
                        </li>
                        <li>
                            <a href="profile.php">Profile</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Report</span>
          </a>
                    <ul class="sidenav-second-level collapse <?php if ($manage=="Report") echo " show";?>" id="collapseComponents5">
                        <li>
                            <a href="reports.php">Reports</a>
                        </li>
                        <li>
                            <a href="report-revenue.php">Revenue</a>
                        </li>
                        <li>
                            <a href="report-product.php">Product</a>
                        </li>
                        <li>
                            <a href="report-visit.php">Visit</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Seting">
                    <a class="nav-link" href="setting.php">
            <i class="fa fa-fw fa-cog"></i>
            <span class="nav-link-text">Seting</span>
          </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-user-circle"></i>Hi, <b><?php echo $_SESSION['username']; ?></b>!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<?php
}

function get_role($function){}
?>