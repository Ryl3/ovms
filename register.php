<?php
// Include database configuration
include 'config.php';

// Initialize variables for messages
$successMessage = $errorMessage = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isactive = "active";
    $accountType = "user";
    $accountStatus = "pending";

    // Start transaction
    $pdo->beginTransaction();

    try {
        // Prepare an SQL statement to insert user data
        $sql = "INSERT INTO user (firstname, lastname, phone, username, email, password, isactive, account_type, account_status) VALUES (:firstName, :lastName, :phoneNumber, :username, :email, :password, :isactive, :account_type, :account_status)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':isactive', $isactive);
        $stmt->bindParam(':account_type', $accountType);
        $stmt->bindParam(':account_status', $accountStatus);

        // Execute the statement
        $stmt->execute();

        // Commit the transaction
        $pdo->commit();

        // Set success message
        $successMessage = "Account created successfully. Redirecting to login page...";
        // Redirect to login page after 1.5 seconds
        echo '<script>
                setTimeout(function(){
                    window.location.href = "login.php";
                }, 1500);
              </script>';
    } catch (Exception $e) {
        // Rollback the transaction if an error occurred
        $pdo->rollback();

        // Set error message
        $errorMessage = "An error occurred. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            /* Full height */
            margin: 0;
            /* Reset default margin */
            background: url(img/hehe.png);
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
            /* White text color for better readability on a dark background */
        }

        .centered-container {
            min-height: 100vh;
            /* 100% of the viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: linear-gradient(to right, #ccc, #eee);
            /* Greyish gradient background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #333;
            /* Dark text color for readability on a light background */
            width: 100%;
            /* Full width */
            max-width: 600px;
            /* Maximum width */
            border: 2px solid #333;
            /* Border with dark color */
        }

        .form-label {
            text-align: right;
            /* Align labels to the right */
        }
    </style>
</head>

<body>

    <div class="centered-container">
        <div class="form-container">
            <h2 class="mb-3 text-center">Registration Form</h2>
            <?php if ($successMessage) : ?>
                <div class="alert alert-success"><?php echo $successMessage; ?></div>
            <?php endif; ?>
            <?php if ($errorMessage) : ?>
                <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="firstName" class="col-sm-4 col-form-label text-end">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="firstName" name="firstName" placeholder="Enter first name" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="lastName" class="col-sm-4 col-form-label text-end">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="lastName" name="lastName" placeholder="Enter last name" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-4 col-form-label text-end">Phone Number</label>
                    <div class="col-sm-6">
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label text-end">Email Address</label>
                    <div class="col-sm-6">
                        <input type="email" id="email" name="email" placeholder="Enter email address" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-4 col-form-label text-end">Username</label>
                    <div class="col-sm-6">
                        <input type="text" id="username" name="username" placeholder="Enter username" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label text-end">Password</label>
                    <div class="col-sm-6">
                        <input type="password" id="password" name="password" placeholder="Enter password" class="form-control form-control-sm" required />
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <p class="mt-2">Already have an account? <a href="login.php" style="color: #333;">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>