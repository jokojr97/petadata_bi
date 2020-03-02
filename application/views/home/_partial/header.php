<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Poverty Resource Center Initiative">
  <link rel="shortcut icon" sizes="196x196" href="<?= base_url();?>assets/iconhead.png">

  <title>Poverty Resource Center Initiative</title>
  <style type="text/css">
    
    .p-brita{
      position: absolute;
      bottom: 20px;
      z-index: 3;
      margin-left: 10px;
      text-transform: bold;
      color: #fff;
    }
    .back-brita1 {
      background-color: black;
      height: 70px;
      margin-top: -70px;
      width:96.5%;
      z-index: 2;
      position: absolute;
      opacity: 0.7;
    }
    .text-brita1 {
      opacity:1;
      margin-top: -80px;
      width:96.5%;
      z-index: 2;
      position: absolute;
    }
    .back-brita2 {
      background-color: black;
      height: 63px;
      margin-top: -60px;
      width:95%;
      z-index: 2;
      position: absolute;
      opacity: 0.7;
    }
    .text-brita2 {
      opacity:1;
      margin-top: -60px;
      width:96%;
      z-index: 2;
      position: absolute;
    }
  </style>

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> -->
  
  <link href="<?= base_url() ?>/assets/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url() ?>assets/home/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url() ?>assets/home/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url() ?>assets/home/css/style.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
         <!-- <h1><a href="<?= base_url() ?>assets/home/#main">PRC<span>-</span>Initiative</a></h1> -->
        <a href="<?= base_url() ?>home" class="scrollto"><img src="<?= base_url() ?>assets/home/img/logooo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li<?php if ($menu == "home") { echo " class=\"menu-active\""; } ?>><a href="#intro"><i class="fa fa-home"></i> Home</a></li>
          <li<?php if ($menu == "data") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/datajatim/2019/1/1"><i class="fa fa-chart-bar"></i> Data</a></li>
          <li<?php if ($menu == "berita") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/berita"><i class="fa fa-newspaper"></i> Berita</a></li>
          <li<?php if ($menu == "tetangKami") { echo " class=\"menu-active\""; } ?>><a href="#ttgAplikasi"><i class="fa fa-info-circle"></i> Tentang Kami</a></li>
          <li<?php if ($menu == "hubungiKami") { echo " class=\"menu-active\""; } ?>><a href="#hubungiKami"><i class="fa fa-phone"></i> Hubungi Kami</a></li>
          <li class="buy-tickets"><a href="<?= base_url() ?>/auth"><i class="fa fa-user"></i> Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
