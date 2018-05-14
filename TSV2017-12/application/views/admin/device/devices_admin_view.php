<div class="container">
  <div class="page-header">
    <h1>Quản lý thiết bị và API</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/api_admin/'); ?>" class="btn btn-info">Quản lý API</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#new-device">Đăng ký thiết bị mới</button>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Tên định danh</th>
        <th>Số se-ri</th>
        <th>Ngày đăng ký</th>
        <th>Tình trạng cấp phép</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php $stt = 0;
        foreach ($content as $key => $row) {
          $stt++;
          $key = $this->Mkey->getById($row['idApi']);
          echo '<tr>
            <td>'.$stt.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['serialnumber'].'</td>
            <td>'.$row['registerdate'].'</td>
            <td>';
            if ($key) echo '<span class="glyphicon glyphicon-ok" style="color:green;"><i> Đã cấp phép</i></span>';
            else echo '<i style="color:red;">Chưa cấp phép</i>';
            echo '</td>
            <td>
              <a href="'.base_url('admin/device_admin/'.$row['id'].'/').'" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
              <button class="btn btn-danger delete-device" data-id="'.$row['id'].'"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
          </tr>';
        } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.delete-device').on('click', function() {
    var r = confirm("Nhấn OK để xóa\nNhấn Cancel để hủy thao tác.");
    if (r == true) {
        load_ajax_delete_device($(this).data('id'));
    }
   // alert($(this).data('id'));
   location.reload();
});

function load_ajax_delete_device(idDevice){
    $.ajax({
        url : "<?php echo base_url('execute/delete_device')?>",
        type : "post",
        dateType:"text",
        data : {
            id : idDevice
        },
    success : function (result){
			alert(result);
    }
  });
}
</script>

<!-- Add new device -->
<div class="modal fade" id="new-device" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_device');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Đăng ký thiết bị mới</h4>
      </div>
      <div class="modal-body">
        <label for="name">Tên thiết bị</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên thiết bị" required>
        <label for="serialNumber">Serial Number</label>
        <input type="text" name="serialNumber" id="serialNumber" class="form-control" placeholder="Nhập S/N của thiết bị">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="addNew" class="btn btn-primary">Thêm mới</button>
      </div>
    </div>
    </form>
  </div>
</div>
