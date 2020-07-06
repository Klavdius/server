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
//echo $myChek . "<br/>";  //получили переменную
//conect db
/********************************/
	$jsData = file_get_contents('conf.json');
	
	$jsArrData = json_decode($jsData , true);
	
	$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);


if( $db->connect_errno){
		echo "Нет соединения <br/>" . PHP_EOL;
	}else{
		echo "Подключение к БД <br/>" . PHP_EOL;
		echo "<br/>";
	}
/********************************/

$fileOp = fopen('fullStroka.csv' , 'w+');


$cardUser = $db->query("SELECT * FROM cardUser WHERE idCardUser = '$myChek ' "); //получили нужную строку
$card = $cardUser->fetch_array(MYSQLI_NUM);

$tyu = 'ага ага, пошел я на ';
fputcsv($fileOp,array("$card[0]","$card[1]","$card[2]"));

//fputcsv($fileOp, $card);
fputcsv($fileOp,array("$tyu"));
//fputcsv($fileOp, $user[0]);
//fclose($fileOp);


$userName = $db->query("SELECT * FROM users WHERE idUser = '$card[1]' ");
$fullName = $userName->fetch_array(MYSQLI_NUM);

$subUser = $db->query("SELECT * FROM subscription WHERE idSub = '$card[2]' ");
$subMan = $subUser->fetch_array(MYSQLI_NUM);

printf(" %s %s %s с тарифом %s <br/>",$fullName[1],$fullName[2],$fullName[3],$subMan[1]);

fputcsv($fileOp,array("$fullName[1] ","$fullName[2] ","$fullName[3] ", ' с тарифом ', "$subMan[1] "));

fclose($fileOp);


?>


