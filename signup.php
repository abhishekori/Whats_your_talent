<?php
require_once('db.php');
$email=$_GET['email'];
$user_name=$_GET['user_name'];
$fb_url=$_GET['fb'];
$web_url=$_GET['web'];
$twitter_url=$_GET['twitter'];
$profile_pic_url=$_GET['profile_pic_url'];

$conn=db_conn();

if($conn!=false)
{
	$query="INSERT INTO `users` (`email`,`name`,`fb_url`,`twitter_url`,`web_url`,`profile_pic_url`) VALUE('$email','$user_name','$fb_url','$twitter_url','$web_url','$profile_pic_url')";
	
	$stmnt=$conn->prepare($query);
	if($stmnt->execute())
	{
		echo 'profile Created';
	}
	
}
?>