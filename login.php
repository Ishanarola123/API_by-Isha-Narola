<?php
require 'connection.php';
$email=$_POST['email'];
$password=md5($_POST['password']);

//$check_user="SELECT *from user WHERE email='$email' and password='$password'";
//if user are there then fetch data 
$check_user="SELECT id,name,email FROM user WHERE email='$email'";
$runquery=mysqli_query($conn,$check_user);

if(mysqli_num_rows($runquery)>0){

$check_user="SELECT id,name,email FROM user WHERE email='$email' and password='$password'";
$resultant=mysqli_query($conn,$check_user);

if(mysqli_num_rows($resultant)>0){

    while($row=$resultant->fetch_assoc())
    {
         $response['user']=$row;
    }

  $response['error']="200";
  $response['message']="logged in successfully!   ";

}
else{
    //password not match
    $response['error']="400";
    $response['message']="can not logged in! ";
}

}
else{
    $response['error']="200";
    $response['message']=" Wrong credentials";
}
echo json_encode($response);


?>