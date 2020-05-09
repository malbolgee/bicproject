$(document).ready(function(){
    $('.navbar-burger').click(function(){
        $('.navbar-burger').toggleClass('is-active');
        $('.navbar-menu').toggleClass('is-active');
    });
});

$(document).ready(function(){
    $('.is-user-picture').click(function(){
        $('.modal').toggleClass('is-active');
    });
});

$(document).ready(function(){
    $('.modal-background').click(function(){
        $('.modal').toggleClass('is-active');
    });
});

document.getElementById('user-choose-picture').addEventListener('click', function(){
    document.getElementById('user-choose-picturev').click();
})

function button_fade_close()
{

    $('.delete').click(function(){
        $('#notification').fadeOut('slow', 'swing');
    });

}