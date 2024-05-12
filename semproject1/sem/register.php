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

   $checkEmail="select * from crud where email='$email' "; 
   $checkEmail_check = mysqli_query($con, $checkEmail); 
   if(mysqli_num_rows($checkEmail_check)>0){ echo "Email already exist"; } 
   else{

   $sql="insert into crud(fname, lname, address, number,  email, roll, password) values ('$fname', '$lname', '$address', '$number', '$email',  $roll, '$password')";
   // echo "$fname";
   $result=mysqli_query($con, $sql);
   if($result){
      echo 'Registered Successfully...';
      header('refresh:1,url=register.html');
   }
   else{
      die (nysqli_error($con));
   }
 }
}
?>