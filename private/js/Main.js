$(document).ready(function(){
    $('#main-navigation').hide();
    $('#btnAuth').click(function(){
       $('#loginSplash').html($('#login').val());
       $('#authForm').remove();
       $('#main-navigation').show();
       $('#body').load('../html/journal.php');
    });
    $('.custom-nav-item').click(function(){
        switch($(this).attr('id')){
            case 'nav-create-ticket':
                $('#body').load('../html/ticket.php');
                break;
            case 'nav-journal':
                $('#body').load('../html/journal.php');
                break;
            case 'nav-confirm-ticket':
                break;
        }
    });

});