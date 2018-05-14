<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Thông tin tổ chức</div>
      </div>
      <div class="form-group">
        <span><strong>Tên tổ chức: </strong><?php echo $name; ?></span><br />
        <span><strong>Tổ chức quản lý: </strong>
          <a href="<?php echo base_url('/organizations/org/'.$parent_id.'/')?>"><?php echo $parent_name; ?></a>
        </span><br />
        <span><strong>Mô tả </strong><?php echo $description; ?></span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Sự kiện của tổ chức</div>
        <div class="section-header"><a href="<?php echo base_url('events/org/4')?>">Xem tất cả</a></div>
      </div>
      <div id="list-wrpaaer" style="height:338px">
        <marquee direction="up" scrollamount="3">
         <ul style="height:258px">
           <?php
             if ($event) {
               foreach ($event as $key => $row) {
                 $timestart = $row['timeStart'].' '.$row['dateEvent'];
                 $author = $this->Maccount->getByUsername($row['userCreator']);
                 echo '<li>
                   <a href="'.base_url('events/event/'.$row['idOrg'].'/').'">
                   	 <h4><i class="glyphicon glyphicon-globe"></i> '.$row['nameEvent'].'</h4>
                   </a>
               	   <span><i class="fa fa-user"></i> '.$author['name'].'</span>&nbsp;&nbsp;&nbsp;<span><i class="fa fa-calendar"></i> '.$timestart.'</span>
                 </li>';
               }
             }
           ?>
          </ul>
        </marquee>
      </div><!-- list-wrpaaer -->
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
      $('#marquee-vertical').marquee();
  });
</script>
