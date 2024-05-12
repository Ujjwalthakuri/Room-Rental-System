<?php
include "link.php"; // Assuming this file contains your database connection
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['admin_name'])) {
    header('location: index.html');
    exit();
}

$id = $_GET['updateid'];
$sql = "SELECT * FROM crud WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$lname = $row['lname'];
$address = $row['address'];
$number = $row['number'];
$email = $row['email'];
$roll = $row['roll'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $sql = "UPDATE crud SET fname='$fname', lname='$lname', address='$address', number='$number', email='$email' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
       echo "updated your information";
        
    } else {
        die(mysqli_error($con));
    }
}
?>

<html>
   <head>
      <title>Form</title>
      <link rel="stylesheet" href="style.css" href="styleRR.css">
   </head>
   <body>
      <div>
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
                 <li><a href="#" id="open-login">Login</a> </li> 
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
                     <!-- </li> -->
                     <!-------------- login end---------- -->
                 <li><a href="#">Register</a> </li>
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
                 <li><a href='rent.html'>RENT</a> </li>
                 <li><a href="about.html">ABOUT</a> </li>
                <!-- <li class="search"><input id="search" type="search" placeholder="search rooom by Address"></li> -->
             </ul>
         </nav>
         <!-- <hr> -->
         <!-- navigation end -->


         <div class="formss">
         <div class="form-container-first">
   <div class="form-container">
      <div class="title"><h1>Register Your Account:</h1></div>
      <form name="myform" method="post" action="#" onsubmit="return validateForm()">         
      
         <div class="inputs">
         <label class="inn">Full Name:</label><br>
         <input type="text" name="fname" id="f_name" placeholder="Full Name" value=<?php echo $fname;?>>
          <span id="err1"></span>
      </div>

      <div class="inputs">
         <label class="inn">Last Name:</label><br>
         <input type="text" name="lname" id="l_name" placeholder="Last Name" value=<?php echo $lname;?>>
         <span id="err2"></span>
      </div>
      
      <div class="inputs">
         <label class="inn">Address:</label><br>
         <input type="text" name="address" id="location" placeholder="Address" value=<?php echo $address;?>>
         <span id="err3" ></span>
      </div>
      
      <div class="inputs">
         <label class="inn">Mobile No:</label><br>
         <input type="text" name="number" id="num" placeholder="Mobile no" value=<?php echo $number;?>>
         <span id="err4"></span>
      </div>
      
      <div class="inputs">
         <label class="inn">Email:</label><br>
         <input type="email" name="email" id="mail" placeholder="example@email.com" value=<?php echo $email;?>>
         <span id="err5"></span>
      </div>
      
      
     
      <div class="r-submit">
         <button id="btn" name="submit">Update</button>
      </div>
      </form>
   </div>
   </div>
   </div>



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