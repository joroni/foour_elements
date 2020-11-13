<?php

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
 <base href="/personality_test/admin/" />
  <title>TetraMap Admin</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
   
  
  <link rel="stylesheet" href="lib/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="lib/bootstrap/css/datatables.bootstrap.css">
      <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">

      <link href="css/dashboard.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  
  <style>
  .form_style
  {
   width: 600px;
   margin: 0 auto;
  }

  .dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
  </style>
 </head>
 <body ng-app="login_register_app">
  <!--<br />
   <h3 align="center">Tetamap</h3>
  <br />-->

  <div ng-controller="login_register_controller" class="container form_style">
   <?php
   if(!isset($_SESSION["name"]))
   {
   ?>
   <div ng-cloak class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>

   <div class="panel panel-default login-form" ng-show="login_form">
    <div class="panel-heading">
     <h3 class="panel-title"><img class="header-logo" src="../frontend/img/tetramap-text.png" /></h3>
    </div>
    <div class="panel-body">
     <form method="post" class="form-signin" ng-submit="submitLogin()">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" email="email" ng-model="loginData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="loginData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="login" class="btn btn-primary" value="Login" />
       <br />
      
       
      <!--  <input type="button" name="register_link" class="btn btn-primary btn-link btn-register" ng-click="showRegister()" value="Register" />  -->
      </div>
     </form>
    </div>
   </div>

   <div class="panel panel-default" ng-class="doShow" ng-show="register_form">
    <div class="panel-heading">
    <h3 class="panel-title"><img class="header-logo" src="../frontend/img/tetramap-text.png" /></h3>
    </div>
    <div class="panel-body">
     <form class="form-signin" method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your Name</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <?php
   }
   else
   {
   ?>
    <div class="container"> 
    <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container-fluid">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
               aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TetraMap Admin</a>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Welcome, <span style="color:#f5a521;"> <?php echo $_SESSION["name"];?></span></a></li>
                  <li>  <a href="logout.php">Logout</a></li>
               </ul>
            </div>
         </div>
      </nav>
        <div class="container-fluid">
            <div class="row">
                <div id="mySidebar" class="sidenav sidebar col-sm-3 col-md-2" ng-include="'sidenav.php'">
                    hello
                </div>
                <div id="main" class="col-sm-9 col-sm-offset-3x col-md-10 col-md-offset-2x main">
                <button type="button"  onclick="openNav()" class="sidebar-toggle openbtn">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 <!--  <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button> -->
                <div data-ng-view="" id="ng-view" class="slide-animation"></div>
                 
                </div>
            </div>
        </div>
    </div>

   <?php
   }
   ?>

  </div>
  
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
 <script data-require="angular.js@1.5.x" src="https://code.angularjs.org/1.5.7/angular.js" data-semver="1.5.7"></script>
    <script data-require="angular-route@1.5.7" data-semver="1.5.7" src="https://code.angularjs.org/1.5.7/angular-route.js"></script>
 
    <!--  <script src="lib/angularjs/1.5.7/angular.min.js"></script>
  <script src="lib/angularjs/1.5.7/angular-route.min.js"></script> -->
  <script src="lib/angularjs/angular-filter.min.js"></script>
  
  <script src="lib/angularjs/angular-datatables.min.js"></script>
  <script src="lib/jquerydatatable/jquery.dataTablesv1.10.7.min.js"></script>
  

 

  <script src="lib/chart/Chart.min.js"></script>
  <script src="lib/angular-chart.js/angular-chart.min.js"></script>


  <script type='text/javascript' src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <script>
  $(document).ready(function(){
    $('.dropdown-toggle').dropdown();

    var myStr = $(".userurl").text();
        var trimStr = $.trim(myStr);
        $(".trimmed").html(trimStr);
  })
 

  </script> 
  

  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="js/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
 </body>
</html>


