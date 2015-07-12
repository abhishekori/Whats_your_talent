<?php
require_once('db.php');
$data= $_FILES['uploaded_file']['name'];
//echo "data";
$eachstr = explode("$",$data);
//echo "each";
 $f_name=$eachstr[0];
 //echo "fname";
 $desc=$eachstr[1];
 //echo "desc";

//$_GET['views'];
//$_GET['likes'];
 $cat=$eachstr[2];
 //echo "cat";
 $email=$eachstr[3];
 $title=$eachstr[4];
 //echo "email";

 $url=rand(0,999999).".mp4";
 //echo "url";
 $file_path = "uploads/";
 //echo "file path";

//$file_path="http://bitsmate.in/videoupload/uploads/".$url;
  $file_path = $file_path . basename( $url);
  //echo "base url";
$conn=db_conn();
//echo "db conn";
/*if($conn!=false)
{
	$sql="INSERT INTO `video` (`name`,`desc`,`cat`,`url`,`email`) VALUES('$f_name','$desc','$cat','$url','$email')";
	
	if($conn->exec($sql))
	{
		if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
       echo "success";
   } else{
       echo "fail";
   }
	}
	
}
*/
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path))
{
	//echo "upload file";
	if($conn!=false)
   {
	   //echo "con false";
	   $sql="INSERT INTO `video` (`name`,`desc`,`cat`,`url`,`email`,`title`) VALUES('$f_name','$desc','$cat','$url','$email','$title')";
	   //echo "sql stmnt";
	   $stmnt=$conn->prepare($sql);
	   //echo "stmnt prepare";
	 if($stmnt->execute())
	{
		//echo "stmnt exe";
		//echo 'Upload and db success';
		
		echo $conn->lastInsertId();
	}else
	{
		//echo "db error";
		echo 'Upload success , DB error';
	}
	
   }else
   {
	   echo 'Connection error';
   }
}else
{
	echo 'Upload error';
}


function upload_thumbnail($conn)
{
	$video_id=$_GET['video_id'];
$video_id=2;
if(!empty($video_id))
{
	echo 'thumb';
	$query="UPDATE `video` SET `thumbnail_img`='AWEOME.PNG' WHERE `id`='$video_id'";
	$stmnt=$conn->prepare($query);
	$stmnt->execute();
}else
{
	echo 'no thumb';
}
}

//upload_thumbnail($conn);
require_once('upload_thumbnail.php');