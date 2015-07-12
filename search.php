<?php
require_once('db.php');

$conn=db_conn();
$search_key=$_GET['key'];

if(!empty($search_key))
{
//	echo 'entered';
$my_array=array();
if($conn!=false)
{
	$query="SELECT * FROM `video` WHERE `desc` LIKE '%$search_key%' OR `title` LIKE '%$search_key%'";
	
	foreach($conn->query($query) as $res)
	{
		 $row_array['id']=$res['id'];
		 $row_array['name']=$res['name'];
		 $row_array['uploader_name']=$res['uploader_name'];
		 $row_array['title']=$res['title'];
		 $row_array['desc']=$res['desc'];
		 $row_array['views']=$res['views'];
		 $row_array['cat']=$res['cat'];
		 $row_array['url']=$res['url'];
		 $row_array['likes']=$res['likes'];
		 $row_array['email']=$res['email'];
		 
		  array_push($my_array,$row_array);
	   	
	}
	
	echo json_encode($my_array,JSON_FORCE_OBJECT);
	
}
}else
{
	echo 'No keyword passed';
}