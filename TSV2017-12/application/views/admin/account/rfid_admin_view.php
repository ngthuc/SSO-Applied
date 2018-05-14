<div class="container">
  <div class="page-header">
    <h1>Quản lý thẻ RFID</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#new-card">Cấp phát thẻ mới</button>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Mã thẻ</th>
        <th>Mã số định danh</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php $stt = 0;
        foreach ($content as $key => $row) {
          $stt++;
          echo '<tr>
            <td>'.$stt.'</td>
            <td>'.$row['idCard'].'</td>
            <td>'.$row['personalID'].'</td>
            <td>
              <a href="';
              if ($row['isStudent'] == 1) { echo base_url('admin/rfid_detail/'.$row['personalID'].'/student'); }
              else if ($row['isStudent'] == 0) { echo base_url('admin/rfid_detail/'.$row['personalID']); }
              else echo base_url('admin/rfid_account/');
              echo '" class="btn btn-info"><span class="glyphicon glyphicon-user"></span></a>
              <button class="btn btn-primary edit-card" data-id="'.$row['idCard'].'"><span class="glyphicon glyphicon-edit"></span></button>
              <button class="btn btn-danger delete-card" data-id="'.$row['idCard'].'"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
          </tr>';
        } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.edit-card').on('click', function() {
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   // alert($(this).data('id'));
   load_ajax_edit_card($(this).data('id'));
});

function load_ajax_edit_card(idCard){
    $.ajax({
        url : "<?php echo base_url('execute/get_edit_card')?>",
        type : "post",
        dateType:"text",
        data : {
            id : idCard
        },
    success : function (result){
			// alert(result);
      var kq = $.parseJSON(result);
      var id = kq.idCard;
      var pid = kq.personalID;
      $('.modal-body').html(
      '<label for="cid">Mã thẻ</label><input type="text" name="cid" id="cid" value="'+id+'" class="form-control" placeholder="Nhập mã thẻ hoặc dùng máy đọc thẻ" required>'
      +'<label for="pid">Mã số định danh</label><input type="text" name="pid" id="pid" value="'+pid+'" class="form-control" placeholder="Nhập mã số định danh của cá nhân" required>'
      +'<label for="type">Kiểu thẻ</label><label class="radio-inline"><input type="radio" name="type" value="1" required>Sinh viên</label>'
      +'<label class="radio-inline"><input type="radio" name="type" value="0" required>Cán bộ</label>');
      $('#put-card').modal();
    }
  });
}

$('.delete-card').on('click', function() {
   // load_ajax_delete_card($(this).data('id'));
   alert($(this).data('id'));
   // location.reload();
});

function load_ajax_delete_card(idCard){
    $.ajax({
        url : "<?php echo base_url('execute/delete_card')?>",
        type : "post",
        dateType:"text",
        data : {
            id : idCard
        },
    success : function (result){
			alert(result);
    }
  });
}
</script>

<!-- Add new card -->
<div class="modal fade" id="new-card" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_card');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Cấp phát thẻ mới</h4>
      </div>
      <div class="modal-body">
        <label for="cid">Mã thẻ</label>
        <input type="text" name="cid" id="cid" class="form-control" placeholder="Nhập mã thẻ hoặc dùng máy đọc thẻ" required>
        <label for="pid">Mã số định danh</label>
        <input type="text" name="pid" id="pid" class="form-control" placeholder="Nhập mã số định danh của cá nhân" required>
        <label for="type">Kiểu thẻ</label>
        <label class="radio-inline"><input type="radio" name="type" value="1" required>Sinh viên</label>
        <label class="radio-inline"><input type="radio" name="type" value="0" required>Cán bộ</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="addNew" class="btn btn-primary">Thêm mới</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="put-card" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/put_card');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Chỉnh sửa thẻ</h4>
      </div>
      <div class="modal-body">
        <!-- AJAX -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="putCard" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </div>
    </form>
  </div>
</div>
