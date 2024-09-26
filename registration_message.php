<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Message</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5 bg-dark text-white p-3 rounded-5">
        <h1 class="text-success text-center">Registration Successful!</h1>
        <h2 class="text-center">Here is your Details:</h2>
        <ul class="list-group mt-4">
            <li class="list-group-item">First Name: <?php echo htmlspecialchars($_GET['firstName']); ?></li>
            <li class="list-group-item">Last Name: <?php echo htmlspecialchars($_GET['lastName']); ?></li>
            <li class="list-group-item">Middle Name: <?php echo htmlspecialchars($_GET['middleName']); ?></li>
            <li class="list-group-item">Email: <?php echo htmlspecialchars($_GET['email']); ?></li>
            <li class="list-group-item">Phone Number: <?php echo htmlspecialchars($_GET['phoneNumber']); ?></li>
            <li class="list-group-item">
                Profile Picture: 
                <img src="uploads/<?php echo htmlspecialchars($_GET['profileImage']); ?>" alt="Profile Image" class="" style="max-width: 150px;">
            </li>
        </ul>
        <div class="text-center mt-4">
            <a href="registered_users.php" class="btn btn-primary">View Registered Users</a>
        </div>
    </div>
</body>
</html>