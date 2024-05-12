<?php
include "link.php"; // Assuming this file contains your database connection
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['admin_name'])) {
    header('location: index.html');
    exit();
}

$id = $_GET['updateid'];
$sql = "SELECT * FROM room WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$roomtype = $row['roomtype'];
$lname = $row['monthlyamt'];
$description = $row['description'];





if (isset($_POST['submit'])) {
    $roomtype = $_POST['roomtype'];
    $lname = $_POST['monthlyamt'];
    $description = $_POST['description'];
    
    // Sanitize inputs to prevent SQL injection
    $roomtype = mysqli_real_escape_string($con, $roomtype);
    $lname = mysqli_real_escape_string($con, $lname);
    $description = mysqli_real_escape_string($con, $description);

    $sql = "UPDATE room SET roomtype='$roomtype', monthlyamt='$lname', description='$description' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
       echo "Updated your information";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <title>Update Property</title>
</head>
<body>
    <!-- Your navigation code here -->
    <!-- Your form code here -->
    <div class="Owner_containers">
        <div class="form_start">
            <div class="owner_title"><h1>Enter property information:</h1> </div>

            <form method='post' action="" class="property_form" enctype="multipart/form-data">
                <div class="inputs">
                    <label class="inns">Room Type:</label><br>
                    <select name="roomtype" id="type">
                       <option value="one room" <?php if($roomtype == 'one room') echo 'selected'; ?>>One</option>
                       <option value="two room" <?php if($roomtype == 'two room') echo 'selected'; ?>>Two</option>
                       <option value="Flat" <?php if($roomtype == 'Flat') echo 'selected'; ?>>Flat</option>
                    </select>
                 <span id="o_err0"></span>
                 </div>
            
                 <div class="inputs">
                    <label class="inns">Monthly Amount:</label><br>
                    <input type="text" name="monthlyamt" id="amt" placeholder="Enter monthly price of room" value="<?php echo $lname; ?>">
                    <span id="o_err3"></span>
                 </div>

                 <div class="inputs">
                    <label class="inns">Description:</label><br>
                    <textarea name="description" id="desc" placeholder="Describe the surroundings"><?php echo $description; ?></textarea>
                    <span id="o_err4"></span>
                 </div>

                 <div class="r-submit">
                    <button id="btn" name="submit">Update</button>
                 </div>
            </form>
        </div>
    </div>
</body>
</html>
