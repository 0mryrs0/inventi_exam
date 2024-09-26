<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registered User</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center mb-3 mt-5">Registered Users</h1>
        <table class="table table-warning table-hover text-center  table-bordered align-middle px-3">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Profile Image</th>
                </tr> 
            </thead>                      
            <tbody>
                <?php 
                    //query
                    $query = "SELECT * from users";
                    $result = mysqli_query($conn, $query);
                    while ($fetch = mysqli_fetch_array($result)) {
                        
                    $fullName = $fetch['last_name'] . ", " . $fetch['first_name'] . " " . $fetch['middle_name'];     
                ?>       
                <tr >
                    <td><?php echo $fullName?></td>
                    <td><?php echo $fetch['email']?></td>
                    <td><img src="uploads/<?php echo $fetch['profile_image']?>" style="width:100px"></td>
                </tr>

                <?php 
                } 
                ?>

            </tbody>
        </table>
    </div>
    
</body>
</html>