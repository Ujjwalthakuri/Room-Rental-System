<select name='location'>
    <option value="">select Option</option> 
<?php
include 'link.php';
$sql="select * from room";
$result=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $location=$row['location'];
    echo "<option value='$id'> $location </option>";
}

?>
</select>