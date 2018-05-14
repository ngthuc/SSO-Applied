<?php
// Require default
require_once 'app/init.php';

//Chèn header
include 'public/header.php';

//Xac dinh user
if ($user)
{
  // admin bar
  include 'view/admin_bar.php';

  // list subject
  if (isset($_GET['app'])) {
    if ($_GET['app'] == 'listsubject') {
      if ($user)
      {
        include 'view/listsubject.php';
      }
    }
  } else {
    // default page
    include 'view/main.php';
  }
} else {
  // default page
  include 'view/main.php';
}

//Insert action i/o
include 'app/action_io.php';

// Insert modals
include 'view/modals.php';

//Chèn footer
include 'public/footer.php';

?>
