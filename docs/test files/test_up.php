<!DOCTYPE html>
<html lang="en">
  <head>
  <body>
  
  <?php 
   
  if (empty($_POST["username"])) $_POST['username'] = " - ";
  $username = $_POST["username"]; 
  if (empty($_POST["password"])) $_POST['password'] = " - ";
  $password = $_POST["password"];
  
  
  ?>
  
  <label>Test User</label>
  
  <form action="update_test.php" method="post">
  <input type="text" class="form-control" name="test_id" / hidden>
  <label>Username:</label>
  <input type="text" class="form-control" name="username" />
  <label>Password:</label>
  <input type="text" class="form-control" name="password" />
  <label>Admins:</label>
  <input type="text" class="form-control" name="admins" />
  <label>Test:</label>
  <input type="text" class="form-control" name="test" />
  
  <?php
  
  echo '
  <label>Username:</label>
  <input type="text" class="form-control" name="username" value="'.$username.'" />
  <label>Password:</label>
  <input type="text" class="form-control" name="password" value="'.$password.'" />';
  
  
  ?>
  
 
  <input class="btn btn-round btn-primary" name="submit" type="submit">
  
  <body>
  </head>
 </html>