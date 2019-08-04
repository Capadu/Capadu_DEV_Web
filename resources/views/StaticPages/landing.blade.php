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
    <link href="/css/landing/main.css" rel="stylesheet">

</head>


<body>

<!-- JS loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div id="MainSection" class="container">

    <img src="/Common/img/logo.png"  width="280px" height="280px" />

    <form action="http://192.168.10.190:3000/player/">

        <input type = "text" name= "name" placeholder="Numele" autofocus/>

        <input type= "text" name= "pin" placeholder="ID-ul" autofocus/>

        <button>Join</button>

    </form>

    <p>Creeză o cameră gratis la platforma <a href="/main"> Capadu </a> </p>

</div>

<div id="particles-js"></div>

<!-- jQuery 3 -->
<script src="/Plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Plugins/Bootstrap/bootstrap.min.js"></script>
<!-- JS loader-->
<script src="/Plugins/Screen_Loader/loader.js"></script>

<!-- Particles -->
<script src="/Plugins/Particles/particles.js"></script>
<script src="/js/landing/particles_attributes.js"></script>

</body>

</html>
