<?php
require 'connection.php';
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$check_user="SELECT *from user where email='$email'";
$runquery=mysqli_query($conn,$check_user);
if(mysqli_num_rows($runquery)>0){
    $response['error']="002";
    $response['message']="user is already registerd!!";
}
else{
$insertquery="INSERT INTO `user` (`id`, `name`, `email`,`password`)
VALUES (NULL, '$username', '$email','$password')";
$result=mysqli_query($conn,$insertquery);
if($result){
    $response['error']="000";
    $response['message']="data inserted successfully!";
}
else
{
    $response['error']="001";
    $response['message']="data can not inserted successfully!";
}


}
echo json_encode($response);
?>