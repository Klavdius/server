<?php

echo "Персональные данные пользователя <br/>";
echo "Запрашиваемыйй номер <br/>";
$myChek = htmlentities ($_POST['chek']);
/*if ($myChek == 1){
	 echo "вы ввели один <br/>";
} else{
	 echo "Вы ввели не один <br/>";
}
*/
echo $myChek . "<br/>";
//conect db
/********************************/
	$jsData = file_get_contents('conf.json');
	
	$jsArrData = json_decode($jsData , true);
	
	$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);


if( $db->connect_errno){
		echo "Нет соединения <br/>" . PHP_EOL;
	}else{
		echo "Подключение к БД <br/>" . PHP_EOL;
	}
/********************************/

$fileOp = fopen('fullStroka.csv' , 'w+');

$userName = $db->query("SELECT * FROM users WHERE id_user = '$myChek ' ");
$user = $userName->fetch_row();
fputcsv($fileOp, $user);
fclose($fileOp);

$arrayU = mysql_fetch_array($userName , MSQL_ASSOC);
echo $arrayU['name'];
?>
