

<?php
ob_start();
session_start();

$login = "mount";
$password = "vulkan";
if($_POST != null) {
    if ($_POST['login'] == $login && $_POST['password'] == $password) {
        //echo $login . PHP_EOL;
        echo $_POST['login'] . PHP_EOL;
    } else {
        echo "Не верный пароль" . PHP_EOL;
    }
}else{
    echo "Добро пожаловать, Гость" . PHP_EOL;
}

ob_flush();
?>

<!DOCTYPE html>
<form action="/" method="post">
    <input name="login" type="text">
    <input name="password" type="text">
    <input name="cmd" value="отправить" type="submit">
</form>








