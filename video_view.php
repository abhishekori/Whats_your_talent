<?php
require_once('db.php');

$conn= db_conn();
$video_id=$_GET['v_id'];
$url=$_GET['url'];
$email=$_GET['mail'];
if($conn!=false)
{
	$my_array=array();
	$query="SELECT * FROM `video` WHERE `url`='$url'";
	foreach($conn->query($query) as $res)
	{
	 //print_r($res);
	//$row_array['id']=$res['id'];
		// $row_array['name']=$res['name'];
		 //$row_array['uploader_name']=$res['uploader_name'];
		 //$row_array['title']=$res['title'];
		 //$row_array['desc']=$res['desc'];
		 //$row_array['views']=$res['views'];
		 //$row_array['cat']=$res['cat'];
		 //$row_array['url']=$res['url'];
		 //$row_array['thumbnail_img']=$res['thumbnail_img'];
		 //$row_array['likes']=$res['likes'];
		 //$row_array['email']=$res['email'];
	  //array_push($my_array,$row_array);
	}
	
	$query="SELECT COUNT(id) FROM `likes` WHERE `user_email`='$email' AND `video_id`='$url'";
	
	$stmnt=$conn->prepare($query); 
	$stmnt->execute();
	$row=$stmnt->fetch();
	if($row[0]>0)
	{
		echo '1';
		// array_push($my_array,$row_array);
	}else
	{
		echo 0;
	//	$row_array['like_status']=0;
		 //array_push($my_array,$row_array);
	}
	//echo $row->rowCount()."<br><br>";
	
	
	//echo json_encode($my_array);
	
}
?>