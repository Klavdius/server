<?php

/******/
$jsData = file_get_contents('conf.json');

$jsArrData = json_decode($jsData, true);

$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);
/******/

//$joinSelect = $db->query("SELECT * FROM users INNER JOIN subscription using(id)");
$joinSelect = $db->query("SELECT * FROM carduser"); 
//LEFT JOIN users ON(name) WHERE users.id = carduser.nameUserCard LEFT JOIN subscription ON(nameSub) 
//WHERE carduser.subCard = subscription.id  ");
$join = $joinSelect->fetch_array(MYSQLI_NUM);


foreach($joinSelect as $turbo){
   foreach ($turbo as $value){
	   echo $value . " ";
   }
   echo "<br/>";
}



?>