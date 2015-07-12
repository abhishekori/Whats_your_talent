<?php
require_once('db.php');

$conn=db_conn();

$email_id=$_GET['email_id'];
if($conn!=false)
{
	//echo 'true';
$query="SELECT * FROM `users` WHERE `email`='$email_id'";
$my_arr=array();
foreach($conn->query($query) as $res)
{
	$res_arr['id']=$res['id'];
	$res_arr['name']=$res['name'];
	$res_arr['email']=$res['email'];
	$res_arr['password']=$res['password'];
	$res_arr['profile_pic_url']=$res['profile_pic_url'];
	$res_arr['fb_url']=$res['fb_url'];
	$res_arr['twitter_url']=$res['twitter_url'];
	$res_arr['web_url']=$res['web_url'];
	array_push($my_arr,$res_arr);
	break;
}

 echo json_encode($my_arr,JSON_FORCE_OBJECT);
}
?>