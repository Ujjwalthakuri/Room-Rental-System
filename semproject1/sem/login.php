<?php
include "link.php";
session_start();

        if (isset($_POST['submit'])) {
            // include "database.php";
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT id, email, roll FROM crud WHERE email='{$email}' AND password='{$password}'";
            $result = mysqli_query($con, $sql) or die("Query Failed");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['roll'] = $row['roll'];
                    // header("location:owner_add.php");
                    if ($row["roll"] == "0") {
                        $_SESSION['admin_name']= $email;
                        header("location:admin_home.php");
                        exit;
                    }
                    if ($row["roll"] == "1") {
                        $_SESSION['admin_name']= $email;
                        header("location:owner_home.php");
                        exit;
                    }
                    if ($row["roll"] == "2") {
                        $_SESSION['admin_name']= $email;
                        header("location:renter.php");
                        exit;
                    }
                }

            } else {
                echo  "<script>alert('Username and password are not Match')</script>";
            }
        }
?>