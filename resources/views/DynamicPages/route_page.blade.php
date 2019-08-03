<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Ruta</title>

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
    <link href="/css/route_page/main.css" rel="stylesheet">

</head>


<body>

<!-- JS loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div class="head"> 
    <div class="navigation_menu"> <a href="../../main">Home</a> </div>
    <div class="user_section text-center"> 
        <i class="far fa-user-circle"></i> 
        <h1>{{$page_master->user->nume}}</h1>
    </div> 
    <div class="search_bar">
        <form method="post" action="/search">
            @csrf

            <input type="text" placeholder="Search" name="route" autofocus/>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    
</div>


<div class="center_children">
    @foreach($page_master->pages as $page)

        <a class="btn btn-warning page-linker" href="{{$page_master->route}}/{{$page->route}}">{{$page->title}}</a>

    @endforeach
</div>

<!-- jQuery 3 -->
<script src="/Plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Plugins/Bootstrap/bootstrap.min.js"></script>
<!-- JS loader-->
<script src="/Plugins/Screen_Loader/loader.js"></script>

</body>

</html>
