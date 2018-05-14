<div class="container">
  <table class="table table-striped" id="<?php echo $idTable; ?>">
    <thead>
      <th>ID</th>
      <th>MSSV</th>
      <th>Họ</th>
      <th>Tên</th>
      <th>Ngành học</th>
      <th>Khoa/Viện</th>
    </thead>
    <tbody>
      <?php
      // $json = json_decode(file_get_contents(base_url('user.json')));
      foreach ($resultTable->user as $index => $obj): ?>
        <tr>
          <td><?php echo $obj->id; ?></td>
          <td><?php echo $obj->studentID; ?></td>
          <td><?php echo $obj->lastNameStudent; ?></td>
          <td><?php echo $obj->firstNameStudent; ?></td>
          <td><?php echo $obj->major; ?></td>
          <td><?php echo $obj->faculty; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
