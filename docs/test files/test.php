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
  
  <form action="test.php" method="post">
  
  <label>Username:</label>
  <input type="text" id="text" class="form-control" name="username" />
  <label>Password:</label>
  <input type="text" id="text" class="form-control" name="password" />
  <label>Admins:</label>
  <input type="text" id="text" class="form-control" name="admins" />
  <label>Test:</label>
  <input type="text" id="text" class="form-control" name="test" />
  <label>First name:</label>
  <input type="text" id="text" class="form-control" name="firstname" required>
  
  <?php
  
  echo '
  <label>Username:</label>
  <input type="text" class="form-control" name="username" value="'.$username.'" />
  <label>Password:</label>
  <input type="text" class="form-control" name="password" value="'.$password.'" />';
  
  
  ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />	
</head>
<body>
<button class="open-homeEvents btn btn-primary" data-id="2014-123456"  data-toggle="modal" data-target="#modalHomeEvents">More Details</button>	
<div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

         <label>Student ID</label>     
        <input type="hidden" name="eventId" id="eventId"/>
        	<span id="idHolder"></span>	
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Login" name="login" style="background-color:rgb(0,30,66); ">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>	
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
});
</script>

<!-- First Letter Capital-->
<script>
// Get a reference to the input and wire it up to an input event handler that
// calls the fixer function
document.getElementById("text").addEventListener("input", forceLower);

// Event handling functions are automatically passed a reference to the
// event that triggered them as the first argument (evt)
function forceLower(evt) {
  // Get an array of all the words (in all lower case)
  var words = evt.target.value.toLowerCase().split(/\s+/g);
  
  // Loop through the array and replace the first letter with a cap
  var newWords = words.map(function(element){   
    // As long as we're not dealing with an empty array element, return the first letter
    // of the word, converted to upper case and add the rest of the letters from this word.
    // Return the final word to a new array
    return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
  });
  
 // Replace the original value with the updated array of capitalized words.
 evt.target.value = newWords.join(" "); 
}
</script>
 
  <input class="btn btn-round btn-primary" name="submit" type="submit">
  
  <body>
  </head>
 </html>