<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="section-header-wrap section-header-default">
            <div class="section-header">Hoạt động đang diễn ra trong ngày</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 1) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/organizations/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động sắp diễn ra trong tuần</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 2) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/organizations/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động sắp diễn ra trong tương lai</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 3) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/organizations/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động đã diễn ra</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 0) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/organizations/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
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
