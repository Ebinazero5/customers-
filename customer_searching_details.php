<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">

                <table class="table">
                    <tbody>


                        <?php
                        require 'db.php';

                        $search_term = isset($_POST['search']) ? $_POST['search'] : '';

                        $query = "
                            SELECT 
                                c.customer_id,
                                c.name,
                                c.email,
                                c.phone,
                                b.booking_id,
                                b.service_type,
                                b.booking_date,
                                p.payment_id,
                                p.amount,
                                p.payment_date,
                                p.method,
                                f.followup_id,
                                f.person_in_charge,
                                f.followup_date,
                                f.note
                            FROM 
                                Customers c
                            LEFT JOIN 
                                Bookings b ON c.customer_id = b.customer_id
                            LEFT JOIN 
                                Payments p ON b.booking_id = p.booking_id
                            LEFT JOIN 
                                FollowUps f ON b.booking_id = f.booking_id
                            WHERE 
                                c.name LIKE '%$search_term%'";

                        $result = $mysqli->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "Customer ID: " . $row['customer_id'] . "<br>";
                                echo "Name: " . $row['name'] . "<br>";
                                echo "Email: " . $row['email'] . "<br>";
                                echo "Phone: " . $row['phone'] . "<br>";
                                echo "Booking ID: " . $row['booking_id'] . "<br>";
                                echo "Service Type: " . $row['service_type'] . "<br>";
                                echo "Booking Date: " . $row['booking_date'] . "<br>";
                                echo "Payment ID: " . $row['payment_id'] . "<br>";
                                echo "Amount: " . $row['amount'] . "<br>";
                                echo "Payment Date: " . $row['payment_date'] . "<br>";
                                echo "Method: " . $row['method'] . "<br>";
                                echo "Follow-Up ID: " . $row['followup_id'] . "<br>";
                                echo "Person in Charge: " . $row['person_in_charge'] . "<br>";
                                echo "Follow-Up Date: " . $row['followup_date'] . "<br>";
                                echo "Note: " . $row['note'] . "<br><br>";
                            }
                        } else {
                            echo "No results found.";
                        }

                        $mysqli->close();
                        ?>



                        <form method="post" action="customer_searching_details.php">
                            <input type="text" name="search" placeholder="Enter customer name" class="form-control">
                            <br>
                            <input type="submit" value="Search" class="btn btn-success">
                        </form>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>   
</body>
</html>