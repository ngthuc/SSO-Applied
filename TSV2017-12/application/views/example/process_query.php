<div class="container">
  <legend>Kết quả truy vấn</legend>
  <h3>Bạn đang truy vấn đến người dùng có mã số: <?php echo $query; ?></h3>
  <span><strong>ID: </strong> <?php echo $resultUser['id']; ?></span><br>
  <span><strong>MSSV: </strong> <?php echo $resultUser['studentID']; ?></span><br>
  <span><strong>Họ tên: </strong> <?php echo $resultUser['lastNameStudent'].' '.$resultUser['firstNameStudent']; ?></span><br>
  <span><strong>Ngành học: </strong> <?php echo $resultUser['major']; ?></span><br>
  <span><strong>Khoa/Viện: </strong> <?php echo $resultUser['faculty']; ?></span><br>
</div>
