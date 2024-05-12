<?php
// Start the session
session_start();

// Include your database connection file
include 'link.php';

// Check if the user ID is set in the URL parameter
if(isset($_GET['id'])) {
    // Get the user ID from the URL parameter
    $userId = $_GET['id'];

    // Fetch user data from the database based on the user ID
    $sql = "SELECT * FROM crud WHERE id = $userId";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        // User found, display the profile information
        $user = mysqli_fetch_assoc($result);
        // Display user profile information as needed
        echo "User ID: " . $user['id'] . "<br>";
        echo "Username: " . $user['username'] . "<br>";
        // Add more fields as needed
    } else {
        // User not found
        echo "Us not found.";
    }
} else {
    // If user ID is not set in the URL parameter
    echo "User ID is not provided.";
}
?>
