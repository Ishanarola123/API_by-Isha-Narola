<?php
require 'connection.php';
$email=$_POST['email'];
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);

$check_user="SELECT *FROM user WHERE email='$email' and password='$password'";
$runquery=mysqli_query($conn,$check_user);

if(mysqli_num_rows($runquery)>0){
//update new password as current password
$update_password="UPDATE user SET password='$newpassword' WHERE email='$email'";
$run_updatepasswordquery=mysqli_query($conn,$update_password);
    
if($run_updatepasswordquery>0){
    $response['error']="200";
    $response['message']="Update password successfully!";
}
else{
    $response['error']="400";
    $response['message']="No Updated password!";

}
}
else{
    $response['error']="001";
    $response['message']="user can not found!";
}


echo json_encode($response);


?>