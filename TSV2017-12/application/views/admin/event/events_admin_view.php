<div class="container">
  <div class="page-header">
    <h1>Quản lý sự kiện</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#new-event">Thêm sự kiện mới</button>
  </div>
  <div class="col-md-12">
    <table class="table" id="datatables">
      <thead>
        <th>STT</th>
        <th>Tên sự kiện</th>
        <th>Thời gian diễn ra</th>
        <th>Địa điểm</th>
        <th>Mô tả</th>
        <th>Người đăng</th>
        <th>Đơn vị tổ chức</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php $stt = 0;
        foreach ($content as $key => $row) {
          $stt++;
          $creator = $this->Maccount->getByUsername($row['userCreator']);
          $organization = $this->Morg->getOrgById($row['idOrg']);
          echo '<tr>
            <td>'.$stt.'</td>
            <td>'.$row['nameEvent'].'</td>
            <td>'.$row['timeStart'].'<br />'.$row['dateEvent'].'</td>
            <td>'.$row['locationEvent'].'</td>
            <td>'.$row['descriptionEvent'].'</td>
            <td>'.$creator['name'].'</td>
            <td>'.$organization['text'].'</td>
            <td>
              <a href="'.base_url('admin/edit_event/'.$row['id']).'" class="btn btn-primary">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
              <button class="btn btn-danger delete-event" data-id="'.$row['id'].'"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
          </tr>';
        } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Add new event -->
<div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_event');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Thêm mới sự kiện</h4>
      </div>
      <div class="modal-body">
        <label for="nameEvent">Tên sự kiện</label>
        <input type="text" name="nameEvent" id="nameEvent" class="form-control" placeholder="Nhập tên sự kiện" required>
        <label for="timeStart">Giờ bắt đầu</label>
        <input type="time" name="timeStart" id="timeStart" class="form-control" required>
        <label for="timeEnd">Giờ kết thúc</label>
        <input type="time" name="timeEnd" id="timeEnd" class="form-control" required>
        <label for="dateEvent">Ngày tổ chức</label>
        <input type="date" name="dateEvent" id="dateEvent" class="form-control" required>
        <label for="locationEvent">Địa điểm</label>
        <input type="text" name="locationEvent" id="locationEvent" class="form-control" placeholder="Nhập địa điểm sự kiện" required>
        <label for="descriptionEvent">Mô tả</label>
        <input type="text" name="descriptionEvent" id="descriptionEvent" class="form-control" placeholder="Nhập mô tả sự kiện" required>
        <label for="org">Đơn vị tổ chức</label>
        <select class="form-control" name="org">
          <?php $org = $this->Morg->getList();
          foreach ($org as $key => $row) {
              echo '<option value="'.$row['id'].'">'.$row['text'].'</option>';
          } ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="addNew" class="btn btn-primary">Thêm mới</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.delete-event').on('click', function() {
    var r = confirm("Nhấn OK để xóa\nNhấn Cancel để hủy thao tác.");
    if (r == true) {
        load_ajax_delete($(this).data('id'));
    }
   // alert($(this).data('id'));
   location.reload();
});

function load_ajax_delete(idevent){
    $.ajax({
        url : "<?php echo base_url('execute/delete_event')?>",
        type : "post",
        dateType:"text",
        data : {
            id : idevent
        },
    success : function (result){
			alert(result);
    }
  });
}
</script>
