<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Book Ticket</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <form method="POST" class="card p-4 shadow">

                <input type="text" name="name" placeholder="Name" class="form-control mb-3" required>

                <input type="number" name="age" placeholder="Age" class="form-control mb-3" required>

                <!-- 🔥 NEW PHONE FIELD -->
                <input type="text" name="phone" pattern="[0-9]{10}" placeholder="Phone Number" class="form-control mb-3" required>

                <select name="gender" class="form-control mb-3">
                    <option>Male</option>
                    <option>Female</option>
                </select>

                <select name="train_id" class="form-control mb-3">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM Train");
                    while($row = mysqli_fetch_assoc($res)) {
                        echo "<option value='{$row['train_id']}'>{$row['train_name']}</option>";
                    }
                    ?>
                </select>

                <select name="class" class="form-control mb-3">
                    <option>Sleeper</option>
                    <option>AC</option>
                    <option>General</option>
                </select>

                <button type="submit" name="submit" class="btn btn-success w-100">
                    Book Ticket
                </button>

            </form>

            <?php
            if(isset($_POST['submit'])) {

                $name = $_POST['name'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone']; // 🔥 NEW
                $train_id = $_POST['train_id'];
                $class = $_POST['class'];

                // 🔥 Passenger ID
                $res = mysqli_query($conn, "SELECT MAX(passenger_id) as maxid FROM Passenger");
                $row = mysqli_fetch_assoc($res);
                $pid = $row['maxid'] + 1;
                if($pid < 5001) $pid = 5001;

                mysqli_query($conn, "INSERT INTO Passenger(passenger_id, name, age, gender, phone)
                VALUES($pid, '$name', $age, '$gender', '$phone')");

                // 🔥 Ticket ID
                $res2 = mysqli_query($conn, "SELECT MAX(ticket_id) as maxid FROM Ticket");
                $row2 = mysqli_fetch_assoc($res2);
                $ticket_id = $row2['maxid'] + 1;
                if($ticket_id < 5001) $ticket_id = 5001;

                mysqli_query($conn, "INSERT INTO Ticket(ticket_id, passenger_id, train_id, journey_date, seat_number, class, booking_status)
                VALUES($ticket_id, $pid, $train_id, CURDATE(), 
                CONCAT('S', FLOOR(1 + RAND()*5), '-', FLOOR(1 + RAND()*60)), 
                '$class', 'Confirmed')");

                // 🔥 Payment ID
                $res3 = mysqli_query($conn, "SELECT MAX(payment_id) as maxid FROM Payment");
                $row3 = mysqli_fetch_assoc($res3);
                $payment_id = $row3['maxid'] + 1;
                if($payment_id < 5001) $payment_id = 5001;

                mysqli_query($conn, "INSERT INTO Payment(payment_id, ticket_id, amount, payment_mode, payment_status, payment_date)
                VALUES($payment_id, $ticket_id, 500, 'UPI', 'Success', CURDATE())");

                echo "<div class='alert alert-success mt-3 text-center'>
                        Ticket Booked Successfully!
                      </div>";
            }
            ?>

        </div>
    </div>

</div>

</body>
</html>