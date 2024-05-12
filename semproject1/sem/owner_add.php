<?php
include "link.php";
session_start();

// echo "Welcome ". $_SESSION['id'];
// Check if session variable is set
if (!isset($_SESSION['id'])) {
    // Redirect to login page if session variable is not set
    header('location:index.html');
    exit(); // Stop further execution
}
?>

<?php

$owner = $_SESSION['email'];
$sql="select * from crud where email='$owner'";
$query=mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
$id=$row['id'];
 
// echo "$id";

if(isset($_POST['submit'])){
   $roomtype = $_POST['roomtype'];
   $location = $_POST['location'];
   $monthlyamt = $_POST['monthlyamt'];
   $description = $_POST['description'];
   $image = $_FILES['image']['name']; // Use $_FILES to access file data
    
   // Temporary file location
   $tempname = $_FILES['image']['tmp_name'];

   // Move uploaded file to specific location
   $target_dir = "uploads/"; // Specify the directory where you want to save the uploaded files
   $target_file = $target_dir . basename($image);

   // Check if file has been uploaded successfully   
   if (move_uploaded_file($tempname, $target_file)) {
            // If file uploaded successfully, proceed with database insertion
            $sql = "INSERT INTO room ( u_id, roomtype, image, location, monthlyamt, description) VALUES ('$id' ,'$roomtype', '$image', '$location', '$monthlyamt', '$description')";
            $result = mysqli_query($con, $sql);
            if($result) {
               echo "Data and image uploaded successfully.";
            } else {
               die(mysqli_error($con));
            }
         } else {
            echo "Sorry, there was an error uploading your file.";
         }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <title>Add Property</title>
</head>
<body>
<div>
                    <!-- navigation started -->
<div class="nav-admin">
    <nav id="adnv">
            <!-- <h2>Rental System</h2> -->
            <div class="logo">
            <a href="Owner.php"><img src="image/logo.png" alt="logo"></a>
            </div>
         <ul>
                <li><a href="owner_home.php">HOME</a> </li>
                <!-- <li><a href="#Home">BUY</a> </li> -->
                <li><a href="owner_add.php">Add Property</a> </li>
                <li><a href="owner_view.php">View Applied</a> </li>
                <li><a href="owner_renter.php">Your Renters</a> </li>
               <!-- <li class="search"><input id="search" type="search" placeholder="search rooom by Address"></li> -->
         </ul>
         <div class="logout">
         <button class="delete-btn"> <a href="profile.php?uid=<?php echo $_SESSION['id']; ?>">Profile</a> </button>
                <a href="logout.php" id="open-logout">Logout</a> 
        </div>
    </nav>
</div>
<!-------Navigation End------------>

<!-------Form part Started----------------->

    <div class="Owner_containers">
        <div class="form_start">
            <div class="owner_title"><h1>Enter property information:</h1> </div>

            <form method='post'  class="property_form" enctype="multipart/form-data">
                <div class="inputs">
                    <label class="inns">Room Type:</label><br>
                    <select name="roomtype", id="type">
                       <option value="one room">One</option>
                       <option value="two room">Two</option>
                       <option value="Flat">Flat</option>
                    </select>
                 <span id="o_err0"></span>
                 </div>

                 <div class="inputs">
                    <label class="inns">Room Photo:</label><br>
                    <input type="file" name="image" id="pic">
                    <span id="o_err1"></span>
                 </div>
                 
                 <div class="inputs">
                    <label class="inns">Location:</label><br>
                    <input type="text" name="location" id="loc" placeholder="Enter location">
                    <span id="o_err2"></span>
                 </div>

                 <div class="inputs">
                    <label class="inns">Monthly Amount:</label><br>
                    <input type="text" name="monthlyamt" id="amt" placeholder="Enter monthly price of room">
                    <span id="o_err3"></span>
                 </div>

                 <div class="inputs">
                    <label class="inns">Description:</label><br>
                    <textarea name="description" id="desc" placeholder="Describe the surroundings"></textarea>
                    <span id="o_err4"></span>
                 </div>

                 <div class="r-submit">
                    <button id="btn" name="submit">Submit</button>
                 </div>
        </form>
        </div>
    </div>

<!-------Form part End----------------->
</body>
</html>
