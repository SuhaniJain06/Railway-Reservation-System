<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Railway System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
}

.hero {
    text-align: center;
    margin-top: 80px;
}

.hero h1 {
    font-size: 42px;
    font-weight: 700;
}

.hero p {
    color: #6c757d;
    font-size: 18px;
}

.card-custom {
    border: none;
    border-radius: 15px;
    padding: 25px;
    background: white;
    transition: 0.3s;
}

.card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    font-size: 28px;
}

.blue { background: #e7f0ff; color: #0d6efd; }
.green { background: #e8f7ee; color: #198754; }
.yellow { background: #fff4e5; color: #ffc107; }

.btn-custom {
    border-radius: 10px;
}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container">

    <!-- HERO -->
    <div class="hero">
        <h1>Railway Reservation System</h1>
        <p>Plan your journey, browse trains, manage tickets, and book easily.</p>
    </div>

    <!-- CARDS -->
    <div class="row mt-5 g-4 justify-content-center">

        <!-- Trains -->
        <div class="col-md-4">
            <div class="card-custom text-center shadow-sm">
                <div class="icon-circle blue">🚆</div>
                <h4 class="mt-3">View Trains</h4>
                <p class="text-muted">Browse routes and train details</p>
                <a href="trains.php" class="btn btn-dark btn-custom">View Trains</a>
            </div>
        </div>

        <!-- Tickets -->
        <div class="col-md-4">
            <div class="card-custom text-center shadow-sm">
                <div class="icon-circle green">🎟️</div>
                <h4 class="mt-3">View Tickets</h4>
                <p class="text-muted">Check bookings and status</p>
                <a href="tickets.php" class="btn btn-dark btn-custom">View Tickets</a>
            </div>
        </div>

        <!-- Book -->
        <div class="col-md-4">
            <div class="card-custom text-center shadow-sm">
                <div class="icon-circle yellow">✏️</div>
                <h4 class="mt-3">Book Ticket</h4>
                <p class="text-muted">Reserve your seat easily</p>
                <a href="book.php" class="btn btn-dark btn-custom">Book Now</a>
            </div>
        </div>

    </div>

</div>

</body>
</html>