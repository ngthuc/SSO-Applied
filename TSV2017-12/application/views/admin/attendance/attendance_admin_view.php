<div class="container">
  <div class="page-header">
    <h1>Quản lý điểm danh</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/event/'); ?>" class="btn btn-info">Đến trang quản lý sự kiện</a>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Tên sự kiện</th>
        <th>Thời gian tổ chức</th>
        <th>Thời gian kết thúc</th>
        <th>Địa điểm</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php
          $stt = 1;
          $event = $this->Mevent->getList();
          foreach ($event as $key => $row) {
            echo '<tr>
              <td>'.$stt.'</td>
              <td>'.$row['nameEvent'].'</td>
              <td>'.$row['timeStart'].'</td>
              <td>'.$row['timeEnd'].'</td>
              <td>'.$row['locationEvent'].'</td>
              <td>
                <a class="btn btn-primary" href="'.base_url('admin/attendance/'.$row['id'].'/').'"><span class="glyphicon glyphicon-list"></span></a>
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
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   alert($(this).data('id'));
});
</script>
