$(function(){
    $('#tkb').on('click', 'td', function(){
		//alert($(this).html());
		if ($(this).html()!="_____"){
			load_ajax($(this).html());
		}else {
			$('#kqTKB').html("N/A");
		}
  });
});

function load_ajax(monhoc){
    $.ajax({
        url : "app/action.php",
        type : "post",
        dateType:"text",
        data : {
            tenmon : monhoc
        },
    success : function (result){
			//alert(result);
			var kq = $.parseJSON(result);
			var TEN_MON = kq.TEN_MON;
			var PHONG = kq.PHONG;
			var NHOM = kq.NHOM;
			var DESC = kq.DESC;
    	$('#kqTKB').html("<b>Học phần: </b>" + TEN_MON + "<br><b>Phòng: </b>" + PHONG + "<br><b>Nhóm: </b>" + NHOM + "<br><b>Ghi chú: </b>" + DESC);
    }
  });
}

//editDevice
$('#update_subject').on('show.bs.modal', function(e) {
  var monhoc = $(e.relatedTarget).data('monhoc');
  $("#toMonhoc").val(monhoc);
  var phong = $(e.relatedTarget).data('phong');
  $("#toPhong").val(phong);
  var thu = $(e.relatedTarget).data('thu');
  $("#toThu").val(thu);
  var tietbd = $(e.relatedTarget).data('tietbd');
  $("#toTietbd").val(tietbd);
  var sotiet = $(e.relatedTarget).data('sotiet');
  $("#toSotiet").val(sotiet);
  var nhom = $(e.relatedTarget).data('nhom');
  $("#toNhom").val(nhom);
  var mota = $(e.relatedTarget).data('mota');
  $("#toMota").val(mota);
});
