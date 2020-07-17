<?php

/******/
$jsData = file_get_contents('conf.json');

$jsArrData = json_decode($jsData, true);

$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);
/******/

//$joinSelect = $db->query("SELECT * FROM users INNER JOIN subscription using(id)");
$joinSelect = $db->query("SELECT us.*, sub.* FROM users as us, subscription as sub, carduser as cu
WHERE cu.idCardUser = us.id");
//LEFT JOIN cu.nameUserCard = us.id
//LEFT JOIN sub.id = cu.subCard
//WHERE cu.idCardUser "); 
$join = $joinSelect->fetch_array(MYSQLI_NUM);


foreach($joinSelect as $turbo){
   foreach ($turbo as $value){
	   echo $value . " ";
   }
   echo "<br/>";
}



?>