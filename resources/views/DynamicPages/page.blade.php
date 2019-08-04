<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Pagina</title>

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
    <link href="/css/page/main.css" rel="stylesheet">

</head>


<body>

<!-- JS loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div class="head"> 
    <div class="navigation_menu"> <a href="../{{$page->master->route}}">Back</a> </div>
    <div class="page_section text-center"> 
        <i class="fa fa-globe"></i> 
        <h1>{{$page->title}}</h1>
    </div> 
    <div class="search_bar">
        <form method="post" action="/search">
            @csrf

            <input type="text" placeholder="Search" name="route" autofocus/>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="container-fluid content-page">
    {!! $page->content !!}
</div>

<div id="contact">

    <div class="container">



        <hr class="white_underline">
        <h2 class="section-heading text-white text-center">Feed-back</h2>
        <hr class="white_underline">

        <div class="comments">
            
            <div class="comment card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4 user_avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="white_underline">
        <h2 class="section-heading text-white text-center">Evaluează aceasta pagina</h2>
        <hr class="white_underline">

        <form class="contact-form" method="POST" action="/feedback/website">
            @csrf

            <div class="form-group">
                <label class="text-white">Nume</label>
                <input type="text" class="form-control" name="nume">
            </div>

            <div class="form-group">
                <label class="text-white">Mesaj</label>
                <textarea class="form-control" name="mesaj" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-warning btn-xl rounded-pill mt-5" style="color: white;">{{ Lang::get('main.t') }}</button>

        </form>

    </div>

</div>

<!-- jQuery 3 -->
<script src="/Plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Plugins/Bootstrap/bootstrap.min.js"></script>
<!-- JS loader-->
<script src="/Plugins/Screen_Loader/loader.js"></script>

</body>

</html>
