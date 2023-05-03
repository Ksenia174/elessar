$(document).ready(function(){
    $('.header__burger').click(function(e){
        $('.header__burger, .header_menu').toggleClass('active');
        $('body').toggleClass('lock');
    })
})