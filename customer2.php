<?php 
require 'db.html';
// retrieve all variables
$custID = @$_POST["custID"];
$fName = @$_POST["fName"];
$lName = @$_POST["lName"];
$email = @$_POST["email"];
$phone = @$_POST["phone"];
$address = @$_POST["address"];

// insert information to database
$sql="insert into Customer values('$custID','$fName','$lName','$email','$phone','$address')";
$result=mysqli_query($conn, $sql);
mysqli_close($conn);
?>
<html>
<head>
<title>Add processed</title>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<blockquote>
  <p>
  <h3>Your information is added to database. </h3>
  <h3><a href="home.html">Back</a></h3>
  <body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
