<?php

	 function  db_conn()
	{
     $servername = "localhost";
     $username = "root";
     $password = "linuxshark";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=talent", $username, $password);
      // set the PDO error mode to exception
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
       //echo "Connected successfully";
	   //$status=true; 
	   return $conn;
     }
     catch(PDOException $e)
     {
     //echo "Connection failed: " . $e->getMessage();
	 //$status=false;
	 return false;
      }
	}
	
