<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>Page</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
        <!-- Awesome Font -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
       
</head>
<body>

<?php
    $arr = $this->session->flashdata(); 
    if(!empty($arr['flash_message'])){
        $html = '<div class="alert alert-danger alert-dismissable container flash-message">';
        $html .= $arr['flash_message'];
        $html .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'; 
        $html .= '</div>';
        echo $html;
    }
?>
<?php
    $arr = $this->session->flashdata(); 
    if(!empty($arr['message'])){
        $html = '<div class="alert alert-success alert-dismissable container flash-message">';
        $html .= $arr['message'];
        $html .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';  
        $html .= '</div>';
        echo $html;
    }
?> 
   <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('/') ?>">Pi2</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url('/') ?>">Accueil</a></li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sessions<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?= base_url('session') ?>">Session</a></li>
                        	<li><a href="<?= base_url('session1') ?>">Session1</a></li>
                        </ul>
                      	</li>
                        <li><a href="<?= base_url('Gallery') ?>">Galerie Photos</a></li>
                        <li><a href="<?= base_url('#') ?>">lien</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li><a href="<?= base_url('contactController') ?>">Contact</a></li>
                        <?php if ($this->user['is_admin']) : ?>
                        <li><a href="<?= base_url(''); ?>/admin">Admin</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url('main/logout') ?>">Logout</a></li>
                        <?php else : ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('main/register') ?>">Register</a></li>
                                <li><a href="<?= base_url('main/login') ?>">Login</a></li>
                             </ul>
                        </li>  
                    <?php endif; ?>
                    </ul>


                  <!--  <ul class="nav navbar-nav navbar-right">
                        <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
                            <li><a href="<?= base_url('main/logout') ?>">Logout</a></li>
                        <?php else : ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url('main/register') ?>">Register</a></li>
                                    <li><a href="<?= base_url('main/login') ?>">Login</a></li>
                                 </ul>
                            </li>                            
                        <?php endif; ?>
                    </ul>
 -->

                   <!--  <ul class="nav navbar-nav navbar-right">
                        
                            <li><a href="<?= base_url('main/logout') ?>">Logout</a></li>
                       
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url('main/register') ?>">Register</a></li>
                                    <li><a href="<?= base_url('main/login') ?>">Login</a></li>
                                 </ul>
                            </li>                            
                      
                    </ul> -->
                </div>
            </div>
        </nav>