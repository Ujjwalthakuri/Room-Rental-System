<?php
include"link.php";

?>

<html>
    <head>
        <title>Room Rental</title>
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
    <hr>
       
        <!-- body part started -->
        <section class="rent-list">
            <h1 class="heading"> Available Room</h1>
            <div class="box-container">
            <?php
    
    $sql = "SELECT * FROM room ORDER BY room.id DESC";
    $results = mysqli_query($con, $sql);
    
    if ($results) {
        while ($result = mysqli_fetch_array($results)) {
            ?>
<div class="room_box">

        <img src="uploads/<?php echo $result['image']; ?>" alt='Room Image'>
        <!-- <div class="room_box_info">  -->
    <p>Room Type: <?php echo $result['roomtype']; ?></p>
    <p>Address: <?php echo $result['location']; ?></p>
    <p>Price: <?php echo $result['monthlyamt']; ?></p>
    <button class="view">View More</button>

<div class="book-button">
    <button>Book</button>
</div>
</div>

            <?php
        };
    };
    ?>
    </div>
          
</section>

        <!-- body part end -->    
                 <!-- Footer section started -->
       <section class="about-contact">
            <div class="column-about">
                <h1>About</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque facilis atque provident magnam ipsam amet possimus ipsa voluptatem quod. </p>
                <a href="about.html">Learn more</a>
            </div>
            <div class="column-contact">
                <h1>Contact</h1>
                Phone:
                <a href="tel:+977-9860924944">9860924944</a><br>
                Email:
                <a href="mailTo:ujjwalthakuri46@gmail.com">Ujjwal@gmail.com</a>
            </div>
       </section>
       <!-- Footer section end -->
      
       <script src="script.js"></script>
    </body>
</html>