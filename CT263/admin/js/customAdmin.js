$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).parent().find('#img-product-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    var upload_btn = document.querySelectorAll("input#uploadBtn");
    // console.log(upload_btn.length);
    for (i = 0, n = upload_btn.length; i < n; i++) {
        upload_btn[i].addEventListener("change", function () {
            // $(this).parentsUntil("div.img-product").append("<p>dafhdsajkfhskja hf </p>")


            var parent = $(this).parent().parent(".img-product");
            console.log(parent.find('#img-product-upload').length);

            parent.find("#cancel-upload").show();

            parent.find('#img-product-upload').attr('src',URL.createObjectURL(this.files[0]));
        });
    }

    var cancel_btn = document.querySelectorAll("#cancel-upload");
    // console.log(cancel_btn.length);
    for (i = 0, n = cancel_btn.length; i < n; i++) {
        cancel_btn[i].onclick = function () {
            var parent = $(this).parent().parent(".img-product");

            parent.children('#uploadBtn').val("");
            parent.find('#img-product-upload').attr('src',$(this).parent().children('#old-url').val());
            $(this).hide();
        };
    }
    //
    // $("#cancel-upload").click(function () {
    //     $(this).parentsUntil("div.img-product").children('#uploadBtn').val("");
    //     $(this).parentsUntil("div.img-product").find('img#img-product-upload').attr('src',$(this).parent().children('#old-url').val());
    //     $(this).hide();
    // });


    $('#check-all').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
});