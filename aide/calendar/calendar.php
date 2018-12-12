<!-- Session-->
<?php 
session_start();
if($_SESSION['user_type'] != 'AA' || $_SESSION['user_type'] == NULL){
  header("Location: ../error-404.php");
}

$name_of_user = $_SESSION['name_of_user'];
$worker_id = $_SESSION['worker_id'];
$password = $_SESSION['password'];

if ($password == md5('aide') OR $password == md5('DEFAULT123') ) {
  header("Location: ../profile/profile.php");
}
define("BASE_URL","/swdo");
?>
<!-- /Session-->

<?php
require_once('connection.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $connection->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Social Welfare and Development Management System</title>

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
  <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/favicon3.ico">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="calendar.php" class="site_title"><img src="../images/favicon3.ico"><span> SWDMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name_of_user; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="calendar.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="../table/service_registry.php"><i class="fa fa-user"></i> Service Registry </a>
                  </li>
                  <li><a href="../table/index.php"><i class="fa fa-user"></i> Client Registry </a>
                  </li>
                  <li><a href="../general_reports.php"><i class="fa fa-table"></i> General Reports </a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small ">
      <p><center> SWDMS - Canaman &copy </center></p>
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
                    <img src="../images/user.png" alt=""><?php echo $name_of_user; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="../profile/profile.php">
                        <i class="fa fa-user pull-right"></i>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="../table/activity-log.php">
                        <i class="fa fa-clock-o pull-right"></i>
                        <span>Activity Log</span>
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
                          <a type="button" class="btn btn-danger" href="../../logout.php">Log out</a>
                        </div>

                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
  
  <!-- FullCalendar -->
  <link href='css/fullcalendar.css' rel='stylesheet' />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<body>

    <!-- Page Content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SWD Management System - Canaman</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <h4>
          <span id='time'></span>
                  <?php 
          date_default_timezone_set("Asia/Manila");
          echo " | " . date("M d,Y") . "<br>"; 
          ?>
          </h4>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar of Events</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
                </div>
        
        </div>
        <!-- /page content -->

    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="addEvent.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Event Name</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Event Name" required>
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color" >
              <option style="color:#FFD700;" value="Yellow">Yellow</option>
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start date</label><!--
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" >
          </div>-->
          <div class="col-sm-10">
          <div class='input-group date' type="date" id='datetimepicker6'>
                            <input type='text' class="form-control" name="start" id="start" required />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">End date</label>
          <div class="col-sm-10">
            <div class='input-group date' type="date" id='datetimepicker66'>
                            <input type='text' class="form-control" name="end" id="end" required />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Save changes</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    
    

    <!-- Edit Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Event Name</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Event Name" required>
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <input type="text" name="color" class="form-control" id="color" disabled>
          </div>
          </div>
                    <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start date</label><!--
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" >
          </div>-->
          <div class="col-sm-10">
          <div class="input-group date" type="date" id="datetimepicker666">
                            <input type='text' class="form-control" name="start" id="start1" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">End date</label>
          <div class="col-sm-10">
          <div class="input-group date" type="date" id="datetimepicker6666">
                            <input type='text' class="form-control" name="end" id="end1" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Save changes</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    <!-- End Modal -->

    </div>
    <!-- /.container -->


       <!-- footer content -->
        <footer>
          <div class="pull-right">
            Social Welfare and Development Management System - Canaman &copy 2018
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>  
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
  <!-- FullCalendar -->
  <script src='../js/moment/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
  
  <script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('MM/DD/YYYY hh:mm A'));
        $('#ModalAdd #end').val(moment(end).format('MM/DD/YYYY hh:mm A'));
        $('#ModalEdit #start1').val(moment(start).format('MM/DD/YYYY hh:mm A'));
        $('#ModalEdit #end1').val(moment(end).format('MM/DD/YYYY hh:mm A'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalAdd #start1').val(moment(start).format('MM/DD/YYYY hh:mm A'));
          $('#ModalAdd #end1').val(moment(end).format('MM/DD/YYYY hh:mm A'));
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
    
    function edit(event){
      start = event.start.format('MM/DD/YYYY hh:mm A');
      if(event.end){
        end = event.end.format('MM/DD/YYYY hh:mm A');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }
    
  });

</script>

    <script>
      function setTime() {
    var d = new Date(),
      el = document.getElementById("time");

      el.innerHTML = formatAMPM(d);

    setTimeout(setTime, 1000);
    }

    function formatAMPM(date) {
      var hours = date.getHours(),
        minutes = date.getMinutes(),
        seconds = date.getSeconds(),
        ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      return strTime;
    }

    setTime();
  </script>

  <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'MM/DD/YYYY'
    });
  
  $('#myDatepicker22').datetimepicker({
        format: 'MM/DD/YYYY'
    });
  
  $('#myDatepicker222').datetimepicker({
        format: 'MM/DD/YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
  
  $('#datetimepicker66').datetimepicker();
  
  $('#datetimepicker666').datetimepicker();
  
  $('#datetimepicker6666').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  
</body>

</html>
