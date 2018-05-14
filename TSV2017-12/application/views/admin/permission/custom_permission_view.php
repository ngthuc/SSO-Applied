<?php $rolesGroup = $role['rolesGroup']; ?>
<div class="container">
  <div class="page-header">
    <h1>Quản lý phân quyền<?php if ($role) { echo ' của '.$role['roleName']; } ?></h1>
    <a href="<?php echo base_url('admin/permissions/'); ?>" class="btn btn-default">Quay lại trang phân quyền</a>
    <a href="<?php echo base_url('admin/permissions/add/'); ?>" class="btn btn-success">Thêm nhóm quyền mới</a>
  </div>
  <form class="form-horizontal" action="<?php echo base_url('execute/put_role');?>" method="POST">
    <div class="form-group">
      <div class="col-sm-12">
        <div class="col-sm-4">
            <p><strong>Nhóm quyền</strong></p>
            <input type="text" class="form-control" id="disabledInput" value="<?php echo $role['roleName']; ?>" disabled>
            <input type="text" class="hidden" name="role" value="<?php echo $role['roleName']; ?>">
        </div>
        <div class="col-sm-8">
            <p><strong>Mô tả nhóm quyền</strong></p>
            <input class="form-control" name="mota" type="text" value="<?php echo $role['roleDesc']; ?>" placeholder="Nhập mô tả quyền">
        </div>
      </div>
      <?php
        if ($count >0)
        {
            $rolesGroup=explode(',',$role['rolesGroup']);
        }
      ?>
      <div class="col-sm-12">
          <script language="JavaScript">
            function toggle(source) {
              checkboxes = document.getElementsByName('add[]');
              for(var i=1, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
              }
            }
          </script>
          <div class="col-sm-12">
            <br />
            <label for="roleGroup">Chức năng nhóm quyền</label><br  />
            <input type="checkbox" onClick="toggle(this)" id="roleGroup"> Chọn tất cả
            <input type="checkbox" name='add[]' value="fullcontrol"<?php if(in_array("fullcontrol",$rolesGroup)){echo " checked";}?> onClick="toggle(this)">Tất cả quyền
          </div>
          <div class="col-sm-12">
            <div class="col-sm-4">
              <p><strong>Nhóm quyền cơ bản</strong></p>
              <input type="checkbox" name='add[]' value="admin"<?php if(in_array("admin",$rolesGroup)){echo " checked";}?>>Truy cập trang quản trị<br />
              <input type="checkbox" name='add[]' value="report"<?php if(in_array("report",$rolesGroup)){echo " checked";}?>>Xem và xuất báo cáo<br />
              <input type="checkbox" name='add[]' value="newEvent"<?php if(in_array("newEvent",$rolesGroup)){echo " checked";}?>>Đăng sự kiện điểm danh mới<br />
            </div>
            <div class="col-sm-4">
              <p><strong>Nhóm quyền quản lý cơ bản</strong></p>
              <input type="checkbox" name='add[]' value="event"<?php if(in_array("event",$rolesGroup)){echo " checked";}?>>Quản lý sự kiện<br />
              <input type="checkbox" name='add[]' value="attendance"<?php if(in_array("attendance",$rolesGroup)){echo " checked";}?>>Quản lý điểm danh<br />
              <input type="checkbox" name='add[]' value="organization"<?php if(in_array("organization",$rolesGroup)){echo " checked";}?>>Quản lý tổ chức<br />
              <input type="checkbox" name='add[]' value="identification"<?php if(in_array("identification",$rolesGroup)){echo " checked";}?>>Quản lý định danh sinh viên/cán bộ<br />
            </div>
            <div class="col-sm-4">
              <p><strong>Nhóm quyền quản lý nâng cao</strong></p>
              <input type="checkbox" name='add[]' value="role"<?php if(in_array("role",$rolesGroup)){echo " checked";}?>>Quản lý phân quyền<br />
              <input type="checkbox" name='add[]' value="account"<?php if(in_array("account",$rolesGroup)){echo " checked";}?>>Quản lý tài khoản<br />
              <input type="checkbox" name='add[]' value="remove"<?php if(in_array("remove",$rolesGroup)){echo " checked";}?>>Xóa tài khoản<br />
              <input type="checkbox" name='add[]' value="device"<?php if(in_array("device",$rolesGroup)){echo " checked";}?>>Quản lý thiết bị và API<br />
            </div>
          </div>
          <input type="submit" class="col-sm-12 btn btn-primary" name="putRole" value="Lưu">
      </div>
    </div>
  </form>
</div>

<?php
// if (isset($_POST['saveRole'])) {
//   echo $_POST['rolename'].' '.$_POST['mota'].'<br />';
//   foreach ($_POST['add'] as $key => $data) {
//     echo $data.' ';
//   }
// }
?>
