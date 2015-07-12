<?php

require_once('db.php');

$conn=db_conn();
$user_email="abhikori1994@gmail.com";
$video_id=65;
if($conn!=false)
{
	$query="INSERT INTO `likes` (`user_email`,`video_id`) VALUES('$user_email','$video_id')";
	$stmnt=$conn->prepare($query);
	$stmnt->execute();
	
	echo 'inserted';
}