$(document).ready(function(){
    $('#menuDeviceContainer').hide();
    $('.hamburger').on("click", function(){
        $('#menuDeviceContainer').slideToggle(300);
    });
});
