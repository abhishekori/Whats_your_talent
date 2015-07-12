<?php
require_once('db.php');
$views=$_GET['views'];
$url=$_GET['url'];


$conn=db_conn();

if($conn!=false)
{
	$query="UPDATE `video` SET `views`='$views' WHERE `url`='$url'";
	
	$stmnt=$conn->prepare($query);
	
	$stmnt->execute();
	
	echo 'updates';
}

