<div class="container">
  <div class="page-header">
    <h1>Quản lý phân quyền</h1>
    <a href="<?php echo base_url('admin/permissions/'); ?>" class="btn btn-default">Quay lại trang phân quyền</a>
    <a href="<?php echo base_url('admin/permissions/add'); ?>" class="btn btn-success">Thêm nhóm quyền mới</a>
  </div>
  <form class="form-horizontal" action="<?php echo base_url('execute/add_role');?>" method="POST">
    <div class="form-group">
      <div class="col-sm-12">
        <div class="col-sm-4">
          <p><strong>Tên nhóm quyền</strong></p>
          <input class="form-control" name="role" type="text" placeholder="Nhập tên nhóm quyền">
        </div>
        <div class="col-sm-8">
            <p><strong>Mô tả nhóm quyền</strong></p>
            <input class="form-control" name="mota" type="text" placeholder="Nhập mô tả quyền">
        </div>
      </div>
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
            <input type="checkbox" name='add[]' value="fullcontrol" onClick="toggle(this)">Tất cả quyền
          </div>
          <div class="col-sm-12">
            <div class="col-sm-4">
              <p><strong>Nhóm quyền cơ bản</strong></p>
              <input type="checkbox" name='add[]' value="admin">Truy cập trang quản trị<br />
              <input type="checkbox" name='add[]' value="report">Xem và xuất báo cáo<br />
              <input type="checkbox" name='add[]' value="newEvent">Đăng sự kiện điểm danh mới<br />
            </div>
            <div class="col-sm-4">
              <p><strong>Nhóm quyền quản lý cơ bản</strong></p>
              <input type="checkbox" name='add[]' value="event">Quản lý sự kiện<br />
              <input type="checkbox" name='add[]' value="attendance">Quản lý điểm danh<br />
              <input type="checkbox" name='add[]' value="organization">Quản lý tổ chức<br />
              <input type="checkbox" name='add[]' value="identification">Quản lý định danh sinh viên/cán bộ<br />
            </div>
            <div class="col-sm-4">
              <p><strong>Nhóm quyền quản lý nâng cao</strong></p>
              <input type="checkbox" name='add[]' value="role">Quản lý phân quyền<br />
              <input type="checkbox" name='add[]' value="account">Quản lý tài khoản<br />
              <input type="checkbox" name='add[]' value="remove">Xóa tài khoản<br />
              <input type="checkbox" name='add[]' value="device">Quản lý thiết bị và API<br />
            </div>
          </div>
          <br />
          <input type="submit" class="col-sm-12 btn btn-primary" name="addNew" value="Lưu">
      </div>
    </div>
  </form>
</div>

<?php
// if (isset($_POST['saveRole'])) {
//   echo $_POST['role'].' '.$_POST['mota'].'<br />';
//   $all_value = implode(",",$_POST['add']);
//   echo $all_value;
// }
?>
