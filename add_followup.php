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
    $person_in_charge = $mysqli->real_escape_string($_POST['person_in_charge']);
    $followup_date = $mysqli->real_escape_string($_POST['followup_date']);
    $note = $mysqli->real_escape_string($_POST['note']);

    $query = "INSERT INTO FollowUps (booking_id, person_in_charge, followup_date, note) VALUES ('$booking_id', '$person_in_charge', '$followup_date', '$note')";
    if ($mysqli->query($query) === TRUE) {
        echo "Follow-up added successfully!";
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
                        <label for="formGroupExampleInput2" for="floatingInput">Person in Charge</label>   
                        <input type="text" name="person_in_charge"><br>
                    </li>  

                    <li class="list-group-item">
                        <label for="formGroupExampleInput2" for="floatingInput">Follow-Up Date</label>   
                        <input type="datetime-local" name="followup_date"><br>
                    </li>
                    <li class="list-group-item">
                        <label for="formGroupExampleInput2" for="floatingInput">Note.................</label>   
                        <textarea name="note"></textarea><br>
                    </li>
                    <li class="list-group-item">
                        <input type="submit" value="Add Follow-Up" class="btn btn-success">
                    </li>
                    
                </form>
            </ul>
        </div>
    </div>
</div>
</body>
</html>

