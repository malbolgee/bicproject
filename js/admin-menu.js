$(document).ready(function(){
    $('.navbar-burger').click(function(){
        $('.navbar-burger').toggleClass('is-active');
        $('.navbar-menu').toggleClass('is-active');
    });
});

document.getElementById('user-profile-picture').addEventListener('click', function(){
    document.getElementById('userfile').click();
})

function button_fade_close()
{

    $('.delete').click(function(){
        $('#notification').fadeOut('slow', 'swing');
    });

}

$(document).ready(function(){

    var btn_close = $('#is-btn-modal-close');
    var modal = $('#modal-div');
    var modal_background = $('#modal-background');

    btn_close.click(() => { modal.toggleClass('is-active')});
    modal_background.click(() =>{ modal.toggleclass('is-active')});

});

$(document).ready(function(){


    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        customClass: 'is-croppie-demo',
        viewport: {
            width: 256,
            height: 256,
            type: 'circle'
        },
        boundary: {
            width: 475,
            height: 475
        }
    });

    $('#userfile').change(function(){

        const fileReader = new FileReader();

        fileReader.onload = function(event){

            $image_crop.croppie('bind', {
                url: event.target.result
            })

        };

        var img_demo = document.getElementById('image_demo');
        var footer = document.getElementById('modal-footer-slider');

        if (img_demo.childNodes[1])
        {

            var cr_wrap = img_demo.childNodes[1];
            img_demo.removeChild(img_demo.childNodes[1]);

            var span_icon_small = document.createElement('SPAN');
            var span_icon_big = document.createElement('SPAN');

            var icon_img_small = document.createElement('I');
            var icon_img_big = document.createElement('I');

            span_icon_small.classList.add('is-span-icon-left');
            span_icon_big.classList.add('is-span-icon-right');
            icon_img_small.classList.add('far', 'fa-image');
            icon_img_big.classList.add('far', 'fa-image', 'fa-2x');

            span_icon_small.appendChild(icon_img_small);
            span_icon_big.appendChild(icon_img_big);

            cr_wrap.insertBefore(span_icon_small, cr_wrap.childNodes[0]);
            cr_wrap.appendChild(span_icon_big);
            footer.appendChild(cr_wrap);

        }

        fileReader.readAsDataURL(this.files[0]);
        $('.modal').toggleClass('is-active');

        });

        $('#crop-accept-upload').click(function(){

            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url: 'controllers/users.contr.php',
                    method: 'POST',
                    data: {'image': response},
                    success: function(data){
                        $('#modal-div').fadeOut('slow', function(){
                            $('#user-profile-picture').attr('src', data);
                        });
                        
                    }
                })

            })

        });

    }); 