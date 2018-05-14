<div class="container">
        <div class="col-sm-4 hidden-xs">
            <img src="http://www.cit.ctu.edu.vn/quanlylaodong/img/banner.png" style="width:100%"><p style=" text-align: justify;"><font color="#000066">Với sự kết nối với máy chủ của trường. Giờ đây bạn có thể đăng nhập bằng chính tài khoản có sẵn của Trung tâm Thông tin và quản trị mạng </font><font color="#ff0033">(tài khoản đăng nhập máy tính)</font></p>        </div>
        <div class="col-sm-4">
            <script src="http://cit.ctu.edu.vn/quanlylaodong/js/jquery.marquee.js"></script>
<style>
	#list-wrpaaer{
		border-left: 5px solid #5BC0DE;
	  	background-color: rgba(238, 238, 238, 0.37);
	}
	#marquee-vertical{
		padding: 15px;
		list-style-type: none;
	}
	#marquee-vertical li{
		border-bottom: 1px solid #ddd;
	}
	#marquee-vertical li a{
		text-decoration: none;
	}
	#marquee-vertical li a h4{
		margin-bottom: 5px;
	}
	#marquee-vertical li span{
		color: #919191;
	}
	.label{
	  font-weight: 400;
	}
</style>
	<h3 style=""><span class="label label-info"><i class="fa fa-comments"></i> Thông báo</span></h3>
	<div id="list-wrpaaer" style="height:338px">
     <ul id="marquee-vertical" style="width: 100%">
                     <li>
         <a href="http://cit.ctu.edu.vn/quanlylaodong/thongbao/8">
         	<h4><i class="glyphicon glyphicon-globe"></i> Tham gia tình nguyện hè</h4>
         </a>
     	<span><i class="fa fa-user"></i> Trần Minh Tân</span>&nbsp;&nbsp;&nbsp;<span><i class="fa fa-calendar"></i> 2017-12-07</span>
       </li>
              <li>
         <a href="http://cit.ctu.edu.vn/quanlylaodong/thongbao/6">
         	<h4><i class="glyphicon glyphicon-globe"></i> Đem thẻ sinh viên khi đi lao động</h4>
         </a>
     	<span><i class="fa fa-user"></i> Quản trị hệ thống</span>&nbsp;&nbsp;&nbsp;<span><i class="fa fa-calendar"></i> 2017-12-07</span>
       </li>
              <li>
         <a href="http://cit.ctu.edu.vn/quanlylaodong/thongbao/5">
         	<h4><i class="glyphicon glyphicon-globe"></i> Đăng ký lao động</h4>
         </a>
     	<span><i class="fa fa-user"></i> Quản trị hệ thống</span>&nbsp;&nbsp;&nbsp;<span><i class="fa fa-calendar"></i> 2017-12-07</span>
       </li>
            </ul>
  </div><!-- list-wrpaaer -->
 	<div>
 		<a href="http://cit.ctu.edu.vn/quanlylaodong/thongbao" style="text-decoration: none;">Xem tất cả </a>
 	</div>

<script>
    $(function(){
      $('#marquee-vertical').marquee();
    });
</script>
</div>
        <div class="col-sm-4">
            <h3 class="title">Đăng nhập</h3>
            <div class="panel panel-default panel-login">
                <div class="panel-body">
                    <form class="form-signin" action="login" method="POST">
                        <img src="http://cit.ctu.edu.vn/quanlylaodong/img/login-user.png" class="img-responsive" style="margin: 5px auto 20px auto;   border: 1px solid #ddd;border-radius: 50%;padding: 3px;"/>
                                                                        <label for="username" class="sr-only">Tên người dùng</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Tên người dùng" required="" autofocus="">
                        <label for="password" class="sr-only">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required="">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
