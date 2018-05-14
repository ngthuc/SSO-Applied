<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Hoạt động của <?php if ($contentPage) { echo $nameOrg['text']; } ?></div>
      </div>
      <div class="row">
        <?php
          if ($contentPage) {
            foreach ($contentPage as $key => $row) {
              $timestart = $row['dateEvent'].' '.$row['timeStart'];
              echo '<div class="col-6">
                <div class="col-md-6">
                  <div class="form-activity">
                    <div class="form-header">
                      <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                    </div>
                    <div class="pull-right">
                      <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                    <div class="form-organization">
                      <a href="'.base_url('/organizations/org/'.$row['idOrg'].'/').'">'.$nameOrg['text'].'</a>
                    </div>
                  </div>
                </div>
              </div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</div>
