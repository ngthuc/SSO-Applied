<?php
// Check role
$sessRole = $this->session->userdata('access');
$_role = $sessRole['rolesGroup'];
$fetchRole = explode(',',$_role);
if(in_array('admin',$fetchRole) == FALSE) {
  header("Location: ".base_url());
}

  $registercount = $this->Mregister->countAll();
  $event = $this->Mevent->getList();
  $eventing = 0;
  foreach ($event as $key => $row) {
    $timestart = $row['dateEvent'].' '.$row['timeStart'];
    $doing = $this->Mtime->currentEvent(strtotime($timestart));
    if ($doing == 1) {
       $eventing++;
    }
  }
  $personalJoinedCount = $this->Mattendance->countAll();
?>
<div class="container">
  <div class="row">
    <!-- Thống kê sơ bộ -->
    <legend>Tổng quan</legend>
    <div class="col-md-4">
        <div class="alert alert-info">
          <h1><?php echo $registercount; ?></h1>
          <p>lượt đăng ký tham gia sự kiện</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-success">
          <h1><?php echo $eventing; ?></h1>
          <p>sự kiện đang diễn ra</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
          <h1><?php echo $personalJoinedCount; ?></h1>
          <p>cá nhân đã tham gia sự kiện</p>
        </div>
    </div>
    <!-- Truy cập các tính năng quản trị -->
    <legend>Quản trị</legend>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/event'); ?>">
        <div class="alert alert-warning">
          <div class="form-activity">
            <div class="form-header">
              Quản lý sự kiện
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/attendance'); ?>">
        <div class="alert alert-success">
          <div class="form-activity">
            <div class="form-header">
              Quản lý điểm danh
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/organizations'); ?>">
        <div class="alert alert-danger">
          <div class="form-activity">
            <div class="form-header">
              Quản lý tổ chức và các đơn vị
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/permissions'); ?>">
        <div class="alert alert-success">
          <div class="form-activity">
            <div class="form-header">
              Quản lý phân quyền và quyền truy cập
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/admin_account'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Quản lý tài khoản và người dùng
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/device_api'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Quản lý thiết bị và API
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- Tính năng khác -->
    <div class="col-md-12">
      <a href="<?php echo base_url('admin/analytics'); ?>">
        <div class="alert alert-warning">
          <div class="form-activity">
            <div class="form-header">
              Báo cáo thống kê
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('public/css/cit_login_style.css'); ?>"/>
