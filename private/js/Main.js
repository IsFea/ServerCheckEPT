$(document).ready(function(){
    $('#main-navigation').hide();
    $('#btnAuth').click(function(){
       $('#loginSplash').html($('#login').val());
       $('#authForm').remove();
       $('#main-navigation').show();
       $('#body').load("../html/ticket.php");
    });

});