<?php
session_start();

// Redirect user to login page if not logged in
require 'config.php'; // This now sets up and returns the $pdo object
$pdo = require 'config.php';

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$pet_owner = $_SESSION['user_id']; // Get the user ID from the session

try {
    // Fetch account type of user
    $stmt = $pdo->prepare("SELECT account_type FROM user WHERE userid = ?");
    $stmt->execute([$pet_owner]);
    $accountType = $stmt->fetchColumn(); // Fetching only the account type directly

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage()); // Handling potential query or execution errors
}

// User is logged in, retrieve username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Veterinary Management System</title>
    <!-- CORE CSS -PUT CSS HERE- -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />



    <!-- CORE JAVASCRIPT -PUT JAVASCRIPTS HERE- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js""></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 150, // Adjust the height as needed
                placeholder: 'Enter description here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>

    <style>
        /* Style for the side navigation */
        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            color: #000;
            display: block;
        }

        .sidenav a i {
            margin-right: 10px;
        }

        .sidenav a:hover {
            background-color: #ddd;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidenav">
        <h6 class="text-center">Menu</h6>
        <?php if ($accountType === 'user') : ?>
            <!-- Show these links for user accounts -->
            <a href="recource-center.php"><i class="fas fa-book"></i>Resource Center</a>
            <a href="register.php"><i class="fas fa-user-plus"></i>Register</a>
            <a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <?php elseif ($accountType === 'admin') : ?>
            <!-- Show these links for admin accounts -->
            <a href="admin-dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="admin-appointments.php"><i class="fas fa-calendar-alt"></i>Appointment Requests</a>
            <a href="admin-inquiry.php"><i class="fas fa-circle-info"></i>Inquiries</a>
            <a href="admin-resource-center.php"><i class="fas fa-book"></i>Resource Center</a>
            <a href="admin-pet-admission.php"><i class="fas fa-paw"></i>Pet Admission Aplication</a>
            <a href="admin-shop.php"><i class="fas fa-shopping-cart"></i>Shop</a>
            <a href="admin-reports.php"><i class="fas fa-chart-line"></i>Reports</a>
            <h6 class="text-center">Maintenance</h6>
            <a href="admin-service.php"><i class="fas fa-hand-holding-medical"></i>Services</a>
            <a href="admin-category.php"><i class="fas fa-tags"></i>Category</a>
            <a href="admin-manage-user.php"><i class="fas fa-users"></i>Users</a>
            <a href="admin-inventory.php"><i class="fas fa-boxes"></i>Inventory</a>
            <a href="admin-schedule.php"><i class="fas fa-calendar-alt"></i>Schedules</a>
            <a href="admin-settings.php"><i class="fas fa-cog"></i>Settings</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <?php endif; ?>
    </div>