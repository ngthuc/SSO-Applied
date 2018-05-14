<?php

// Khu vuc xu ly
if (isset($_POST["adminLogin"])) {
    new Login($_POST['uid'],$_POST['pwd'],$dbuser,$session,$_DOMAINS);
} else if (isset($_POST["logout"])) {
    new Logout('Đăng xuất thành công',$session,$_DOMAINS);
}
// else {
//     new Danger($_DOMAINS,'Truy cập bị cấm');
// }
?>
