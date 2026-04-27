<?php
include "db.php";

$custID = $_POST["customer_id"];
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$sql = "INSERT INTO Customer (custID, fName, lName, email, phone, address)
        VALUES (?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            fName = VALUES(fName),
            lName = VALUES(lName),
            email = VALUES(email),
            phone = VALUES(phone),
            address = VALUES(address)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isssss", $custID, $fname, $lname, $email, $phone, $address);

if (mysqli_stmt_execute($stmt)) {
    echo "Customer saved successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
