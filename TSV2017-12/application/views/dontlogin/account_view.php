<?php
// Check login
$login = $this->session->userdata('user');
if(!isset($login)) {
  header("Location: ".base_url());
}
?>
<div class="container">
  <div class="page-header">
    <h1>Chỉnh sửa tài khoản</h1>
  </div>
  <div class="row">
    <div class="col-md-4">
      <h3>Thay đổi thông tin</h3>
      <form class="form-horizontal" action="<?php echo base_url('execute/change_info'); ?>" method="post">
        <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">
        <label for="name">Tên hiển thị</label>
        <input type="text" name="name" id="name" value="<?php echo $content['name'];?>" class="form-control" placeholder="Nhập tên bạn muốn hiển thị" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $content['email'];?>" class="form-control" placeholder="Nhập email của bạn" required>
        <button type="submit" name="change_info" class="btn btn-primary">Lưu thay đổi</button>
      </form>
    </div>
    <div class="col-md-4">
      <h3>Thay đổi mật khẩu</h3>
      <form class="form-horizontal" action="<?php echo base_url('execute/change_pwd'); ?>" method="post">
        <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">
        <label for="pwd">Mật khẩu hiện tại</label>
        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Nhập mật khẩu hiện tại" required>
        <label for="pwd2">Mật khẩu mới</label>
        <input type="password" name="pwd2" id="pwd2" class="form-control" placeholder="Nhập mật khẩu mới" required>
        <button type="submit" name="change_pwd" class="btn btn-primary">Lưu thay đổi</button>
      </form>
    </div>
    <div class="col-md-4">
      <h3>Quên mật khẩu</h3>
      <!-- <form class="form-horizontal" action="<?php echo base_url('execute/change_pwd'); ?>" method="post">
        <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">
        <label for="pwd">Mật khẩu hiện tại</label>
        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Nhập mật khẩu hiện tại" required>
        <label for="pwd2">Mật khẩu mới</label>
        <input type="password" name="pwd2" id="pwd2" class="form-control" placeholder="Nhập mật khẩu mới" required>
        <button type="submit" name="change_pwd" class="btn btn-primary">Lưu thay đổi</button>
      </form> -->
    </div>
  </div>
</div>
