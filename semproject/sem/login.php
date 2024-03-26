<?php
include "link.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM crud WHERE email='" . $email . "' AND password='" . $password . "'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            if ($row["roll"] == "0") {
                $_SESSION['admin_name']= $email;
                header("location:admin.php");
                exit;
            }
            if ($row["roll"] == "1") {
                $_SESSION['owner_name']= $email;
                header("location:owner.php");
                exit;
            } elseif ($row["roll"] == "2") {
                $_SESSION['renter_name']= $email;
                header("location:renter.php");
                exit;
            }
        } else {
        //    echo"<script>alert('No matching records found');</script>";
           header("location:index.html");
           echo"<script>alert('No matching records found');</script>";
            exit;
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
        exit;
    }
}
?>