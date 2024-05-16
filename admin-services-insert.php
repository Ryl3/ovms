<?php
// Include database configuration
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form inputs
    $serviceName = $_POST['serviceName'];
    $categoryIds = isset($_POST['categoryIds']) ? $_POST['categoryIds'] : array(); // Check if categoryIds is set, otherwise assign an empty array
    $description = $_POST['description'];
    $fee = $_POST['fee'];
    $dateCreated = date('Y-m-d H:i:s'); // Get current date and time

    // Convert the array of category IDs to a comma-separated string
    $categoryIdsString = implode(',', $categoryIds);

    // Prepare the SQL statement to insert data into the services table
    $sql = "INSERT INTO services (name, categoryids, description, fee, date_created) VALUES (:name, :categoryids, :description, :fee, :date_created)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bindParam(':name', $serviceName);
    $stmt->bindParam(':categoryids', $categoryIdsString);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':fee', $fee);
    $stmt->bindParam(':date_created', $dateCreated);

    // Check if the statement executed successfully
    if ($stmt->execute()) {
        // If successful, redirect to a success page or back to the services list page
        header("Location: admin-service.php?success=1");
        exit;
    } else {
        // Redirect back to the services page with an error message
        header("Location: admin-service.php?error=1");
        exit;
    }
}else {
    // Redirect back to the services page if the form is not submitted
    header("Location: admin-service.php");
    exit;
}
?>