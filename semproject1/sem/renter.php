<?php
session_start();
$renter_id = $_SESSION['id'];

// echo "Welcome ". $_SESSION['renter_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renter(2)Part</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Rstyle.css">
</head>

<body>

    <!-- navigation started -->
    <div class="nav-admin">
        <nav id="adnv">
            <!-- <h2>Rental System</h2> -->
            <div class="logo">
                <a href="Owner.php"><img src="image/logo.png" alt="logo"></a>
            </div>
            <ul>
                <li><a href="renter-Home">Available Rooms</a> </li>
                <!-- <li><a href="#Home">BUY</a> </li> -->
                <li><a href="R_applied.php">View Applied</a> </li>
                <!-- <li class="search"><input id="search" type="search" placeholder="search rooom by Address"></li> -->
            </ul>
            <div class="logout">
                <button class="delete-btn"> <a href="admin_view _owner.php?uid=<?php echo $row['id']; ?>">Profile</a> </button>
                <a href="logout.php" id="open-logout">Logout</a>
            </div>
        </nav>
    </div>
    <!-------Navigation End------------>
    <h1>Renter Page</h1>
    <section class="rent-list">
        <header>
            <div class="rr">
                <h1>Available room</h1>
            </div>
        </header>
        <?php
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "example1";

        $con = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if (!$con) {
            die("connection failed" . mysqli_connect_error());
        }
        $sql = "SELECT * FROM room";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $u_id = $row['u_id'];
                $roomtype = $row['roomtype'];
                $image = $row['image'];
                $location = $row['location'];
                $monthlyamt = $row['monthlyamt'];
                $description = $row['description'];

                echo ' <section id="available-rooms">
            
            <div class="room">
            
            <h2>' . $location . '</h2>          
           <img src="uploads/' . $image . '" alt="Owner Image" class= image>
            <p>' . $description . '</p>
            <h3>' . $roomtype . '</h3>
            <h3>' . $monthlyamt . ' <small> (per month) </small></h3>
            <form action="book.php" method="POST">   
            <input hidden value = '.$u_id.' name= "owner_id" >
                <input hidden value = '.$id.' name= "room_id" >
                <input hidden value = '.$renter_id.' name= "renter_id" >
            <button onclick="bookRoom()" name="submit">Book Now</button><br><br>
            </form>
        </div></section> ';
            }
        }

        ?>
</body>

</html>