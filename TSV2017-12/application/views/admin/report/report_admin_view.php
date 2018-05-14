<?php
if(isset($_POST['view'])) {
  $idEvent = $_POST['nameEvent'];
} else {
  $idEvent = ' ';
}
?>
<div class="container">
  <div class="page-header">
    <h1>Thống kê hoạt động</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <!-- <a href="#" class="btn btn-success">Tạo báo cáo mới</a>
    <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-export"> Xuất báo cáo</span></a> -->
  </div>
  <div class="col-md-12">
    <div class="col-md-6">
      <form class="form-inline" action="#" method="post">
        <label for="viewEvent">Xem thống kê sự kiện</label>
        <select class="form-control" name="nameEvent" id="viewEvent">
          <?php $event = $this->Mevent->getList();
          foreach ($event as $key => $row) {
            echo '<option value="'.$row['id'].'">'.$row['nameEvent'].'</option>';
          }
          ?>
        </select>
        <input type="submit" class="form-inline btn btn-primary" name="view" value="Xem">
      </form>
    </div>
    <div class="col-md-6" id="view">
      <?php
        $viewEvent = $this->Mevent->getById($idEvent);
        if ($viewEvent) {
          $count = $this->Mattendance->countAll($idEvent);
          echo '<div class="alert alert-info">
          <h1>'.$count.'</h1>
          <p>lượt điểm danh sự kiện</p>
        </div>';
          echo '<button class="btn btn-info" id="report"><span class="glyphicon glyphicon-export"></span> Xuất báo cáo</button>';
        }
      ?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#viewEvent').on('change', function() {
    var $form = $(this).closest('form');
    $form.find('input[type=submit]').click();
  });
});

<!-- Load ajax -->
$('#report').on('click', function() {
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   alert('Đang phát triển');
});
</script>
