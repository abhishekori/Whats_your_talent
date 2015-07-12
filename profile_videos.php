<?php
require_once('db.php');

$conn = db_conn();
$email=$_GET['email'];

if($conn!=false)
{
	$myarray=array();
	$sql="SELECT * FROM `video` WHERE `email`='$email'";
	 
	 foreach($conn -> query($sql) as $res)
	 {
		 //echo '<pre>',print_r($res,true),'</pre>';
		 //array_push($myarray, "name" => $res["name"] );
		 
		 $row_array['id']=$res['id'];
		 $row_array['name']=$res['name'];
		 $row_array['uploader_name']=$res['uploader_name'];
		 $row_array['title']=$res['title'];
		 $row_array['desc']=$res['desc'];
		 $row_array['views']=$res['views'];
		 $row_array['cat']=$res['cat'];
		 $row_array['url']=$res['url'];
		 $row_array['thumbnail_img']=$res['thumbnail_img'];
		 $row_array['likes']=$res['likes'];
		 $row_array['email']=$res['email'];
		 
		 //$row_array[]
		 array_push($myarray,$row_array);
		 
	 }
	 
	 echo json_encode($myarray,JSON_FORCE_OBJECT);
}
	

