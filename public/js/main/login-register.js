var token = "";

function set_token(value) {
    token = value;
}

function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Înregistrare');
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

function loginAjax() {

    $.post("login",
        {
            "_token": token,
            "email": $('#login_email').val(),
            "password": $('#login_password').val(),
        },

        function(data){
            if (data.success == 1) {
                document.location.href = '/dashboard';
            }
            else {
                if (jQuery.isEmptyObject(data)) {
                    location.reload();
                }

                var error_list = "";
                jQuery.each(data.errors, function(key, value){
                    error_list = error_list + ('<ol><li>' + value + '</li></ol>');
                });

                var generated_alert = '<div class="alert alert-danger alert-dismissible show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> ' + error_list + '  </div>';
                document.getElementById("login_errors").innerHTML = generated_alert;
            }
        }
    );

}

function registerAjax() {

    $.post("register",
        {
            "_token": token,
            "nume": $('#register_nume').val(),
            "unitate_de_invatamant": $('#register_unitate_de_invatamant').val(),
            "email": $('#register_email').val(),
            "password": $('#register_password').val(),
            "password_confirm": $('#register_password_confirmation').val(),
        },

        function(data){
            if (data.success == 1) {
                document.location.href = '/dashboard';
            }
            else {
                if (jQuery.isEmptyObject(data)) {
                    location.reload();
                }

                var error_list = "";
                jQuery.each(data.errors, function(key, value){
                    error_list = error_list + ('<ol><li>' + value + '</li></ol>');
                });

                var generated_alert = '<div class="alert alert-danger alert-dismissible show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> ' + error_list + '  </div>';
                document.getElementById("register_errors").innerHTML = generated_alert;
            }
        }
    );

}
