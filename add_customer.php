<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >


            <?php
            require 'db.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $mysqli->real_escape_string($_POST['name']);
                $email = $mysqli->real_escape_string($_POST['email']);
                $phone = $mysqli->real_escape_string($_POST['phone']);
                $query = "INSERT INTO Customers (name, email, phone) VALUES ('$name', '$email', '$phone')";
                
                
                if ($mysqli->query($query) === TRUE) {
                    echo "Customer added successfully!";
                } else {
                    echo "Error: " . $query . "<br>" . $mysqli->error;
                }
            }
            ?>
<div class="d-flex justify-content-center">
<div class="d-flex align-items-center">

    
    <div class="card" style="width: 18rem;">
         <ul class="list-group list-group-flush">
            <form method="post" >
                <li class="list-group-item">
                    <div  class="form-group">
                    <label for="formGroupExampleInput" for="floatingInput">Name</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
                </li>
                
                <li class="list-group-item">
                    <div class="form-group">
                    <label for="formGroupExampleInput2" for="floatingInput">Email</label>
                    <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                    </div>
                </li>           
                            
                <li class="list-group-item">
                    <div class="form-group">
                    <label for="formGroupExampleInput2" for="floatingInput">Phone</label>
                    <input type="text" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="Phone">
                </li>
                
                <li class="list-group-item">
                    <input type="submit" value="Add Customer" class="btn btn-success">
                </li>
            </ul>
        </form>
    </div>
    
</div>
</div>  
</body>
</html>

