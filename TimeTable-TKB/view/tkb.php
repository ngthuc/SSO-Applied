<?php
/* Example
+--------------------------------------------------------------------+
| STT |    TEN_MON     |   PHONG   |   THU   |  TIET_BD   | SO_TIET  |
|  1  |     LTCB       |  101/C1   |    2    |     1      |    4     |
|  2  |     THCB       |  201/C1   |    3    |     6      |    3     |
+--------------------------------------------------------------------+
*/

//Bien $monhoc la mang chua cac dong trong bang du lieu tren
require 'app/DB.php';

$tkb = array(
    array(),
    array(),
    array(),
    array(),
    array(),
    array(),
    array(),
    array(),
    array()
);

foreach ($dbtkb as $mon) {
  if ($mon["TEN_MON"] != "") {
    $THU = $mon["THU"];
    $TIET_DAU = $mon["TIET_BD"];
    $TIET_CUOI = $mon["TIET_BD"] + $mon["SO_TIET"] - 1;
    for ($i = $TIET_DAU; $i <= $TIET_CUOI; $i++) {
        $tkb[$THU-2][$i-1] = $mon["TEN_MON"];
    }
  }
}

// var_dump($tkb);

echo '
<table id="tkb" class="table table-bordered">
  <thead>
    <tr>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
      <th>Sat</th>
    </tr>
  </thead>
  <tbody>';
for ($tiet = 0; $tiet < 10; $tiet++) {
  echo "
  <tr>";
    for ($thu = 0; $thu < 6; $thu++) {
        echo "
        <td data-toggle='modal' data-target='#mhModal'>";
        echo isset($tkb[$thu][$tiet]) ? $tkb[$thu][$tiet] : "_____";
        echo "</td>";
    }
    echo "
    </tr>
    ";
}
echo '</tbody>
</table>
';
?>
