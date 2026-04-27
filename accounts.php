<?php
include "db.html";

$sql = "SELECT * FROM Account";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accounts</title>
</head>
<body>
<h2>Accounts</h2>

<table border="1">
    <tr>
        <th>Account ID</th>
        <th>Customer ID</th>
        <th>Type</th>
        <th>Balance</th>
        <th>Created</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["accID"]; ?></td>
            <td><?php echo $row["custID"]; ?></td>
            <td><?php echo $row["accType"]; ?></td>
            <td><?php echo $row["balance"]; ?></td>
            <td><?php echo $row["createdDate"]; ?></td>
        </tr>
    <?php } ?>

</table>
<h3><a href="home.html">Back</a></h3>
</body>
</html>
