<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="url" content="<?php echo base_url()?>">
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="37822303838-3nd4lf0b1tdrbrl98cscjnn2lqktuj6f.apps.googleusercontent.com">
  

  <title>Clean Blog - Start Bootstrap Theme</title>
   <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css')?>/bootstrap.min.css" rel="stylesheet">
  

  <!-- Custom fonts for this template -->
  <link href="<?php echo  base_url('assets/vendor/fontawesome-free/css');?>/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <script src="https://apis.google.com/js/platform.js" async defer></script>


  <!-- Custom styles for this template -->
  <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/comments.css"/> -->

  <link href="<?php echo base_url('assets/css')?>/clean-blog.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/css')?>/custom.css" rel="stylesheet">

   <!-- <!—- ShareThis BEGIN -—> -->
          <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5efb78e184db270012241558&product=sticky-share-buttons"></script>
      <!-- <!—- ShareThis END -—> -->

      <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5efb7d0484db270012241559&product=inline-share-buttons&cms=sop' async='async'></script> -->
  
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=272839410446482&autoLogAppEvents=1" nonce="iCZIU4iB"></script>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('')?>">Clean Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('')?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('about')?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('contact')?>">Contact</a>
          </li>
          
          <?php if(isset($login_data)){ 



            
            
            ?>

          <li class="nav-item dropdown"  id="login_nav">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  
            <span><?php echo  $login_data[0]->name ?></span>

            <img src="<?php echo base_url("assets/img/users/").$login_data[0]->picture ?>" alt="" height='25' width='25'>


            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if($login_data[0]->type=="6"){?>
              <a href="<?php echo base_url().'advertiser/'.$login_data[0]->type?>" type="button" class="dropdown-item"  >Dashboard
              <div class="dropdown-divider"></div>
              <?php
             }else if($login_data[0]->type=="1"){?>

              <a href="<?php echo base_url().'admin/index';?>" type="button" class="dropdown-item"  >Dashboard
              <div class="dropdown-divider"></div>

             <?php } ?>

            </a>
              
           
             
              <a href="<?php echo base_url().'logout'?>" type="button" class="dropdown-item"  id="front_logout">Log Out</a>
             
            
            </div>
          </li>
        
    
          <?php }else{
            ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('blog/login')?>">Login</a>
          </li>
            <?php 
          }?>


          
          
        </ul>
      </div>
    </div>
  </nav>