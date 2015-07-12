<?php
require_once('db.php');
$likes=$_GET['likes'];
$url=$_GET['url'];


$conn=db_conn();

if($conn!=false)
{
	$query="UPDATE `video` SET `likes`='$likes' WHERE `url`='$url'";
	
	$stmnt=$conn->prepare($query);
	
	$stmnt->execute();
	
	echo 'updates';
}

