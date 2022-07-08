<?php
require 'connection.php';
$id=$_REQUEST['id'];
$name=$_POST['name'];
$email=$_POST['email'];

$update_query="UPDATE user SET name='$name',email='$email' WHERE id='$id'";
$result=mysqli_query($conn,$update_query);

if($result>0){
    $response['error']="200";
    $response['message']="user update success";


}
else{
    $response['error']="400";
    $response['message']="user can not update success";
}
echo json_encode($response);

?>