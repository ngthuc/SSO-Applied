<div class="container">
  <div class="page-header">
    <h1>Cấp phát key cho thiết bị</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/api_admin/'); ?>" class="btn btn-info">Quản lý API</a>
  </div>
  <div class="col-md-12">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_api_device');?>" method="POST">
        <input type="hidden" name="idApi" value="<?php echo $idApi; ?>">
        <label for="key">Thiết bị</label>
        <select class="form-control" name="device">
          <?php
          $device = $this->Mdevice->getList();
          foreach ($device as $key => $row) {
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
          ?>
        </select>
        <button type="submit" name="addKey" class="btn btn-primary">Cấp API</button>
    </form>
  </div>
