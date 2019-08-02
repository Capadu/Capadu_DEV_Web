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
        <li class="active">
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
        <li>
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

<div class="container">

    <div class="text-center">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Ultima Actiune : </strong> 
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6><b>Capacitate de stocare disponibila</b></h6>
                </div>
                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <h5>Disponibil/Total : {{$files_storage->available_space."/".$files_storage->total_space}}</h5>
                    </div>

                    @php
                        $percentage = $files_storage->used_space / $files_storage->total_space * 100;
                    @endphp

                    <div class="input-group mb-3">
                        <div class="progress" style="width:70%">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$percentage.'%'}};">
                                {{ $percentage.'%'}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 ">
            <div class="card shadow mb-4">
            
                <div class="card-header py-3">
                    <div class="row">
                        <h6 style="margin:10px;" ><b>Incarca materiale</b></h6>

                        <div id="upload-progress" class="progress" style="width:60%; margin-left: 7px; margin-right: 7px; margin-top: 14px;">
                            <div id="upload-bar" class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                0%
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <form method="post" action="/action-upload" enctype="multipart/form-data">
                            @csrf

                            Selecteaza un material:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" class="btn btn-primary btn-block" value="Incarca Materialul" name="submit" style="width:70%; margin-top: 10px;">
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

    <div class="col-13">
        <div class="card shadow mb-4">

            <div class="card-header text-center py-3">
                <h6><b>Lista materialelor</b></h6>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Marime</th>
                        <th>Data Incarcarii</th>
                        <th>Link</th>
                        <th>Actiune</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Nume</th>
                        <th>Marime</th>
                        <th>Data Incarcarii</th>
                        <th>Link</th>
                        <th>Actiune</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    
                    @foreach($files_storage->files as $file)
                        <tr>
                            <td>{{$file->file_name}}</td>
                            <td>{{$file->file_size}} MB</td>
                            <td>{{$file->created_at}}</td>
                            <td>http://capadu/action-download/{{$file->route}}</td>
                            <td>

                            <div class="custom-row">
                            
                                <form method="post" action="/action-delete/{{$file->ruta}}">
                                    @csrf

                                    <input type="submit" class="btn btn-primary btn-block" value="Sterge">
                                </form>

                                
                                <a href="http://capadu/action-download/{{$file->route}}" class="btn btn-primary btn-block">Descarca</a>
                                

                            </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                </div>

            </div>
        </div>
    </div>    

</div>


@endsection
