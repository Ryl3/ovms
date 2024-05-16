<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    require 'config.php';

    // Prepare and bind parameters
    $sql = "INSERT INTO category (name, date_created) VALUES (?, DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s %p'))";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $categoryName);

    // Set parameters and execute
    $categoryName = $_POST['categoryName'];

    if ($stmt->execute()) {
        // Category added successfully
        header("Location: admin-category.php"); // Redirect to the category list page
        exit();
    } else {
        // Error occurred
        echo "Error: Unable to add category.";
    }
} else {
    // Redirect to add category form if accessed directly without submitting the form
    header("Location: admin-category-insert.php");
    exit();
}
?>
