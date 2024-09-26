<?php 
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $middleName = $_POST["middle-name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone-number"];

    //processing image file
    $file = $_FILES['profile-picture'];
    $fileName = uniqid() . "-" . basename($file['name']);
    $targetDir = "uploads/";
    $targetFile = $targetDir . $fileName;

    $allowedImageTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    if (in_array($file['type'], $allowedImageTypes) && $file['size'] <= 2097152) {

        // moving the uploaded file to the target folder
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            
            $firstName = mysqli_real_escape_string($conn, $firstName);
            $lastName = mysqli_real_escape_string($conn, $lastName);
            $middleName = mysqli_real_escape_string($conn, $middleName);
            $email = mysqli_real_escape_string($conn, $email);
            $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
            $fileName = mysqli_real_escape_string($conn, $fileName);

            //query
            $query = "INSERT INTO users (first_name, last_name, middle_name, email, phone_number, profile_image) 
                      VALUES ('$firstName', '$lastName', '$middleName', '$email', '$phoneNumber', '$fileName')";

            
            if (mysqli_query($conn, $query)) {

                header("Location: registration_message.php?firstName=$firstName&lastName=$lastName&middleName=$middleName&email=$email&phoneNumber=$phoneNumber&profileImage=$fileName");
                exit(); 

            } else {

                echo '
                        <div class="alert alert-danger" role="alert">
                            Database error:' . mysqli_error($conn) . '
                        </div>
                    ';

            }
        } else {
            echo '
                    <div class="alert alert-danger" role="alert">
                        File upload failed.
                    </div>
                ';
        }
    } else {
        echo '
                <div class="alert alert-danger" role="alert">
                    Invalid image file type or image size is exceeded.
                </div>
            ';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-dark text-white">
    <div class="container-fluid">
        <h1 class="text-center mb-3 mt-5">User Registration</h1>
        <form action="user_registration.php" method="POST" enctype="multipart/form-data" class="form-group mx-auto" style="max-width: 800px">
            <div class="mb-3">
                <label for="first-name">First Name:</label>
                <input type="text" class="form-control" id="first-name" name="first-name" required>
            </div>
            <div class="mb-3">
                <label for="last-name">Last Name:</label>
                <input type="text" class="form-control" id="last-name" name="last-name" required>
            </div>
            <div class="mb-3">
                <label for="middle-name">Middle Name (Optional):</label>
                <input type="text" class="form-control" id="middle-name" name="middle-name">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone-number">Phone Number:</label>
                <input type="text" class="form-control" id="phone-number" name="phone-number" required>
            </div>
            <div class="mb-3">
                <label for="profile-picture">Profile Picture (Please upload image w/ less than 2mb size): </label>
                <input type="file" class="form-control" id="profile-picture" name="profile-picture" required>
            </div>
            <div class="mb-3 mt-4 text-center">
                <button type="submit" class="btn btn-success w-50">Register</button>
            </div>
            <div class="mb-3 mt-4 text-left">
                <a href="registered_users.php" class="btn btn-primary">View Registered Users</a>
            </div>
            
        </form>
    </div>
    
    
</body>
</html>