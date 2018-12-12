<!-- Login -->

<?php
	include 'db_connect.php';
	session_start();
	ob_start();
	if(isset($_POST['login'])){

		// save username inputs, to avoid retyping
		$usernames = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$usernames = $_POST["username"];
		}

		// prepare and bind
		$stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND status = ?");
		$stmt->bind_param("sss", $username, $password, $status);
		
		// Set variables
		$username = $_POST["username"];
		$password = md5($_POST["password"]); // Hash the password
		$status = 'ACTIVE';
		$stmt->execute();
		$result = $stmt->get_result();
		
		// Error message
		$error = "";

		// if the user is ADMIN 
		if($row = mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$error = "success";
			if($row['user_type'] == 'A'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'A' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: admin/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			// if the user is MSWDO
			elseif($row['user_type'] == 'M'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'M' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: mswdo/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			// if the user is SWDO II
			elseif($row['user_type'] == 'M2'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'M2' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: swdo-2/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			// if the user is DCW
			elseif($row['user_type'] == 'D'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'D' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: dcw/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			// if the user is Admin Aide
			elseif($row['user_type'] == 'AA'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'AA' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: aide/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			// if the user is Job Order
			elseif($row['user_type'] == 'J'){
				$user_id = $row['user_id'];
				$sql = "SELECT * FROM users u INNER JOIN workers w WHERE w.user_id = u.user_id AND user_type = 'J' AND w.user_id = '$user_id'";
				if($result = $con->query($sql)){
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$error = "success";
					$_SESSION['loggined_user']= $row['username']; 
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['name_of_user'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['worker_id'] = $row['worker_id'];
					$_SESSION['fullname_of_user'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
					$_SESSION['is_loggined']= 1; 
					$_SESSION['password'] = $password;
					$_SESSION['position']= $row['position'];
					header("Location: job-order/calendar/calendar.php");
				}
				else{
					echo '<script>alert("Login Error")</script>';
				}
			}
			else{
					echo '<script>alert("Login Error")</script>';
			}
		}
		else{
			$error = '<div class="alert alert-warning fade in" role="alert">Invalid Username or Password </div>';
		}
	}
?>

<?php 

if(isset($_SESSION['is_loggined']) == 1){
	
	if($_SESSION['user_type']  == 'A'){
		header("Location: admin/calendar/calendar.php");
	}
		elseif($_SESSION['user_type']  == 'M'){
				header("Location: mswdo/calendar/calendar.php");
		}
		elseif($_SESSION['user_type']  == 'M2'){
				header("Location: swdo-2/calendar/calendar.php");
		}
		elseif($_SESSION['user_type']  == 'D'){
				header("Location: dcw/calendar/calendar.php");
		}
		elseif($_SESSION['user_type']  == 'AA'){
				header("Location: aide/calendar/calendar.php");
		}
			else{
				header("Location: job-order/calendar/calendar.php");
			}
?>

<?php } else {?>

<!-- /Login-->

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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="admin/images/favicon3.ico">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
          <section class="login_content">
		  <img src="admin/images/seal.png" alt="canaman-seal"  align="middle">
		  <br>
		  <div>
		  <font color="#e5e5e5">
		  <strong><h4>Department of Social Welfare and Development</h4></strong>
		  </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Welcome</h1>
			  <strong><?php echo $error; ?></strong>
              <div>
                <input type="text" class="form-control"  name="username" placeholder="Username" value="<?php echo $usernames;?>" required />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" name="login" value="Log in">
              </div>

              <div class="clearfix"></div>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-laptop"></i> SWDMS</h1>
                  <p>Social Welfare and Development Management System Canaman &copy 2018</p>
                </div>
				</font>
            </form>
          </section>

      </div>
    </div>
	
	
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php } ob_end_flush(); ?>