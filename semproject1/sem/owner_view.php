<?php
include 'link.php';
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page if session variable is not set
    header('location:about.html');
    exit(); // Stop further execution
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
 <!-- Post Property started -->
 <div class="property-title">
        <h1>All Property Information</h1>
    </div>
    <div class="property-list">
        <div class="P-container">
            <table class='owner_Table'>
                <thead class='owner_head'>
                    <tr>
                        <th>S.No</th>
                        <th>room_id</th>
                        <th>Room Information</th>
                        <th>booking_date</th>
                        <th>Renter Information</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // include 'link.php';

                    // Check if the admin is logged in
                    
                        $owner_id = $_SESSION['id'];
                        $sql = "SELECT * FROM booking where status='0' AND owner_id=$owner_id";
                        $result = mysqli_query($con, $sql);
                        if($result) {
                            $serial_number = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['book_id'];
                               
                                $room_id = $row['room_id'];
                                $booking_date = $row['booking_date'];

                                echo '<tr>
         <td>'.$serial_number.'</td>
         <td>'.$room_id.'</td>
         <td><button id="bu"> <a href="room_information.php?uid='.$row['room_id'].' ">View </a> </button></td>
         <td>'.$booking_date.'</td>
         <td><button id="bu"> <a href="admin_view _owner.php?uid='.$row['renter_id'].' ">View </a> </button></td>
         <td>
             <form action="owner_view.php" method="POST">
                 <input type="hidden" name="book_id" value="'.$id.'">
                 <input type="submit" name="approved" value="approved">
                 <input type="submit" name="deny" value="deny">
             </form>
         </td>
     </tr>';

                                $serial_number ++;
                            }
                        }  
                   
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Post Property End -->
</div>
</body>
</html>


<?php
if(isset($_POST['approved'])){
    $book_id=$_POST['book_id'];
    $sql="update booking set status='approved', booking_date=NOW() where book_id='$book_id' ";
    $result=mysqli_query($con, $sql);
    if($result){
       echo "Approved";
    }
}

if(isset($_POST['deny'])){
    $book_id=$_POST['book_id'];
    $sql ="delete from booking WHERE book_id=$book_id";
    $result=mysqli_query($con, $sql);
    if($result){
        echo "Deleted successfully";

        // header('location:admin.php');
    }else{
        die (mysqli_error($con));
    }
}

?>
