<?php
include 'link.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql ="delete from booking WHERE book_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Deleted successfull";
        // header('location:admin.php');
    }else{
        die (mysqli_error($con));
    }
}
?>