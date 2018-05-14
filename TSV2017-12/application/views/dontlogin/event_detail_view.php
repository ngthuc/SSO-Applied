<?php
    $org = $this->Morg->getOrgById($contentPage['idOrg']);
?>
<div class="container">
  <h1><?php echo $contentPage['nameEvent']; ?></h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Thông tin hoạt động</div>
      </div>
      <div class="form-group">
        <span><i class="fa fa-home"></i><strong>Đơn vị tổ chức: </strong></span>
          <a href="<?php echo base_url('/organizations/org/'.$contentPage['idOrg'].'/')?>"><?php echo $org['text']; ?></a>
          <br>
        <span><i class="fa fa-calendar"></i><strong>Thời gian bắt đầu: </strong></span>
          <?php echo $contentPage['timeStart'].' '.$contentPage['dateEvent']; ?>
          <br>
        <span><i class="fa fa-calendar"></i><strong>Thời gian kết thúc: </strong></span>
          <?php echo $contentPage['timeEnd'].' '.$contentPage['dateEvent']; ?>
          <br>
        <span><i class="fa fa-map-marker"></i><strong>Địa điểm: </strong></span>
          <i><?php echo $contentPage['locationEvent']; ?></i>
          <br>
        <span>
          <button class="btn btn-primary" data-toggle="modal" data-target="#registerevent">Đăng ký tham gia</button>
          <!-- <button class="btn btn-success" data-toggle="modal" data-target="#checkjoined">Tra cứu điểm danh</button> -->
        </span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Mô tả chi tiết</div>
      </div>
      <div class="form-group">
        <?php echo $contentPage['descriptionEvent']; ?>
      </div>
    </div>
  </div>
</div>

<!-- modal register -->
<div class="modal fade" id="registerevent" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url('execute/register_event'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Đăng ký tham dự sự kiện</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idEvent" value="<?php echo $contentPage['id']; ?>">
          <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
          <input type="text" name="maso" class="form-control" placeholder="Nhập MSSV/MSCB để đăng ký">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="register">Đăng ký</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- modal check joined -->
<div class="modal fade" id="checkjoined" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo base_url(str_replace( '/nckh/', '', $_SERVER['REQUEST_URI'] )); ?>" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tra cứu điểm danh</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="personalid" class="form-control" placeholder="Nhập mã số cán bộ/sinh viên để tra cứu">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="checked">Tra cứu</button>
        </div>
      </div>
    </form>
  </div>
</div>
