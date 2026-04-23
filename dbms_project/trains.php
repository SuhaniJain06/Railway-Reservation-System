<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Train List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Train List</h2>

    <table class="table table-striped table-bordered shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Route</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM Train");

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['train_id']}</td>
                <td>{$row['train_name']}</td>
                <td>{$row['source_station']} → {$row['destination_station']}</td>
            </tr>";
        }
        ?>
        </tbody>

    </table>

</div>

</body>
</html>