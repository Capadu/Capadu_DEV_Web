function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Inregistrare');
    });

}
function showLoginForm(){
    $('#authModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Conectare');
    });
}

function openAuthModal(){
    showLoginForm();
    setTimeout(function(){
        $('#authModal').modal('show');
    }, 230);

}
