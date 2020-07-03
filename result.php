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
echo $myChek . "<br/>";  //получили переменную
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

$cardUser = $db->query("SELECT * FROM card_user WHERE idCardUser = '$myChek ' "); //получили нужную строку
$card = $cardUser->fetch_array(MYSQLI_NUM);

fputcsv($fileOp, $card);
//fputcsv($fileOp, $user[0]);
//fclose($fileOp);
$a = $card[1];
$b = $card[2];
$userName = $mysqlUser->query("SELECT * FORM users WHERE idUser = '$a' ");
$subUser = $mysqlSub->query("SELECT * FROM subscription WHERE idSub = '$b' ");

$fullName = $userName->fetch_array(MYSQLI_NUM);
$subMan = $subUser->fetch_array(MYSQLI_NUM);

printf(" %s %s %s с тарифом %s <br/>",$fullName[1],$fullName[2],$fullName[3],$subMan[1]);

//$goCsv = "$fullName['name'],$fullName['lastName'],$fullName['middleName'],$subMan['nameSub']";
//fptcsv($fileOp, $goCvs);
fclose($fileOp);
//$arrayU = mysql_fetch_array($userName , MSQL_ASSOC);
printf(" %s <br/>", $card['idCardUser']);
?>


