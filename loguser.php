<?php 
$con=mysqli_connect("localhost","root","","signup");

$data=json_decode(file_get_contents("php://input"));

$user=$data->user;
$password=$data->password;

$output=array();

$qu="SELECT * FROM signup where mobile='$user' AND  password='$password'  OR email='$user' AND password='$password' ";

$res=mysqli_query($con,$qu);

if(mysqli_num_rows($res) > 0){

$output[]=1;
}
else
{
	
$output[]=2;
}

echo json_encode($output);

 ?>

