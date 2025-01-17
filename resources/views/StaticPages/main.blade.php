<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Capadu</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/Plugins/Bootstrap/bootstrap.min.css">
    <!-- Loader -->
    <link rel="stylesheet" href="/Plugins/Screen_Loader/loader.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/Plugins/fontawesome/css/all.css">

    <!-- Custom styles for this page -->
    <link href="/css/main/contact_form.css" rel="stylesheet">
    <link href="/css/main/main.css" rel="stylesheet">
    <link href="/css/main/login-register.css" rel="stylesheet">

</head>

<div class="modal fade login" id="authModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ Lang::get('main.Con') }}</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div class="box">
                    <div class="content">

                        <div id="login_errors"></div>

                        <form class="loginBox" onsubmit="event.preventDefault(); loginAjax();">
                            <input id="login_email" class="form-control" type="text" placeholder="Email" name="email">
                            <input id="login_password" class="form-control" type="password" placeholder="Parola" name="password">
                            <button type="submit" class="btn btn-primary btn-xl rounded-pill mt-5">{{ Lang::get('main.Con') }}</button>
                        </form>

                    </div>
                </div>

                <div class="box">
                    <div class="content registerBox" style="display:none;">

                        <div id="register_errors"></div>

                        <form onsubmit="event.preventDefault(); registerAjax();">
                            <input id="register_nume" class="form-control" type="text" placeholder="Nume" name="nume">
                            <input id="register_unitate_de_invatamant" class="form-control" type="text" placeholder="Unitate de invatamant" name="unitate_de_invatamant">
                            <input id="register_email" class="form-control" type="email" placeholder="Email" name="email">
                            <input id="register_password" class="form-control" type="password" placeholder="Parola" name="password">
                            <input id="register_password_confirmation" class="form-control" type="password" placeholder="Repeata Parola" name="password_confirmation">
                            <button type="submit" class="btn btn-primary btn-xl rounded-pill mt-5">{{ Lang::get('main.inregistrare1') }}</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="forgot login-footer text-white">
                        <span>{{ Lang::get('main.vreti_sa') }}
                             <a href="javascript: showRegisterForm();">{{ Lang::get('main.creeati') }}</a>
                        </span>
                </div>
                <div class="forgot register-footer text-white" style="display:none">
                    <span>{{ Lang::get('main.aveti') }}</span>
                    <a href="javascript: showLoginForm();">{{ Lang::get('main.Con') }}</a>
                </div>
            </div>

        </div>
    </div>
</div>

<body>

<!-- JS loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">

    <div class="container">

        <a class="navbar-brand" href="#">Capadu</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">{{ Lang::get('main.acces') }}</a>
                </li>

                @if(Session::has('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" href="javascript:void(0)" onclick="openAuthModal();">{{ Lang::get('main.Con') }}</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="#about">{{ Lang::get('main.despre') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

                <li class="nav-item">
                    <div class="search_bar">
                        <form method="post" action="/search">
                            @csrf

                            <input type="text" placeholder="Search" name="route" autofocus/>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </li>

            </ul>
        </div>

    </div>

</nav>

<header class="masthead text-center text-white">
    <div id="capadu"> <img src="/Common/img/logo.png"/> </div>

    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">CAPADU</h1>
            <h2 class="masthead-subheading mb-0">{{ Lang::get('main.flex') }}</h2>
            <a href="/" class="btn btn-primary btn-xl rounded-pill mt-5">{{ Lang::get('main.acces') }}</a>
        </div>
    </div>

    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>

</header>

<div id="shield">

    <div class="col-container">

        <div class="col" id="section1">

            <div class="text-center">
                <h1 class="text-white shield_title">{{ Lang::get('main.elevi') }}</h1>
                <a href="/" class="btn rounded-pill red text-white">{{ Lang::get('main.plat_elevi') }}</a>
                <p class="infotext text-white">{{ Lang::get('main.plat') }}</p>
            </div>

        </div>

        <div class="col" id="section2">

            <div class="text-center">
                <h1 class="text-white shield_title">{{ Lang::get('main.prof') }}</h1>
                <a href="javascript:void(0)" class="btn rounded-pill orange text-white" onclick="openAuthModal();">{{ Lang::get('main.plat_prof') }}</a>
                <p class="infotext text-white">{{ Lang::get('main.create') }}</p>
            </div>

        </div>

    </div>

    <!-- About Section -->
    <div class="container" id="about">
        <h2 class="text-center infotext2" style="color: #bd0716;">{{ Lang::get('main.despre') }}</h2>
        <hr class="black_underline">
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="infotext1">{{ Lang::get('main.text1') }}</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="infotext1">{{ Lang::get('main.text2') }}</p>
            </div>
        </div>
    </div>

    <div class="features" id="features">

        <div class="text-center">
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="text-black infotext2" style="color: #bd0716;">{{ Lang::get('main.ev') }}</h2>
                    <hr class="black_underline">
                </div>
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <div class="device-container">
                            <div class="">
                                <div class="device">
                                    <div class="screen">
                                        <img src="/Common/img/phone.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="fa fa-mobile figurine" style="font-size:100px;color: #bd0716;"></i>
                                        <h3>{{ Lang::get('main.mob') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="fa fa-brain figurine" style="font-size:100px;color: #bd0716;"></i>
                                        <h3>{{ Lang::get('main.inv') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle figurine" style="font-size:100px;color: #bd0716;"></i>
                                        <h3>{{ Lang::get('main.luc') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="fab fa-accusoft figurine" style="font-size:100px;color: #bd0716;"></i>
                                        <h3>{{ Lang::get('main.intre') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="proiectul">

        <div class="col-lg-8 text-center">
            <h2 class="section-heading text-white">{{ Lang::get('main.pro') }}</h2>
            <hr class="white_underline">
            <h6 class="text-white mb-4">{{ Lang::get('main.text3') }}</h6>
        </div>

    </div>

    <div id="contact">

        <div class="container">

            <h2 class="section-heading text-white text-center">Contact</h2>
            <hr class="white_underline">

            <form class="contact-form" method="POST" action="/feedback/website">
                @csrf
                
                <div class="form-group">
                    <label class="text-white">{{ Lang::get('main.em') }}</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label class="text-white">{{ Lang::get('main.s') }}</label>
                    <input type="text" class="form-control" name="subiect">
                </div>

                <div class="form-group">
                    <label class="text-white">{{ Lang::get('main.m') }}</label>
                    <textarea class="form-control" name="mesaj" rows="6"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-xl rounded-pill mt-5">{{ Lang::get('main.t') }}</button>

            </form>

        </div>
    </div>

    <div id="footer"> <h8 class="text-white">Copyright Capadu 2019</h8> </div>

</div>


<!-- jQuery 3 -->
<script src="/Plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Plugins/Bootstrap/bootstrap.min.js"></script>
<!-- JS loader-->
<script src="/Plugins/Screen_Loader/loader.js"></script>

<!-- Custom scripts for this page -->
<script src="/js/main/login-register.js"></script>

<!-- Set values for CRUD Modules -->
<script> set_token("{{ csrf_token() }}");</script>

</body>

</html>
