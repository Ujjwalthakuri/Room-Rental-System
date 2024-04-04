<?php
include 'link.php';
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
                <li><a href="admin.php">Total User</a> </li>
                <li><a href="#">Renter</a> </li>
               <!-- <li class="search"><input id="search" type="search" placeholder="search rooom by Address"></li> -->
         </ul>
         <div class="logout">
                <a href="logout.php" id="open-logout">Logout</a> 
        </div>
    </nav>
</div>
<!-------Navigation End------------>

    <!-------Counting number of user---------->        
    <div class="number-user">
        <!---------For Total User start------------->
                <div class="card-body">
                    Total User:
                 <?php
                    $sql="select * from crud";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> '$category_total' </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
         <!---------For Total User End------------->

        <!---------For Owner start------------->
                <div class="card-body">
                    Owner:
                 <?php
                    $sql="select * from crud where roll='1'";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> '$category_total' </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
         <!---------For Owner End------------->

         <!---------For Renter Start------------->        
                <div class="card-body">
                    Renter:
                 <?php
                    $sql="select * from crud where roll='2'";
                    $result=mysqli_query($con, $sql);

                    if($category_total=mysqli_num_rows($result)){
                        echo "<h4> '$category_total' </h4>";
                    }
                    else{
                        echo '<h4> No Data </h4>';
                    }
                 ?>
                </div>
         <!---------For Renter End------------->
            </div>
<!-------Counting number of user----------> 
</body>
</html>