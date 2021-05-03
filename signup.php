<?php 

$con=mysqli_connect('localhost','root','','signup') or die ();

$data=json_decode(file_get_contents("php://input"));

$email=$data->email;
$mobile=$data->mobile;
$pass=$data->password;

$output=array();
$q="SELECT * FROM signup Where email='$email' AND mobile='$mobile'";
$rest=mysqli_query($con,$q);
if(mysqli_num_rows($rest) > 0){
	$output[]=3;
}else{
$sql="INSERT INTO signup(email,mobile,password) VALUES ('$email','$mobile','$pass')";

$res=mysqli_query($con,$sql);

if($res)
{

$output[]=1;
}
else{
$output[]=2;
}

}
echo json_encode($output);
 ?>