<?php
if (!session_id()) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" href="/public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link type="text/css" rel="stylesheet" href="/public/admin/bower_components/metisMenu/dist/metisMenu.min.css">

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="/public/admin/dist/css/sb-admin-2.css">

    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="/public/admin/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- DataTables CSS -->
    <link type="text/css" rel="stylesheet" href="/public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css">

    <!-- DataTables Responsive CSS -->
    <link type="text/css" rel="stylesheet" href="/public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Admin quản trị</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i><?=$_SESSION['username'];?></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Quản lý trang web</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bars"></i> Danh sách thành viên<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/users/list-user">Tài khoản thành viên</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bars"></i> Danh sách các đội bóng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/teams/matches">Lịch thi đấu</a>
                            </li>
                            <li>
                                <a href="/admin/teams/list-teams">Các đội thi đấu</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bars"></i> Quản lý video<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/video/add-video">Video</a>
                            </li>
                            <li>
                                <a href="/admin/video/list-youtube">Youtube</a>
                            </li>
                            <li>
                                <a href="/admin/video/search-youtube">Search Youtube</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bars"></i> Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/products/list-category">Category</a>
                            </li>
                            <li>
                                <a href="/admin/products/list-product">Product of list</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="/admin/auto-job/gen"><i class="fa fa-bars"></i> Auto Job</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/auto-job/send-email">Email</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->