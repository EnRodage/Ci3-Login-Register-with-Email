<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <!-- Awesome Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/sb1/simplesidebar.css'); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.2/summernote.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb2/sb-admin-2.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb2/dataTables.bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb2/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb2/fullcalendar.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb2/fullcalendar.print.css'); ?>'); ?>">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <!--<nav class="navbar navbar-inverse no-margin">   
                <div class="navbar-header fixed-brand">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin</a>
                </div> navbar-header
 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
                            </ul>
                </div> -->
    </nav>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
 
                <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                       <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#">link1</a></li>
                        <li><a href="#">link2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> Bootstrap</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="<?= base_url('admin/pages/boutons'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Boutons</a></li>
                        <li><a href="<?= base_url('admin/pages/forms'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Forms</a></li>
                        <li><a href="<?= base_url('admin/pages/grid'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Grid</a></li>
                        <li><a href="<?= base_url('admin/pages/icones'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Icônes</a></li>
                        <li><a href="<?= base_url('admin/pages/typographie'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Typographie</a></li>
                        <li><a href="<?= base_url('admin/pages/tables'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Tables</a></li>
                        <li><a href="<?= base_url('admin/pages/panels'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Panels</a></li>
                        <li><a href="<?= base_url('admin/pages/calendrier'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Calendrier</a></li> 
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Overview</a>
                </li>
                <li>
                    <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Events</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/pages/summernote'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil-square-o fa-stack-1x"></i></span>Summernote</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
                </li>
                <li>
                    <a href="<?= base_url('welcomeController'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Logout</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"><i class="fa fa-outdent fa-stack-1x pull-left"></i></span></a>
                </li>
                
            </ul>
        </div><!-- /#sidebar-wrapper -->
        
       
