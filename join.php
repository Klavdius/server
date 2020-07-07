<?php

/******/
$jsData = file_get_contents('conf.json');

$jsArrData = json_decode($jsData, true);

$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);
/******/

$joinSelect = $db->query("SELECT * FROM users INNER JOIN subscription using(id)");
$join = $joinSelect->fetch_array(MYSQLI_NUM);


foreach($joinSelect as $turbo){
   foreach ($turbo as $value){
	   echo $value . " ";
   }
   echo "<br/>";
}



?>