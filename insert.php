<?php
echo "helloworld!";
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"apidb");
// echo "<br>";
// echo "connection Successfully!";
//receive data from third party
$name=$_POST['name'];
$email=$_POST['email'];
//now run query
$query="INSERT INTO `tbl_user` (`id`, `name`, `email`)
VALUES (NULL, '$name', '$email')";
$res=mysqli_query($conn,$query);
if($res==true)
{
//we store this resopnse 
$response="inserted";
}
else{
    $response="failed!";
}
echo json_encode($response);
?>