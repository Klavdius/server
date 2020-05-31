<?php
session_start();
$test = $_SESSION['name'];
echo "Здравствуйте  $test!! Мы узнали о вас из сессии" . PHP_EOL;



?>