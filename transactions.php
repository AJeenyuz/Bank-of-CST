<?php 
include "db.php";
// show all contact information
$sql = "SELECT * from Transactions ORDER BY amount";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
<h2>Transactions</h2>

<table border="1">
    <tr>
        <th>Transaction ID</th>
        <th>From Acc ID</th>
        <th>To Acc ID</th>
        <th>Amount</th>
        <th>Transaction Type</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php print $row["transID"]; ?></td>
            <td><?php print $row["fromAccID"]; ?></td>
            <td><?php print $row["toAccID"]; ?></td>
            <td><?php print $row["amount"]; ?></td>
            <td><?php print $row["transType"]; ?></td>
        </tr>
    <?php } ?>

</table>
<h3><a href="home.html">Back</a></h3>
</body>
</html>
