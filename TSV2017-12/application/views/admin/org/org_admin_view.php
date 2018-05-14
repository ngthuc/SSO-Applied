<div class="container">
  <div class="page-header">
    <h1>Quản lý tổ chức</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#new-org">Thêm tổ chức mới</button>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Tên tổ chức</th>
        <th>Tổ chức quản lý</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php $stt = 0;
        foreach ($content as $key => $row) {
          $stt++;
          $parent = $this->Morg->getOrgById($row['parent']);
          $name = $row['text'];
          echo '<tr>
            <td>'.$stt.'</td>
            <td>'.$name.'</td>
            <td>'.$parent['text'].'</td>
            <td>'.$row['description'].'</td>
            <td>
              <button class="btn btn-primary edit-org" data-id="'.$row['id'].'"><span class="glyphicon glyphicon-edit"></span></button>
              <button class="btn btn-danger delete-org" data-id="'.$row['id'].'"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
          </tr>';
        } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.edit-org').on('click', function() {
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   // alert($(this).data('id'));
   alert('Đang phát triển');
});

$('.delete-org').on('click', function() {
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   // alert($(this).data('id'));
   alert('Đang phát triển');
});
</script>

<!-- Add new event -->
<div class="modal fade" id="new-org" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_org');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Thêm mới tổ chức</h4>
      </div>
      <div class="modal-body">
        <label for="name">Tên sự kiện</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên tổ chức" required>
        <label for="org">Tổ chức quản lý</label>
        <select class="form-control" name="org">
          <option value="#"><i>Không có quản lý tại đơn vị</i></option>
          <?php $org = $this->Morg->getList();
          foreach ($org as $key => $row) {
              echo '<option value="'.$row['id'].'">'.$row['text'].'</option>';
          } ?>
        </select>
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Nhập mô tả tổ chức" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="addNew" class="btn btn-primary">Thêm mới</button>
      </div>
    </div>
    </form>
  </div>
</div>
