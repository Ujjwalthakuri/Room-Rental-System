<?php
include 'link.php'; // Include database connection

// Check if user ID is provided in the URL
if(isset($_GET['uid'])) {
    $user_id = $_GET['uid'];
    
    // Query to fetch user information
    $user_query = mysqli_query($con, "SELECT * FROM room WHERE id='$user_id'");
    $user_row = mysqli_fetch_array($user_query);
    
    // Display user information
   
    if($user_row) {
        echo "<h1 class='information'>Room Information</h1>";
        // echo "<p>User ID: " . $user_row['id'] . "</p>";
        echo "<p>Room Type: " . $user_row['roomtype'] . "</p>";
        echo "<img src='./uploads/" . $user_row['image'] . "' alt='Room Image'>";
        echo "<p>Location: " . $user_row['location'] . "</p>";
        echo "<p>Monthly Price: " . $user_row['monthlyamt'] . "</p>";
        echo "<p>Description: " . $user_row['description'] . "</p>";
        // Display other user information as needed
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

?>
