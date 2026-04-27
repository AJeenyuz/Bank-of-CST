<?php
include "db.php";

$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
</head>
<body>
<h2>Customers</h2>

<table border="1">
    <tr>
        <th>Customer ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["custID"]; ?></td>
            <td><?php echo $row["fName"]; ?></td>
            <td><?php echo $row["lName"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
        </tr>
    <?php } ?>

</table>
<h3><a href="home.html">Back</a></h3>
</body>
</html>
