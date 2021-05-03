<?php 

$connect=mysqli_connect("localhost","root","","signup");

$output=array();
$sql="SELECT * FROM signup";
$res=mysqli_query($connect,$sql);
if(mysqli_num_rows($res) > 0)
{
	while($row=mysqli_fetch_array($res))
	{
		$output[]=$row;
	}
echo json_encode($output);
}


 ?>