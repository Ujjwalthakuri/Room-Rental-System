<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <!-- navigation started -->
        <!-- top navigation bar -->
        <div class="top-navigation">
        <div class="top-navigation-left">
            Phone:
            <a href="tel:+977-9860924944">9860924944</a>
            Email:
            <a href="mailTo:ujjwalthakuri46@gmail.com">Ujjwal@gmail.com</a>
        </div>
        <div class="top-navigation-right">
            <ul>
                <!---------------- login started-------- -->
                <li><a href="#" id="open-login">Login</a> 
                <div class="login-form">
                    <form method="post" action="login.php"  class="form-body" >
                        <h1>Login Your Account</h1>
                        <div class="form-input">
                  <input type="text" name="email" placeholder="Example.@gmail.com" class="form-control" required><br>
                        </div>
                        <div class="form-input">
                  <input type="password" name="password" placeholder="password" class="form-control" required>
                        </div>
                  <div class="form-login">
                    <button type="submit" name="submit">Login</button>
                  </div>
                  <div class="form-dont-login">
                    <p>Dont have an account?</p>
                   <p> <a href="register.html" id="create">Create Account</a></p>
                  </div>
                  </form>
                  
                </div>
                </li>
                <!-------------- login end---------- -->
                <li><a href="register.html">Register</a> </li>
            </ul>
        </div>
        </div>
        <!-- top navigation bar end -->
        <nav>
            <!-- <h2>Rental System</h2> -->
            <div class="logo">
            <a href="index.html"><img src="image/logo.png" alt="logo"></a>
            </div>
            <ul>
                <li><a href="index.html">HOME</a> </li>
                <!-- <li><a href="#Home">BUY</a> </li> -->
                <li><a href="rent.php">RENT</a> </li>
                <li><a href="about.html">ABOUT</a> </li>
                <li class="search">
                
                <form action="newsidebar.php" method="GET" class="search">
         
                     <input type="text" name="search" placeholder="Search...">
                     <button type="submit" class="btn">Search</button>
            
                </form>
                    </li>
            </ul>
        </nav>
    </div>
<section class="rent-list">
    <?php 
    include "link.php";

    if(isset($_GET['search'])) {
        $search_team = mysqli_real_escape_string($con, $_GET['search']);
?>
        <h4 class="heading">Search: <?php echo $search_team; ?></h4>
        <hr>
        <br>
        <br>
        <?php 
        $sql = "SELECT roomtype, image, location, monthlyamt FROM room
                WHERE room.location LIKE '%{$search_team}%'
                ORDER BY room.id DESC";
        $result = mysqli_query($con, $sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="box-container">
                    <div class="room_box">
                        <img src="uploads/<?php echo $row['image']; ?>" alt="Room Image">
                        <p>Room Type: <?php echo $row['roomtype']; ?></p>
                        <p>Address: <?php echo $row['location']; ?></p>
                        <p>Price: <?php echo $row['monthlyamt']; ?></p>
                        <button class="view">View More</button>
                        <div class="book-button">
                            <button>Book</button>
                        </div>
                    </div>
                </div>
        <?php
            }
           }
    }
    ?>
</section>

</body>
</html>