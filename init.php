<?php
	echo "Привет о дивный мир <br/>";
	
	/*****************************************************************/
	//прочитать из XML файла данные и использовать их в подключении бд
	/*
	$block = simplexml_load_file('settings.xml');

	//echo $block->DB->HOST;
	
	$myHost = $block->DB->HOST;
	$myName = $block->DB->USERNAME;
	$myPass = $block->DB->PASSWORD;
	$myDB = $block->DB->DB_NAME;
	
	$db = new mysqli($myHost, $myName, $myPass, $myDB);
	*/
	/*************************************************************/
	
	/**********************************************/
	// используем для подключения json
		
		
	$jsData = file_get_contents('conf.json');
	
	$jsArrData = json_decode($jsData , true);
	
	$db = new mysqli($jsArrData["host"] , $jsArrData["name"] , $jsArrData["password"] , $jsArrData["db_name"]);
	/**********************************************/
	if( $db->connect_errno){
		echo "Нет соединения <br/>" . PHP_EOL;
	}else{
		echo "Подключение к БД <br/>" . PHP_EOL;
	}
	
	$res_users_n = $db->query("SELECT * FROM users ORDER BY id_user LIMIT 0,10");
	printf( "Select вернул %d строк <br/>", $res_users_n->num_rows);
	$detect_row = $res_users_n->num_rows;
	echo "<br/>";
	
	//$res_users = $res_users_n->fetch_all();
	
	$fp = fopen('table.csv' , 'w+');
	
	for ($i = 1; $i <= $detect_row ; $i++){  
		
	$res_users = $res_users_n->fetch_row();  //берем строку и по идеи каждый раз новую
	fputcsv($fp , $res_users);
	
	$flag_id = 0;
	foreach( $res_users as $value){
		
		if ($flag_id == 0){
			$flag_id = 1;
		}else{
			echo $value . " " ;
		}
	}
	echo "<br/>";
	$flag_id = 0;
	}
	
	
	
	
	fclose($fp);
	
?>