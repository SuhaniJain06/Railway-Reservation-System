<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Tickets</h2>

    <table class="table table-bordered table-striped shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Passenger</th>
                <th>Train</th>
                <th>Seat</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $query = "
        SELECT 
        t.ticket_id, 
        p.name, 
        tr.train_name, 
        t.seat_number, 
        t.booking_status,
        pay.amount,
        pay.payment_mode,
        pay.payment_status
        FROM Ticket t
        JOIN Passenger p ON t.passenger_id = p.passenger_id
        JOIN Train tr ON t.train_id = tr.train_id
        LEFT JOIN Payment pay ON t.ticket_id = pay.ticket_id
       ORDER BY t.ticket_id DESC LIMIT 20
        ";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {

            // Booking status badge
            $bstatus = $row['booking_status'];
            if($bstatus == "Confirmed") $bcolor = "success";
            elseif($bstatus == "Waiting") $bcolor = "warning";
            else $bcolor = "danger";

            $booking_badge = "<span class='badge bg-$bcolor'>$bstatus</span>";

            // Payment status badge (handle NULL also)
            $pstatus = $row['payment_status'] ?? "N/A";

            if($pstatus == "Success") $pcolor = "success";
            elseif($pstatus == "Failed") $pcolor = "danger";
            else $pcolor = "secondary";

            $payment_badge = "<span class='badge bg-$pcolor'>$pstatus</span>";

            echo "<tr>
            <td>{$row['ticket_id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['train_name']}</td>
            <td>{$row['seat_number']}</td>
            <td>$booking_badge</td>
            <td>{$row['amount']}</td>
            <td>{$row['payment_mode']}</td>
            <td>$payment_badge</td>
            <td><a href='cancel.php?id={$row['ticket_id']}' class='btn btn-danger btn-sm'>Cancel</a></td>
            </tr>";
        }
        ?>

        </tbody>
    </table>

</div>

</body>
</html>