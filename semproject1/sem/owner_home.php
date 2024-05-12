<?php
include 'link.php';
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page if session variable is not set
    header('location:about.html');
    exit(); // Stop further execution
}
$owner = $_SESSION['email'];
$sql = "SELECT * FROM crud WHERE email='$owner'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$id = $row['id'];
 
$sql = "SELECT * FROM room WHERE u_id='$id'";
$sql1 = mysqli_query($con, $sql);
$result = mysqli_num_rows($sql1);
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


<div class="property-title">
    <h1>Property Information</h1>
</div>
<div class="property-list">
    <div class="P-container">
        <table class='owner_Table'>
            <thead class='owner_head'>
                <tr>
                    <th>S.No</th>
                    <th>Room Type</th>
                    <th>Image</th>
                    <th>Location</th>
                    <th>Monthly Amount</th>
                    <th>Description</th>
                    <th>Total Applied</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $result; $i++) {
                    $row = mysqli_fetch_array($sql1);
                    // Fetch and display total applied from database
                    // $propertyId = $row['id'];
                    // $appliedQuery = mysqli_query($con, "SELECT COUNT(*) AS total_applied FROM applications WHERE property_id='$propertyId'");
                    // $appliedData = mysqli_fetch_assoc($appliedQuery);
                    // $totalApplied = $appliedData['total_applied'];
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['roomtype'] ?></td>
<td><img src="./uploads/<?php echo $row['image'] ?>" alt=""></td>
                        <td><?php echo $row['location'] ?></td>
                        <td><?php echo $row['monthlyamt'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td> 
                            
                        </td>
                        <td>
                        <!-- <button id="bu"> <a href="admin_view _owner.php?uid='.$u_id.' ">View User</a> </button> -->
                        <!-- <button id="bd"> <a href="delete_post.php?deleteid='.$id.'">Delete</a> </button> -->
                       
    <button id ="bu"> <a href="owner_form_update.php?updateid=<?php echo $row['id']; ?>">update</a> </button>
    <button id="bd"> <a href="delete_post.php?deleteid=<?php echo $row['id']; ?>">Delete</a> </button>


                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
                </div>
                </body>
                </html>
