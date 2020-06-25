<?php
	echo "Привет о дивный мир <br/>";
	//echo "<br/>";
	
	$db = new mysqli('127.0.0.1', 'root', null, 'test');
	
	if( $db->connect_errno){
		echo "Нет соединения <br/>" . PHP_EOL;
	}else{
		echo "Подключение к БД <br/>" . PHP_EOL;
	}
	
	$res_users = $db->query("SELECT * FROM users");
	printf( "Select вернул %d строк <br/>", $res->num_rows);
	echo "<br/>";
	
	$res_sub = $db->query("SELECT name_sub FROM subscription");
	$res_room = $db->query("SELECT * FROM rooms");
	$res_users->data_seek(0);
	$res_room->data_seek(0);
	$res_sub->data_seek(0);
	
	$first = $res_users->fetch_assoc();
	$first_name = $first['id_user'];
	INSERT [INTO] card_user(name_user_card) VALUES($row = $
	/*while($row = $res->fetch_assoc()){
		echo "Зовут - " . $row['name'] . "<br/>" ;
	}
	*/
	// собрать таблицу "карта" используя запросы из юзера, тарифа и комнаты
	
	
	
?>