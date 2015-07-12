<?php
require_once('db.php');
$views=25;//$_GET['views'];
$url="342723.mp4";//$_GET['url'];
$name="abhi";
$fb_url="abhi";
$twitter_url="abhi";
$web_url="abhi";
$email="abhikori1994@gmail.com";


$conn=db_conn();

if($conn!=false)
{
	$query="UPDATE `users` SET `name`='$name',`fb_url`='$fb_url',`twitter_url`='$twitter_url',`web_url`='$web_url' WHERE `email`='$email'";
	
	$stmnt=$conn->prepare($query);
	
	$stmnt->execute();
	
	echo 'updates';
}

