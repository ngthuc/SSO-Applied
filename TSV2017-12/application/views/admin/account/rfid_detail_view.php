<div class="container">
  <div class="page-header">
    <h1>Quản lý thẻ RFID - Chi tiết định danh</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
    <a href="<?php echo base_url('admin/rfid_account'); ?>" class="btn btn-primary">Quay lại trang quản lý thẻ RFID</a>
    <?php
    if ($typeName == 'Student') {
      echo '<button class="btn btn-success" data-toggle="modal" data-target="#new-id-student">Định danh thẻ mới</button>';
    } else if ($typeName == 'Staff') {
      echo '<button class="btn btn-success" data-toggle="modal" data-target="#new-id-staff">Định danh thẻ mới</button>';
    } ?>
  </div>
  <div class="col-md-12">
    <table class="table">
      <thead>
        <!-- <th>STT</th> -->
        <th>Mã số định danh</th>
        <th>Họ tên định danh</th>
        <th>Đơn vị</th>
        <th>Quản lý</th>
      </thead>
      <tbody>
        <?php
        if ($typeName == 'Student') {
          $db = $this->Mmajor->getById($content['idMajor']);
          $idfaculty = $db['idFaculty'];
          $unit = $db['nameMajor'];
          $mfaculty = $this->Mfaculty->getById($idfaculty);
        } else if ($typeName == 'Staff') {
          $db = $this->Mdepartment->getById($content['idDepartment']);
          $idfaculty = $db['idFaculty'];
          $unit = $db['nameDepartment'];
          $mfaculty = $this->Mfaculty->getById($idfaculty);
        } else $unit = null;
          if ($mfaculty) {
            $faculty = $mfaculty['nameFaculty'];
          } else $faculty = null;
          echo '<tr>
            <td>'.$content[$typeID].'</td>
            <td>'.$content['lastName'.$typeName].' '.$content['firstName'.$typeName].'</td>
            <td>'.$unit.' - '.$faculty.'</td>
            <td>
              <a href="#" class="btn btn-primary edit-info" data-id="'.$content[$typeID].'"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
          </tr>';
        // }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
$('.edit-info').on('click', function() {
   // load_ajax_update($(this).data('id'),$(this).data('monhoc'));
   // alert($(this).data('id'));
   alert('Đang phát triển');
});
</script>

<!-- Add new id -->
<div class="modal fade" id="new-id-student" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_student');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Định danh thẻ mới</h4>
      </div>
      <div class="modal-body">
        <label for="sid">Mã số sinh viên</label>
        <input type="text" name="sid" id="sid" class="form-control" value="<?php echo $idCard; ?>" placeholder="Nhập mã số sinh viên" required>
        <label for="lastName">Họ</label>
        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Nhập họ của sinh viên" required>
        <label for="firstName">Tên</label>
        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Nhập tên của sinh viên" required>
        <label for="major">Ngành học</label>
        <select class="form-control" name="major">
          <?php $major = $this->Mmajor->getList();
          foreach ($major as $key => $row) {
              echo '<option value="'.$row['idMajor'].'">'.$row['nameMajor'].'</option>';
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

<div class="modal fade" id="new-id-staff" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_staff');?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Định danh thẻ mới</h4>
      </div>
      <div class="modal-body">
          <label for="sid">Mã số cán bộ</label>
          <input type="text" name="sid" id="sid" class="form-control" value="<?php echo $idCard; ?>" placeholder="Nhập mã số cán bộ" required>
          <label for="lastName">Họ</label>
          <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Nhập họ của cán bộ" required>
          <label for="firstName">Tên</label>
          <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Nhập tên của cán bộ" required>
          <label for="department">Ngành học</label>
          <select class="form-control" name="department">
            <?php $department = $this->Mdepartment->getList();
            foreach ($department as $key => $row) {
                echo '<option value="'.$row['id'].'">'.$row['nameDepartment'].'</option>';
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
