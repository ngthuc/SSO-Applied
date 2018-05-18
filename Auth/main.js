// Hàm load_ajax chuẩn
function load_ajax(url,userid,token_value,execute){
    $.ajax({
        url : url,
        type : "post",
        dateType:"text",
        data : {
            user : userid,
            token : token_value
        },
    success : function (result){
			var kq = $.parseJSON(result);
      var MESSAGE = kq.MESSAGE;
			var USER = kq.TOKEN_RESULT;
      if(MESSAGE === TRUE) {
        setCookie('userid',USER,30); // set cookie on 30 days
        $.html('<meta http-equiv="refresh" content="0,url='+ execute + '.php">')
      }
    	  setCookie('userid',USER,-30);
    }
  });
}

// Hàm thiết lập Cookie
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}
