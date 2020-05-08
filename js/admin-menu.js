$(document).ready(function(){
    $('.navbar-burger').click(function(){
        console.log('oi');
        $('.navbar-burger').toggleClass('is-active');
        $('.navbar-menu').toggleClass('is-active');

    });

});