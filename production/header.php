<?php 
session_start();
if($_SESSION['user_type'] != 'M' || $_SESSION['user_type'] == NULL){
	header("Location: error-404.php");
}

$worker_name = $_SESSION['name_of_user'];
$worker_id = $_SESSION['worker_id'] ;

define("BASE_URL","/swdo");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="../../calendar/calendar.php"><i class="fa fa-home"></i> Home </a>
                  </li>
				  <li><a href="table/service_registry.php"><i class="fa fa-suitcase"></i> Service Registry </a>
                  </li>
				  <li><a href="table/index.php"><i class="fa fa-user"></i> Client Registry </a>
                  </li>
				  <li><a href="../../general_reports.php"><i class="fa fa-table"></i> General Reports </a>
                  </li>
				  <li><a href="http://swdms-announcement.000webhostapp.com/login.php" target="_blank" ><i class="fa fa-globe"></i> Manage Announcement</a>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                 <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><?php echo $worker_name; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="../profile/index.php">
                        <i class="fa fa-user pull-right"></i>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="table/activity-log.php">
                        <i class="fa fa-clock-o pull-right"></i>
                        <span>Activity Log</span>
                      </a>
                    </li>
					<li>
                      <a href="table/deleted-list.php">
                        <i class="fa fa-trash pull-right"></i>
                        <span>Deleted list</span>
                      </a>
                    </li>
                    <li>
					  <a href="javascript:;">
					   <i class="fa fa-question-circle pull-right"></i>
					   <span>Help</span>
					  </a>
					</li>
                    <li><a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
				  
				  <!-- Start Logout Modal -->
				  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Notice:</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Are you sure to log out?</h4>
                          <p>Be sure to save all your works before clicking log out button.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a type="button" class="btn btn-danger" href="../../../logout.php">Log out</a>
                        </div>

                      </div>
                    </div>
                  </div>
				  <!-- End Logout Modal -->
				  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->