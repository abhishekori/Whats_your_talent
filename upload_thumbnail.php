<?php
//echo '1 ';
require_once('db.php');
//echo 'require ';
echo $base=$_REQUEST['image'];
echo $ImageName=$_REQUEST['ImageName'];
//echo 'ImageName ';
echo $vid_id=$_REQUEST['VideoId'];
//echo 'vid_id ';
if(empty($vid_id))
{
	echo 'Video Id is empty';
}
//echo 'if stmnt';
//$binary=base64_decode($base);
function saveImage($base){
	echo 'save fn enter';
    define('UPLOAD_DIR', 'thumbnail/');
	echo 'define ';
    //$base = str_replace('data:image/jpeg;base64,', '', $base);
    $data = base64_decode($base);
	echo 'img decoded ';
	$img_url_name=rand(0,99999).".jpg";
	echo 'rand fn ';
    $file = UPLOAD_DIR . $img_url_name;
	echo 'full url';
    if(file_put_contents($file, $data))
	{
		echo 'put contents in server ';
	 $conn=db_conn();
	 if($conn!=false)
	 {
		 echo '3rd if ';
		 //echo 'connection success';
		 
		 $query="UPDATE `video` SET `thumbnail_img`='$img_url_name' WHERE `id`='$vid_id'";
		 echo 'Query ';
		 $stmnt=$conn->prepare($query);
		 echo 'Query prepare';
		 if($stmnt->execute())
		 {
			 echo 'Query execute';
			 echo 'updated';
		 }else
		 {
			 echo 'sql error';
		 }
		 
	 }else
	 {
		 echo 'conn error';
	 }
	}
}

saveImage($base);
echo 'save img called ';
//$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
//$dir="thumbnail/54.jpg";
//echo $base64img;
// file_put_contents($dir, $binary);
// echo 'done';
?>