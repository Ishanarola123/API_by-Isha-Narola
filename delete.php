<?php
require 'connection.php';
$id=$_POST['id'];

$deleteuser=mysqli_query($conn,"DELETE FROM user WHERE id='$id'");
if($deleteuser>0){
    $response['error']=200;
    $response['message']="deleted successfully!, account deleted ";

}
else{
    $response['error']=400;
    $response['message']="Account can not be deleted !";
}
echo json_encode($response);

?>