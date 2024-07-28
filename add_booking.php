<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $mysqli->real_escape_string($_POST['customer_id']);
    $service_type = $mysqli->real_escape_string($_POST['service_type']);
    $booking_date = $mysqli->real_escape_string($_POST['booking_date']);

    $query = "INSERT INTO Bookings (customer_id, service_type, booking_date) VALUES ('$customer_id', '$service_type', '$booking_date')";
    if ($mysqli->query($query) === TRUE) {
        echo "Booking added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}
?>


<div class="d-flex justify-content-center">
<div class="d-flex align-items-center">

<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <form method="post">
            <li class="list-group-item">
                <label for="formGroupExampleInput2" for="floatingInput">Customer ID</label>
                <input type="text" name="customer_id"><br>
            </li>
            <li class="list-group-item">
                <label for="formGroupExampleInput2" for="floatingInput">Service Type</label>
                <input type="text" name="service_type"><br>
            </li>
            <li class="list-group-item">
                <label for="formGroupExampleInput2" for="floatingInput"> Booking Date</label>
                <input type="datetime-local" name="booking_date"><br>
            </li>
            <li class="list-group-item">
                <input type="submit" value="Add Booking" class="btn btn-success">
            </li>

        </form>
</div>
</div>
    
</body>
</html>
