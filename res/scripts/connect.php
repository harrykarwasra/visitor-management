<?php
//TODO - Reject/404 if directly opened via browser

//Credentials
$servername = "localhost";//"mysql4.gear.host";
$username = "root";//"vms";
$password = "";//"FRt01#63Z";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    if(isset($errors)) {
      $errors['server']="Server encountered an error. Please try again later.";
      if(function_exists(kill)){
        kill($errors);
      }
      else{
        die("Something terribly went wrong. Please contact the developer. Error code: 503");
      }
    }
    else if(function_exists(error)){
      error("504: Internal Server Error. Please try again in a while.
              If problem persists, contact the developer with the Error Code <strong>CONNECTION_ACTIVELY_REFUSED</strong>");
    }
    else die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_select_db($conn,"vms");
?>
