<div class="container">
  <div class="page-header">
    <h1>Chỉnh sửa điểm danh</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/attendance'); ?>" class="btn btn-default">Quay lại trang quản lý điểm danh</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="<?php echo base_url('execute/put_attendance')?>" method="post">
          <input type="hidden" name="id" value="<?php echo $content['id']; ?>">
          <input type="hidden" name="pid" value="<?php echo $idCard; ?>">
          <label for="timeIn">Thời gian vào</label>
          <input type="datetime" name="timeIn" id="timeIn" value="<?php echo $content['timeIn']; ?>" class="form-control">
          <label for="timeIn">Thời gian vào</label>
          <input type="datetime" name="timeOut" id="timeIn" value="<?php echo $content['timeOut']; ?>" class="form-control">
          <button type="submit" name="editAttendance" class="btn btn-primary">Lưu thay đổi</button>
      </form>
    </div>
  </div>
</div>
