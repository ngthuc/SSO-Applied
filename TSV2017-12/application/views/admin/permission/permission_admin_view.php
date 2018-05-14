<div class="container">
  <div class="page-header">
    <h1>Quản lý quyền truy cập</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/permissions/add'); ?>" class="btn btn-success">Thêm nhóm quyền mới</a>
  </div>
  <div class="col-md-12 table-responsive">
    <table class="table">
      <thead>
        <th>STT</th>
        <th>Tên nhóm quyền</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php $stt = 0;
        foreach ($content as $key => $row) {
          $stt++;
          echo '<tr>
            <td>'.$stt.'</td>
            <td>'.$row['roleName'].'</td>
            <td>'.$row['roleDesc'].'</td>
            <td>
              <a href="'.base_url('admin/permissions/custom/').$row['roleName'].'" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
              <button class="btn btn-danger delete-role" data-id="'.$row['roleName'].'"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
          </tr>';
        } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.delete-role').on('click', function() {
    var r = confirm("Nhấn OK để xóa\nNhấn Cancel để hủy thao tác.");
    if (r == true) {
        load_ajax_delete($(this).data('id'));
    }
   // alert($(this).data('id'));
   location.reload();
});

function load_ajax_delete(role){
    $.ajax({
        url : "<?php echo base_url('execute/delete_role')?>",
        type : "post",
        dateType:"text",
        data : {
            rolename : role
        },
    success : function (result){
			alert(result);
    }
  });
}
</script>
