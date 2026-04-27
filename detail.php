<?php 
require 'db.php';

// retrieve all variables
$fname = @$_GET["fname"];
$lname = @$_GET["lname"];

$transID = @$_GET['transID'];
$fromAccID = @$_GET['fromAccID'];
$toAccID = @$_GET['toAccID'];
$amount = @$_GET['amount'];
$transType = @$_GET['transType'];



// show all contact information
$sql="select * from $Transactions where transID='$transID' and fromAccID='$fromAccID' 
and toAccID='$toAccID' and amount='$amount' and transType='$transType'";
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
mysqli_close($conn);
?>

<html>
<head>
<title>Detail</title>
</head>

<BODY>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<blockquote> 
    <table width="60%" border="0" cellpadding="5" cellspacing="15">
	<tr>
		<td colspan="2"><p><h2><?php echo "$lname, $fname"; ?></h2></td>
	  </tr>
    <tr>
      <td width="130">Transaction Number :</td>
      <td><?php echo $row['transID']; ?></td>
    </tr>
    <tr>
      <td width="130">From Acc ID :</td>
      <td><?php echo $row['fromAccID']; ?></td>
    </tr>
    <tr>
      <td width="130">To Acc ID :</td>
      <td><?php echo $row['toAccID']; ?></td>
    </tr>
    <tr>
      <td width="130"><p>Cash amount :<br />
      </p>        </td>
      <td><?php echo $row['amount']; ?></td>
    </tr>
    <tr>
      <td width="130">Transaction Type :</td>
      <td><?php echo $row['transType']; ?></td>
    </tr>
  </table>
   </p>
</blockquote>
</body>
</html>
