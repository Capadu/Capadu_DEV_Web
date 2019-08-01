@extends('layouts.dashboard')

@section('title')

    <title>Home</title>

@endsection

@section('header-navigation')

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/AdminLTE/dist/img/user_avatar.png" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{session()->get('user')->email}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="/AdminLTE/dist/img/user_avatar.png" class="img-circle" alt="User Image">

                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">---</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">---</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">---</a>
                            </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">

                        <div class="pull-left">
                            <a href="/" type="submit" class="btn btn-danger">Capadu</a>
                        </div>

                        <div class="pull-right">
                            <form method="post" action="logout">
                                @csrf

                                <button type="submit" class="btn btn-danger">Sign out</button>

                            </form>
                        </div>

                    </li>
                </ul>
            </li>


        </ul>
    </div>

@endsection

@section('sidebar')

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="header">Profesor</li>
        <li>
            <a href="../dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">Capadu Tests</li>
        <li>
            <a href="../../dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">My Files</li>
        <li>
            <a href="../../dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">My Web Pages</li>
        <li>
            <a href="../../page_settings">
                <i class="fa fa-dashboard"></i> <span>Page Settings</span>
            </a>
        </li>
        <li>
            <a href="../../page_manager">
                <i class="fa fa-dashboard"></i> <span>Manage Pages</span>
            </a>
        </li>
        <li>
            <a href="../create">
                <i class="fa fa-dashboard"></i> <span>Create New Page</span>
            </a>
        </li>

    </ul>

@endsection

@section('content')

    <div class="container">
        <form method="post" action="../edit/{{$page->id}}">
            @csrf

            <div class="form-group">
                <label for="route">Route</label>
                <input type="text" class="form-control" id="route" name="route" value="{{$page->route}}">
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$page->title}}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="7" name="content_data"></textarea>
            </div>

            <button type="submit">Submit</button>

        </form>
    </div>

@endsection

@section('custom-scripts')

    @include('mceImageUpload::upload_form')

    <script src="/Plugins/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'#content',
            height: 300,
            theme: 'modern',
            plugins: [
                'image imagetools'
            ],
            toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                // trigger file upload form
                if (type == 'image') $('#formUpload input').click();
            }
        });

    </script>

    <script>
        $(document).ready(function() {
            tinymce.get('content').setContent('{!! $page->content !!}');
        });
    </script>

@endsection
