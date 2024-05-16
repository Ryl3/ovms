<?php
session_start();
require 'config.php'; // Assuming config.php contains your PDO connection setup

// Redirect to login page if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Retrieve user input from form
$name = $_POST['name'] ?? '';
$species = $_POST['species'] ?? '';
$breed = $_POST['breed'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$sex = $_POST['sex'] ?? '';
$ownerId = $_SESSION['user_id'];

// Validate the required inputs
if (empty($name) || empty($species) || empty($breed) || empty($birthdate) || empty($sex)) {
    // Handle error - Redirect back or show an error message
    $_SESSION['error_message'] = 'All fields are required.';
    header('Location: pets.php'); // Assuming the form is in index.php
    exit();
}

// Prepare SQL statement to insert pet data
$stmt = $pdo->prepare("INSERT INTO pets (ownerid, name, species, breed, birthdate, sex) VALUES (?, ?, ?, ?, ?, ?)");

// Execute the prepared statement
if ($stmt->execute([$ownerId, $name, $species, $breed, $birthdate, $sex])) {
    // Success: Redirect to pets page or show success message
    $_SESSION['success_message'] = 'Pet added successfully.';
    header('Location: pets.php');
} else {
    // Error: Redirect back or show an error message
    $_SESSION['error_message'] = 'Failed to add pet.';
    header('Location: pets.php');
}

?>
