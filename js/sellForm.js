$(window).load(function () {
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview4').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview5').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview6').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image-input1").change(function () {
        readURL1(this);
    });
    $("#image-input2").change(function () {
        readURL2(this);
    });
    $("#image-input3").change(function () {
        readURL3(this);
    });
    $("#image-input4").change(function () {
        readURL4(this);
    });
    $("#image-input5").change(function () {
        readURL5(this);
    });
    $("#image-input6").change(function () {
        readURL6(this);
    });
});

function uncheckButtons() {
    var check1 = document.getElementById("origine-input1");
    var check2 = document.getElementById("origine-input2");

    if (check1.checked) {
        check2.checked = false;
    }
    if (check2.checked) {
        check1.checked = false;
    }
}

$('#surplusitem').on("click", function () {
    $('#origine-input1').prop("checked", true);
   // $('#hidden-surplus').css("display", "none");
    $('#hidden-surplus').fadeIn(500);
});

$('#demolitionitem').on("click", function () {
    $('#origine-input2').prop("checked", true);
   // $('#hidden-surplus').css("display", "none");
    $('#hidden-surplus').fadeIn("slow");
});