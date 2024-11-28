<?php
session_start();
require_once '../classes/user.class.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Redirect users based on their roles
if ($_SESSION['user']['is_admin'] == 1) {
    header("Location: ../admin/home.admin.php");
    exit();
} elseif ($_SESSION['user']['is_staff'] == 1) {
    header("Location: ../client/home.client.php");
    exit();
} else {
    // Optional: Handle unexpected roles or add a default behavior
    echo "Error: User role not recognized.";
    exit();
}
?>
