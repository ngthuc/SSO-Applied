<script type="text/javascript">
// Hàm thiết lập Cookie
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}

var giatri = document.cookie;
if(giatri) {
  alert(giatri);
}
</script>
<button type="button" onclick="setCookie('user','nguyenthuc',1)">SET COOKIE</button>
<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>
