<?php

require_once('db.php');


if(!empty($_GET['name'])&& !empty($_GET['email']) && !empty($_GET['password']))
{

$name = $_GET['name'];
$email = $_GET['email'];
$password =$_GET['password'];

$conn=db_conn();
if($conn!=false)
{

	$sql="INSERT INTO `users` (`name`,`email`,`password`) VALUES('$name','$email','$password')";
	 $conn->exec($sql);
//	 echo 'Success db';

}
}else
{
	//echo 'variables are empt';
}
$description = $_GET['description'];
$name = $_GET['name'];

if(isset($description,$name))
{

//echo $description." ".$name."<br>";
}else
{
	//echo "sorry empty variables";
}

//echo $_POST['category']['category'];
$data= $_FILES['uploaded_file']['name'];

$eachstr = explode("$",$data);
echo $eachstr[0]." ".$eachstr[1]." ".$eachstr[2]." ".$eachstr[3];
 $file_path = "uploads/";
     
   $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
   
   if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
       echo "success";
   } else{
       echo "fail";
   }
   
   ?>