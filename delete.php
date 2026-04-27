<?php 
require 'db.php'; 

// delete record
$delete = isset($_POST["delete"]) ? $_POST["delete"] : null;
if ($delete == "Delete") {
  $custID = isset($_POST["custID"]) ? $_POST["custID"] : [];
  $dfName = isset($_POST["dfName"]) ? $_POST["dfName"] : [];
  $dlName = isset($_POST["dlName"]) ? $_POST["dlName"] : [];
  $demail = isset($_POST["demail"]) ? $_POST["demail"] : [];
  $dphone = isset($_POST["dphone"]) ? $_POST["dphone"] : [];
  $daddress = isset($_POST["daddress"]) ? $_POST["daddress"] : [];
  $dcheckbox = isset($_POST["checkbox"]) ? $_POST["checkbox"] : [];
  
  // delete record
  foreach ($dcheckbox as $index) {
    $custIDValue = mysqli_real_escape_string($conn, $custID[$index]);
    
    $sql = "DELETE FROM Customer WHERE custID='$custIDValue'";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
      echo "Error deleting record: " . mysqli_error($conn);
    }
  }
}
// show all contact information
$sql="select * from Customer order by lName";
$result=mysqli_query($conn, $sql);
mysqli_close($conn);
?>

<html
<head>
<title>Delete</title>
</head>

<BODY>
<SCRIPT language=JavaScript type=text/javascript>

  <!-- function to check whether checkbox is selected -->
  function checkboxchecked(){
    element = document.getElementsByName("checkbox[]")
    
  for (var index=0; index< element.length; index++){
      if (element[index].checked == true)
        return true;
    }
  alert("Please select name to be deleted");
    return false;
  }
  
</SCRIPT>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<blockquote>
  <p>
  <h2>Delete Customer Information</h2>
  
   <form name="myform" method="post" action="delete.php" onSubmit="return checkboxchecked()">
     <table width="40%" border="0">
     <?php
      $index=0;
      while($row = mysqli_fetch_assoc($result)) {
        $lName = $row['lName'];
          $fName = $row['fName'];
          $custID = $row['custID'];
          $email = $row['email'];
          $phone = $row['phone'];
          $address = $row['address'];
        echo "<tr><td width=\"25\" valign=\"top\"><input type=\"checkbox\" name=\"checkbox[]\" value=\"$index\" />";
        echo "</td><td valign=\"bottom\"><h4><a href=\"detail.php?lName=$lName&fName=$fName\">$lName, $fName</a><h4></td></tr>";
        echo "<input type=\"hidden\" name=\"dfName[]\" value=\"$fName\" />";
        echo "<input type=\"hidden\" name=\"dlName[]\" value=\"$lName\" />";
        echo "<input type=\"hidden\" name=\"custID[]\" value=\"$custID\" />";
        echo "<input type=\"hidden\" name=\"email[]\" value=\"$email\" />";
        echo "<input type=\"hidden\" name=\"phone[]\" value=\"$phone\" />";
        echo "<input type=\"hidden\" name=\"address[]\" value=\"$address\" />";
        $index++;
      }
      
      echo "<tr><td width=\"25\" valign=\"top\">&nbsp;</td><td valign=\"bottom\"><input type=\"submit\" name=\"delete\"";
      echo "value=\"Delete\" />&nbsp;&nbsp;&nbsp;<input type=\"reset\" name=\"Submit2\" value=\"Clear\" /></td></tr>";
      
    ?>
  </table>  
   </form>
  
  <?php
    if (mysqli_num_rows($result)==0)
        echo "<h4>No data<h4>";
  ?>
  <h3><a href="home.html">Back</a></h3>
  </p>
 
</blockquote>
</body>
</html>
