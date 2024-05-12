<?php
session_start(); // Start the session
include 'link.php';

if (!isset($_SESSION['id'])) {
    // Redirect to login page if session variable is not set
    header('location:index.html');
    exit(); // Stop further execution
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Counting Users</title>
</head>
<body>
            <!-- navigation started -->
<div class="nav-admin">
    <nav id="adnv">
            <!-- <h2>Rental System</h2> -->
            <div class="logo">
            <a href="admin.php"><img src="image/logo.png" alt="logo"></a>
            </div>
         <ul>
                <li><a href="admin_home.php">HOME</a> </li>
                <!-- <li><a href="#Home">BUY</a> </li> -->
                <li><a href="admin_user.php">Total User</a> </li>
                <li><a href="admin_post.php">All Post</a> </li>
                <li><a href="admin_bookroom.php">Booked Room</a> </li>
               <!-- <li class="search"><input id="search" type="search" placeholder="search rooom by Address"></li> -->
         </ul>
         <div class="logout">
         <button class="delete-btn"> <a href="profile.php?uid=<?php echo $_SESSION['id']; ?>">Profile</a> </button>
                <a href="logout.php" id="open-logout">Logout</a> 
        </div>
    </nav>
</div>
<!-------Navigation End------------>

    <!-------Counting number of user---------->        
    <div class="number-user">
        <!---------For Total User start------------->
        <a href='admin_user.php'>
                <div class="card-body">
                  <h2>   Total User: </h2>
                 <?php
                    $sql="select * from crud";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> $category_total </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
                </a>
         <!---------For Total User End------------->

        <!---------For Owner start------------->
        <a href='owner_num.php'>
                <div class="card-body">
                <h2>      Owner:  </h2>
                 <?php
                    $sql="select * from crud where roll='1'";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> $category_total </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
                </a>
         <!---------For Owner End------------->

         <!---------For Renter Start------------->        
         <a href='renter_num.php'> <div class="card-body">
                <h2>  Renter:  </h2>
                 <?php
                    $sql="select * from crud where roll='2'";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> $category_total </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
                </a>
         <!---------For Renter End------------->

         <!---------For Renter Start-------------> 
         <a href='admin_post.php'>       
         <div class="card-body">
                  <h2>  Total Post:  </h2>
                 <?php
                    $sql="select * from room";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> $category_total </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
                </a>
         <!---------For Renter End------------->
            </div>
<!-------Counting number of user----------> 
</body>
</html>

