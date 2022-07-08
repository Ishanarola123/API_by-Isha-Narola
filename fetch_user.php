<?php
require 'connection.php';

$user="SELECT name,email FROM user";
$query=mysqli_query($conn,$user);
//read all data from database

if(mysqli_num_rows($query)>0){

    while($row=$query->fetch_assoc())
    {
         $response['user'][]=$row;
    }

}
else{
    $response['errors']='400';
}

echo json_encode($response);


?>