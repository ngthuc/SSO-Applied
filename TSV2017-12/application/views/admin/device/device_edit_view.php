<div class="container">
  <div class="page-header">
    <h1>Chỉnh sửa thiết bị</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/device_admin/'); ?>" class="btn btn-info">Quản lý thiết bị</a>
  </div>
  <div class="col-md-12">
    <form class="form-horizontal" action="<?php echo base_url('execute/put_device');?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Tên thiết bị</label>
        <input type="text" name="name" id="name" value="<?php echo $device['name']; ?>" class="form-control" placeholder="Nhập tên thiết bị" required>
        <label for="serialNumber">Serial Number</label>
        <input type="text" name="serialNumber" id="serialNumber" value="<?php echo $device['serialnumber']; ?>" class="form-control" placeholder="Nhập S/N của thiết bị">
        </select>
        <button type="submit" name="putdevice" class="btn btn-primary">Lưu thay đổi</button>
    </form>
  </div>
