<?php
 include "link.php";
 if(isset($_POST['submit'])){
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $address=$_POST['address'];
   $number=$_POST['number'];
   $email=$_POST['email'];
   $roll=$_POST['roll'];
   $password=$_POST['password'];

   $sql="insert into crud(fname, lname, address, number,  email, roll, password) values ('$fname', '$lname', '$address', '$number', '$email',  $roll, '$password')";
   // echo "$fname";
   $result=mysqli_query($con, $sql);
   if($result){
      echo "Connected to database";
   }
   else{
      die (nysqli_error($con));
   }
 }


?>