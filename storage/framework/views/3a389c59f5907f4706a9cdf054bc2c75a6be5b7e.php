<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Personal track and Criminal warning Application</title>

    <!-- Bootstrap -->
    <link href="<?php echo URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL::asset('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo URL::asset('vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo URL::asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="<?php echo URL::asset('css/maps/jquery-jvectormap-2.0.3.css'); ?>" rel="stylesheet"/>
    <script type="text/javascript" src="<?php echo URL::asset('js/angular.min.js'); ?>"></script>
    <section id="head">
          <?php echo $__env->yieldContent('headimport'); ?>
        </section>
    <!-- Custom Theme Style -->
    <link href="<?php echo URL::asset('css/custom.css'); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><img src="images/Picture1.png"  height="50" width="50"><span>Managed user</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/moss.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, <?php echo e(4*5); ?></span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General </h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/">Dashboard</a>
                      </li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/tables">Accident Case</a>
                      </li>
                      <li><a href="/tables_1">Information Users</a>
                      </li>
                      <li><a href="/emergencycase">EmergencyCase</a>
                      </li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php else: ?>
                                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/moss.jpg" alt=""><?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
                    <?php endif; ?>

               

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <section id="main">
          <?php echo $__env->yieldContent('content'); ?>
        </section>
        <!-- /page content -->
         </div>

            </div>
    </div>
<!-- jQuery -->
    <script src="<?php echo URL::asset('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo URL::asset('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo URL::asset('vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo URL::asset('vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo URL::asset('vendors/Chart.js/dist/Chart.min.js'); ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo URL::asset('vendors/bernii/gauge.js/dist/gauge.min.js'); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo URL::asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo URL::asset('vendors/iCheck/icheck.min.js'); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo URL::asset('vendors/skycons/skycons.js'); ?>"></script>
    <!-- Flot -->
    <script src="<?php echo URL::asset('vendors/Flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/Flot/jquery.flot.pie.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/Flot/jquery.flot.time.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/Flot/jquery.flot.stack.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/Flot/jquery.flot.resize.js'); ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo URL::asset('js/flot/jquery.flot.orderBars.js'); ?>"></script>
    <script src="<?php echo URL::asset('js/flot/date.js'); ?>"></script>
    <script src="<?php echo URL::asset('js/flot/jquery.flot.spline.js'); ?>"></script>
    <script src="<?php echo URL::asset('js/flot/curvedLines.js'); ?>"></script>
    <!-- jVectorMap -->
    <script src="<?php echo URL::asset('js/maps/jquery-jvectormap-2.0.3.min.js'); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo URL::asset('js/moment/moment.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('js/datepicker/daterangepicker.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
       <section id="footer">
          <?php echo $__env->yieldContent('footercss'); ?>
        </section>

    <!-- /gauge.js -->
  </body>
</html>