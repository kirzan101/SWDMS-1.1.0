<?php
session_start();
if(!empty($_SESSION['loggined_user'])){
    session_destroy();
    header("Location: login.php");
}
else{
	session_destroy();
    header("Location: login.php");
}

?>