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
    $booking_id = $mysqli->real_escape_string($_POST['booking_id']);
    $amount = $mysqli->real_escape_string($_POST['amount']);
    $payment_date = $mysqli->real_escape_string($_POST['payment_date']);
    $method = $mysqli->real_escape_string($_POST['method']);

    $query = "INSERT INTO Payments (booking_id, amount, payment_date, method) VALUES ('$booking_id', '$amount', '$payment_date', '$method')";
    if ($mysqli->query($query) === TRUE) {
        echo "Payment recorded successfully!";
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
                    <label for="formGroupExampleInput2" for="floatingInput"> Booking ID</label>
                    <input type="text" name="booking_id"><br>
                </li>
                <li class="list-group-item">   
                    <label for="formGroupExampleInput2" for="floatingInput"> Amount rs</label> 
                    <input type="text" name="amount"><br>
                </li>
                <li class="list-group-item">
                    <label for="formGroupExampleInput2" for="floatingInput"> Payment Date</label>
                    <input type="datetime-local" name="payment_date"><br>
                </li>
                <li class="list-group-item">
                    <label for="formGroupExampleInput2" for="floatingInput">Method of mode</label>
                    <input type="text" name="method"><br>
                </li>
                <li class="list-group-item">
                    <input type="submit" value="Record Payment" class="btn btn-success">
                </li>
            </form>
        </ul>
</div>
</div>
</div>  

        
    
</body>
</html>

