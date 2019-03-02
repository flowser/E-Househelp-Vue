
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!--====== TITLE TAG ======-->
      <title>{{$organisation->name}}</title>

      <!--====== FAVICON ICON =======-->
<link rel="shortcut icon" type="image/ico" href="{{URL::asset('assets/organisation/img/logo/')}}/{{$organisation->logo}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{URL::asset('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">{{$logged_user->full_name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">{{$logged_user->email}}</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off nav-icon blue"></i>
                         <span>{{ __('Logout') }} </span>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link to="/home" class="brand-link">
            <img src="{{URL::asset('assets/admin/default/logo.png')}}" alt="Teif Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Teif BackEnd</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @role('Organisation Director')
                        <img src="assets/organisation/img/directors/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image">
                    @endrole
                    {{--  @role('Organisation Superadmin')
                        <img src="assets/organisation/img/admins/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image">
                    @endrole  --}}
                    @role('Organisation Admin')
                        <img src="assets/organisation/img/admins/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image">
                    @endrole
                    @role('Organisation Employee')
                        <img src="assets/organisation/img/emloyees/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image">
                    @endrole
                </div>
                <div class="info">
                <a href="" class="d-block">
                        {{$logged_user->full_name}}<br>
                        {{$logged_user->position_name}}<br>
                        </a>
                </div>
            </div>

             <!-- Sidebar Menu -->
          <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
               @role('Organisation Superadmin')
                     <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <i class="nav-icon green fas fa-cog"></i>
                                <p> Dashboard </p>
                        </router-link>
                   </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon  red fas fa-cog"></i>
                            <p>Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class="fa fa-users blue  nav-icon"></i>
                                    <p>Users</p>
                                </router-link>
                            </li>
                            <li class="nav-item">

                                <router-link to="/permissions" class="nav-link">
                                    <i class="fa fa-cog red nav-icon"></i>
                                    <p>Roles & Permissions</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                @endrole
                <li class="nav-item">
                    <router-link to="/settings" class="nav-link">
                         <i class="nav-icon red fas fa-tools"></i>
                             <p> Settings </p>
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >

        <!-- Main content -->
        <div class="content">
                <admin-main></admin-main>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar right -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas purple fa-user"></i>
                    <p>
                        Profile
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off nav-icon blue"></i>
                         <p>{{ __('Logout') }} </p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Life is Good
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2011-2020 <a href="https://teifinnovate.foundation">Marines Graphics</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{URL::asset('js/app.js')}}"></script>

</body>
</html>
