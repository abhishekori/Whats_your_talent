<?php
  // Array
  /*$someArray = array("actors"=>array("name"=>"bradpit","description"=>"William Bradley 'Brad' Pitt is an American actor and film producer. He has received a Golden Globe Award, a Screen Actors Guild Award, and three Academy Award nominations in acting categories","dob"=>"December 18, 1963","country"=>"United States","height"=>"1.80 m","spouse"=>"Jennifer Aniston","children"=>"Shiloh Nouvel Jolie-Pitt, Maddox Chivan Jolie-Pitt","image"=>"http://microblogging.wingnity.com/JSONParsingTutorial/brad.jpg"));*/
  
require_once('db.php');

/*  
$someArray = array("1"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"2"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"3"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"4"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"5"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"6"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"7"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"8"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"9"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"),"10"=>array("username"=>"abhi","title"=>"this is My dance","description"=>"blah blah and much more blah blah blah and much more blah blah blah and much more blah","views"=>"16523","imgurl"=>"So_Oregon_Spartans_logo.png","category"=>"bollywood"));
*/  
  
  
 
  

  // Convert Array to JSON String
  $someJSON = json_encode($someArray,JSON_FORCE_OBJECT);
  //echo $someJSON;
  
  //echo "<br><br><br>";


//echo '<br><br>';  
  $arr = array(
    array(
        "region" => "valore",
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    )
);

//echo json_encode($arr);

$conn=db_conn();

if($conn!=false)
{
	$myarray=array();
	$sql="SELECT * FROM `video`";
	 
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

?>