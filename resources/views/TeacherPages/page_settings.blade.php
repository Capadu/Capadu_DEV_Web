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
                            <a href="/" type="submit" class="btn btn-warning">Capadu</a>
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

        <li class="header">Main</li>
        <li>
            <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">Capadu Tests</li>
        <li>
            <a href="http://192.168.10.150:3000/create/quiz-creator/?tocken={{ Session::get('user')->tokens->connection_token }}">  
                <i class="fa fa-magic"></i> <span>Create Capadu</span>
            </a>
        </li>
        <li>
            <a href="http://192.168.10.150:3000/create/?tocken={{ Session::get('user')->tokens->connection_token }}">
                <i class="fa fa-play"></i> <span>Start Capadu</span>
            </a>
        </li>

        <li class="header">My Files</li>
        <li>
            <a href="file_manager">
                <i class="fa fa-file"></i> <span>File Manager</span>
            </a>
        </li>

        <li class="header">My Web Pages</li>
        <li class="active">
            <a href="page_settings">
                <i class="fa fa-cog"></i> <span>Page Settings</span>
            </a>
        </li>
        <li>
            <a href="page_manager">
                <i class="fa fa-globe"></i> <span>Manage Pages</span>
            </a>
        </li>
        <li>
            <a href="page_manager/create">
                <i class="fa fa-plus"></i> <span>Create New Page</span>
            </a>
        </li>

    </ul>

@endsection

@section('content')

    <div class="container">
        <form method="post" action="page_settings/edit/{{$user->pagemaster->id}}">
            @csrf

            <div class="form-group">
                <label for="visible">Visible</label>
                <select class="form-control" id="visible" name="visible">
                    @if ($user->pagemaster->visible == 0)
                        <option value="0" selected="selected" >No</option>
                        <option value="1">Yes</option>
                    @else
                        <option value="0">No</option>
                        <option value="1" selected="selected">Yes</option>
                    @endif

                </select>
            </div>

            <div class="form-group">
                <label for="redirected">Redirected</label>
                <select class="form-control" id="redirected" name="redirected">
                    @if ($user->pagemaster->redirected == 0)
                        <option value="0" selected="selected">No</option>
                        <option value="1">Yes</option>
                    @else
                        <option value="0">No</option>
                        <option value="1" selected="selected">Yes</option>
                    @endif

                </select>
            </div>

            <div class="form-group">
                <label for="redirected_url">Redirect URL</label>
                <input type="text" class="form-control" id="redirected_url" name="redirect_url" value="{{$user->pagemaster->redirect_url}}">
            </div>

            <div class="form-group">
                <label for="route">Route</label>
                <input type="text" class="form-control" id="route" name="route" value="{{$user->pagemaster->route}}">
            </div>

            <button type="submit">Submit</button>

        </form>
    </div>

@endsection
