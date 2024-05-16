<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $account_type = $_POST['account_type'];
    $status = $_POST['status'];
    $position = $_POST['position'];

    // Handle file upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
        $avatar = 'uploads/' . basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
    } else {
        $avatar = 'uploads/default_avatar.png';
    }

    // Insert the data into the database
    $sql = "INSERT INTO user (firstname, lastname, phone, email, username, password, account_type, account_status, position, avatar)
            VALUES (:firstname, :lastname, :phone, :email, :username, :password, :account_type, :status, :position, :avatar)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':phone' => $phone,
        ':email' => $email,
        ':username' => $username,
        ':password' => $password,
        ':account_type' => $account_type,
        ':status' => $status,
        ':position' => $position,
        ':avatar' => $avatar
    ]);

    // Redirect back to the user list page
    header('Location: admin-manage-user.php');
}
?>
