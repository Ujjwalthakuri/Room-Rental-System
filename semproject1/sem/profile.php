<?php
include 'link.php'; // Include database connection

// Check if user ID is provided in the URL
if(isset($_GET['uid'])) {
    $user_id = $_GET['uid'];
    
    // Query to fetch user information
    $user_query = mysqli_query($con, "SELECT * FROM crud WHERE id='$user_id'");
    $user_row = mysqli_fetch_array($user_query);
    
    // Display user information
   
    if($user_row) {
        echo "<h1 class='information'>Your Information</h1>";
        // echo "<p>User ID: " . $user_row['id'] . "</p>";
        echo "<p>First Name: " . $user_row['fname'] . "</p>";
        echo "<p>Last Name: " . $user_row['lname'] . "</p>";
        echo "<p>Address: " . $user_row['address'] . "</p>";
        echo "<p>Number: " . $user_row['number'] . "</p>";
        echo "<p>Email: " . $user_row['email'] . "</p>";
        // Display other user information as needed
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

?>
<button><a href="update.php?updateid=<?php echo $user_row['id']; ?>">Update</a></button>