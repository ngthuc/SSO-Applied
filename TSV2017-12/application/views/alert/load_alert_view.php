<link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>';

<div class="<?php echo $div_alert; ?>">
  <?php
  if ($type && $url && $content) {
    echo '<div class="alert alert-'.$type.'">'.$content.'</div>
        <script type="text/javascript">
        setTimeout(function () {
           window.location.href = "'.$url.'"; //will redirect to your blog page (an ex: blog.html)
        }, 2000); //will call the function after 2 secs.
        </script>';
    } else echo '<div class="alert alert-info">Redirect to recent page!</div>
       <script type="text/javascript">
       setTimeout(function () {
         window.history.go(-1); //will redirect to your blog page (an ex: blog.html)
       }, 2000); //will call the function after 2 secs.
       </script>';
  ?>
</div>
