<?php
include 'db.php';
$id = $_GET['id'];

mysqli_query($conn, "UPDATE Ticket SET booking_status='Cancelled' WHERE ticket_id=$id");
mysqli_query($conn, "UPDATE Payment SET payment_status='Failed' WHERE ticket_id=$id");

header("Location: tickets.php");
?>