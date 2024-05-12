<?php
include 'link.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql ="delete from crud WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        $sqll="delete from room WHERE u_id=$id"; // Assuming u_id corresponds to the id in crud table
        $result_room=mysqli_query($con,$sqll); // Execute the query for deleting from room table
        if($result_room){
            echo "<script>alert('Deleted successfully')</script>";
            // header('location:admin.php');
        } else {
            echo "<script>alert('Failed to delete record from room')</script>";
            echo "Error: " . mysqli_error($con);
        }
    }else{
        echo "<script>alert('Failed to delete record')</script>";
        echo "Error: " . mysqli_error($con);
    }
}
?>
