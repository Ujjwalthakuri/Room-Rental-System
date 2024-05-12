<?php
include 'link.php'; // Include database connection

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $owner_id = $_POST['owner_id'];
    $room_id = $_POST['room_id'];
    $renter_id = $_POST['renter_id'];
    
    // Insert booking into database
    $query = "INSERT INTO booking (owner_id, status, room_id, renter_id, booking_date) VALUES ('$owner_id', '0', '$room_id', '$renter_id', NOW())";
    $result = mysqli_query($con, $query);

    // Handle query result
    if ($result) {
        echo 'Booked Successfully...';
        header('refresh:1,url=renter.php');
    } else {
        echo 'Booking unsuccessful';
    }
} else {
    echo 'Form submission error';
}
?>
