<?php
include 'link.php';
session_start();

if (!isset($_SESSION['id'])) {
    // Redirect to login page if session variable is not set
    header('location:index.html');
    exit(); // Stop further execution
}

$owner = $_SESSION['email'];
$sql = "SELECT * FROM crud WHERE email='$owner'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$id = $row['id'];
?>
<html>
<head>
    <title>Crud operation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation started -->
    <div class="nav-admin">
        <nav id="adnv">
            <div class="logo">
                <a href="admin_home.php"><img src="image/logo.png" alt="logo"></a>
            </div>
            <ul>
            <li><a href="admin_home.php">HOME</a> </li>
                <!-- <li><a href="#Home">BUY</a> </li> -->
                <li><a href="admin_user.php">Total User</a> </li>
                <li><a href="admin_post.php">All Post</a> </li>
                <li><a href="admin_bookroom.php">Booked Room</a> </li>
            </ul>
            <div class="logout">
            <button class="delete-btn"> <a href="profile.php?uid=<?php echo $_SESSION['id']; ?>">Profile</a> </button>
                <a href="logout.php" id="open-logout">Logout</a> 
            </div>
        </nav>
    </div>
    <!-- Navigation End -->
    
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
                        <th>User Id</th>
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
                    // include 'link.php';

                    // Check if the admin is logged in
                    if(isset($_SESSION['admin_name'])) {
                        $sql = "SELECT * FROM room";
                        $result = mysqli_query($con, $sql);
                        if($result) {
                            $serial_number = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $u_id=$row['u_id'];
                                $roomtype = $row['roomtype'];
                                $image = $row['image'];
                                $location = $row['location'];
                                $monthlyamt = $row['monthlyamt'];
                                $description = $row['description'];

                                echo '<tr>
                                    <td>'.$serial_number.'</td>
                                    <td>'.$u_id.'</td>
                                    <td>'.$roomtype.'</td>
                                    <td class="pic"><img src="uploads/' . $image . '" alt="Owner Image"></td>
                                    <td>'.$location.'</td>
                                    <td>'.$monthlyamt.'</td>
                                    <td>'.$description.'</td>
                                    <td></td>
                                    <td>
                                    <button id="bu"> <a href="admin_view _owner.php?uid='.$u_id.' ">View User</a> </button>
                                        <button id="bd"> <a href="delete_post.php?deleteid='.$id.'">Delete</a> </button>
                                    </td>
                                </tr>';
                                $serial_number ++;
                            }
                        }  
                    } else {
                        // Redirect to login page if not logged in
                        header('location:index.html');
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Post Property End -->
</body>
</html>
