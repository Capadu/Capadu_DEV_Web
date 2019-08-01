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
            <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">Capadu Tests</li>
        <li>
            <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">My Files</li>
        <li>
            <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">My Web Pages</li>
        <li>
            <a href="page_settings">
                <i class="fa fa-dashboard"></i> <span>Page Settings</span>
            </a>
        </li>
        <li class="active">
            <a href="page_manager">
                <i class="fa fa-dashboard"></i> <span>Manage Pages</span>
            </a>
        </li>
        <li>
            <a href="page_manager/create">
                <i class="fa fa-dashboard"></i> <span>Create New Page</span>
            </a>
        </li>

    </ul>

@endsection

@section('content')

    <div class="box">
        <div class="box-body">
            <table id="pages" class="table table-bordered table-striped" style="width:100%">

                <thead>
                <tr>
                    <th>Title</th>
                    <th>Last edit</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>

                @foreach($pages as $page)
                    <tr class="data-row">
                        <td> {{$page->title}} </td>
                        <td> {{$page->updated_at}} </td>
                        <td>
                            <a class="btn btn-primary" href="page_manager/read/{{$page->id}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <form method="POST" action="page_manager/delete/{{$page->id}}">
                                @csrf

                                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Last edit</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>

            </table>
        </div>
    </div>

@endsection

@section('custom-scripts')


<script>
    $(function () {
        $('#pages').DataTable({
            "scrollX": true
        });

    });

</script>

@endsection
