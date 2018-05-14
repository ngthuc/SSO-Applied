<div class="container">
  <div class="page-header">
    <h1>Quản lý điểm danh cho sự kiện <?php echo $event; ?></h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/attendance/'); ?>" class="btn btn-info">Quay lại trang quản lý điểm danh</a>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Họ tên</th>
        <th>Mã số cá nhân</th>
        <th>Thời gian vào</th>
        <th>Thời gian ra</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php
          $stt = 1;
          foreach ($content as $key => $row) {
            $joiner = $this->Mrfid->getByCard($row['idCard']);
            if ($joiner['isStudent'] == 1) {
               $student = $this->Mstudent->getById($joiner['personalID']);
               $name = $student['lastNameStudent'].' '.$student['firstNameStudent'];
            } else if ($joiner['isStudent'] == 0) {
               $staff = $this->Mstaff->getById($joiner['personalID']);
               $name = $staff['lastNameStaff'].' '.$staff['firstNameStaff'];
            } else {
               $name = '<i>Không tồn tại</i>';
            }
            echo '<tr>
              <td>'.$stt.'</td>
              <td>'.$name.'</td>
              <td>'.$joiner['personalID'].'</td>
              <td>'.$row['timeIn'].'</td>
              <td>'.$row['timeOut'].'</td>
              <td>
                <a href="'.base_url('admin/edit_attendance/'.$row['idCard'].'/').'" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                <button class="btn btn-danger delete-attendance" data-pid="'.$row['idCard'].'"><span class="glyphicon glyphicon-remove"></span></button>
              </td>
            </tr>';
            $stt++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.delete-attendance').on('click', function() {
    var r = confirm("Nhấn OK để xóa\nNhấn Cancel để hủy thao tác.");
    if (r == true) {
        load_ajax_delete_attendance($(this).data('pid'));
    }
   // alert($(this).data('id'));
   location.reload();
});

function load_ajax_delete_attendance(pid){
    $.ajax({
        url : "<?php echo base_url('execute/delete_user_attendance')?>",
        type : "post",
        dateType:"text",
        data : {
            pid : pid
        },
    success : function (result){
			alert(result);
    }
  });
}
</script>

<div class="modal fade" id="put-attendance" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/put_card');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Chỉnh sửa điểm danh</h4>
      </div>
      <div class="modal-body">
        <!-- AJAX -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="putAttendance" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </div>
    </form>
  </div>
</div>
