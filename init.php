<?php
	echo "Привет о дивный мир <br/>";
	//echo "<br/>";
	
	$db = new mysqli('127.0.0.1', 'root', null, 'test');
	
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
	
	for ($i = 1; $i <= $detect_row ; $i++){  
		
	$res_users = $res_users_n->fetch_row();  //берем строку и по идеи каждый раз новую
	
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
	/*$res_sub = $db->query("SELECT name_sub FROM subscription");
	$res_room = $db->query("SELECT * FROM rooms");
	$res_users->data_seek(0);
	$res_room->data_seek(0);
	$res_sub->data_seek(0);
	
	$sel_id = $db->query("SELECT name FROM users WHERE id_user = 2 ");
	$name_id = $sel_id->fetch_assoc();
	echo $name_id['name'] . "<br/>";
	*/
	//$first = $res_users->fetch_assoc();
	//$first_name = $first['id_user'];
	//INSERT [INTO] card_user(name_user_card) VALUES($row = $
	/*while($row = $res->fetch_assoc()){
		echo "Зовут - " . $row['name'] . "<br/>" ;
	}
	*/
	// собрать таблицу "карта" используя запросы из юзера, тарифа и комнаты
	
	
	
?>