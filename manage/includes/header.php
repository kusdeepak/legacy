<?php $adminObj = new AdminClass();
	  $adminObj -> checkAdmin();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">

  <!-- Use title if it's in the page YAML frontmatter -->
  <title>Core Admin | Legacyconverting</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

  <link href="stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="javascripts/application.js" type="text/javascript"></script>
  <script src="ckeditor/ckeditor.js"></script>
</head>



<body>
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="#"><img src="images/logo.png"></a>

    
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
          <span class="sr-only">Toggle Side Navigation</span>
          <i class="icon-th-list"></i>
        </button>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
          <span class="sr-only">Toggle Top Navigation</span>
          <i class="icon-align-justify"></i>
        </button>
    
  </div>

  
      

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-collapse-top">
        <div class="navbar-right">

          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
              <span>
                <img class="menu-avatar" src="images/avatars/avatar1.jpg" /> <span>admin<i class="icon-caret-down"></i></span>
                
              </span>
              </a>
              <ul class="dropdown-menu">

                <!-- the first element is the one with the big avatar, add a with-image class to it -->

                <li class="with-image">
                  <div class="avatar">
                    <img src="images/avatars/avatar1.png" />
                  </div>
                  <span>Legacy Admin</span>
                </li>

                <li class="divider"></li>

                <li><a href="changepassword.php"><i class="icon-user"></i> <span>Profile</span></a></li>
                <li><a href="sitesetting.php"><i class="icon-cog"></i> <span>Settings</span></a></li>
                <li><a href="logout.php"><i class="icon-off"></i> <span>Logout</span></a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div><!-- /.navbar-collapse -->

  
</nav>
<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>

<?php include("menu.php");?>
<div class="main-content">