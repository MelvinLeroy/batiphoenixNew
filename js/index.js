

function check(value,num){
  if(value.length > 0){
   	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "-16px");
    $("#span" + num).css("font-size", "12px");
  }else{
    $("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "0");
    $("#span" + num).css("font-size", "14px"); 
  }
  if(value.length === 0){
   	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "0");
    $("#span" + num).css("font-size", "14px"); 
  }
  if(value.length > 0){
  	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "-16px");
    $("#span" + num).css("font-size", "12px");
  }
  if(value.length == 0){
  	$("#span"+num).append('<div class="error"></div>');
  }else{
  	$(".error").empty();
  }
 }
 
function checkDevice(value,num){
  if(value.length > 0){
    $("#spanDevice" + num).css("transition-duration", "0.5s");
    $("#spanDevice" + num).css("top", "-16px");
    $("#spanDevice" + num).css("font-size", "12px");
  }else{
    $("#spanDevice" + num).css("transition-duration", "0.5s");
    $("#spanDevice" + num).css("top", "0");
    $("#spanDevice" + num).css("font-size", "14px"); 
  }
  if(value.length === 0){
    $("#spanDevice" + num).css("transition-duration", "0.5s");
    $("#spanDevice" + num).css("top", "0");
    $("#spanDevice" + num).css("font-size", "14px"); 
  }
  if(value.length > 0){
    $("#spanDevice" + num).css("transition-duration", "0.5s");
    $("#spanDevice" + num).css("top", "-16px");
    $("#spanDevice" + num).css("font-size", "12px");
  }
  if(value.length === 0){
    $("#spanDevice"+num).append('<div class="error"></div>');
  }else{
    $(".error").empty();
  }
 }

$('document').ready(function () {
      var Closed = false;

      $('.hamburger').click(function () {
        if (Closed == true) {
          $(this).removeClass('open');
          $(this).addClass('closed');
          Closed = false;
        } else {               
          $(this).removeClass('closed');
          $(this).addClass('open');
          Closed = true;
        }
      });
});




