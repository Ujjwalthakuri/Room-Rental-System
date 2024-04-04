<?php
// include 'link.php';
session_start();
// echo "Welcome ". $_SESSION['admin_name'];
?>
<html>
    <head>
        <title>Crud operation</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
        <!-- navigation started -->
<div class="nav-admin">
    <nav id="adnv">
            <!-- <h2>Rental System</h2> -->
            <div class="logo">
            <a href="admin_home.php"><img src="image/logo.png" alt="logo"></a>
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

        <div class="container">
    <button class='btn_Add'><a href='register.html'>Add User</a></button>
    <table class='admin_Table'>
    <thead class='admin_head'>
    <tr>
    <th>S.No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Number</th>
    <th>Email</th>
    <!-- <th>Mobile</th> -->
    <th>User Role</th>
    <th>Password</th>
    <th>Operation</th>
    </tr>
    </thead>
    <tbody>
        <?php
        include 'link.php';

        $adminProfile=$_SESSION['admin_name'];
        if($adminProfile == true){

        } 
        else{
            header('location:index.html');
        }

        $sql="Select * from crud";
        $result=mysqli_query($con, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $address=$row['address'];
            $number=$row['number'];
            $email=$row['email'];
            $roll=$row['roll'];
            $password=$row['password'];
         
            echo'<tr>
            <td>'.$id.'</td>
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td>'.$address.'</td>
            <td>'.$number.'</td>
            <td>'.$email.'</td>
            <td>'.$roll.'</td>
            <td>'.$password.'</td>
            <td>
            <button id="bu"> <a href="update.php?updateid='.$id.'">Update</a> </button>
            <button id="bd"> <a href="delete.php?deleteid='.$id.'">Delete</a> </button>
        </td>
            </tr>';
        }
    }  
        ?>
    </tbody>
</table>
</div>
</body>
    </html>
