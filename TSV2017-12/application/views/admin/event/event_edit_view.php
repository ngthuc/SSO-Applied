<div class="container">
  <div class="page-header">
    <h1>Chỉnh sửa sự kiện</h1>
    <a href="<?php echo base_url('admin/event'); ?>" class="btn btn-default">Quay lại trang quản lý sự kiện</a>
  </div>
  <div class="col-md-12">
    <form class="form-horizontal" action="<?php echo base_url('execute/put_event');?>" method="POST">
      <input type="hidden" name="idEvent" id="idEvent" value="<?php echo $content['id']; ?>">
      <label for="nameEvent">Tên sự kiện</label>
      <input type="text" name="nameEvent" id="nameEvent" value="<?php echo $content['nameEvent']; ?>" class="form-control" placeholder="Nhập tên sự kiện" required>
      <label for="timeStart">Giờ bắt đầu</label>
      <input type="time" name="timeStart" id="timeStart" value="<?php echo $content['timeStart']; ?>" class="form-control" required>
      <label for="timeEnd">Giờ kết thúc</label>
      <input type="time" name="timeEnd" id="timeEnd" value="<?php echo $content['timeEnd']; ?>" class="form-control" required>
      <label for="dateEvent">Ngày tổ chức</label>
      <input type="date" name="dateEvent" id="dateEvent" value="<?php echo $content['dateEvent']; ?>" class="form-control" required>
      <label for="locationEvent">Địa điểm</label>
      <input type="text" name="locationEvent" id="locationEvent" value="<?php echo $content['locationEvent']; ?>" class="form-control" placeholder="Nhập địa điểm sự kiện" required>
      <label for="descriptionEvent">Mô tả</label>
      <input type="text" name="descriptionEvent" id="descriptionEvent" value="<?php echo $content['descriptionEvent']; ?>" class="form-control" placeholder="Nhập mô tả sự kiện" required>
      <label for="org">Đơn vị tổ chức</label>
      <select class="form-control" name="org">
        <?php
          $chooseOrg = $this->Morg->getOrgById($content['idOrg']);
          echo '<option value="'.$chooseOrg['id'].'" selected>'.$chooseOrg['text'].'</option>';
        ?>
        <?php $org = $this->Morg->getList();
        foreach ($org as $key => $row) {
            echo '<option value="'.$row['id'].'">'.$row['text'].'</option>';
        } ?>
      </select>
      <button type="submit" name="putEvent" class="btn btn-primary">Lưu thay đổi</button>
    </form>
  </div>
</div>
