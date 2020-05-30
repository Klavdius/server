

<?php


$login = "mount";
$password = "vulkan";

if($_POST['login']== $login && $_POST['password']== $password){
    echo $login . PHP_EOL;
}else{
    echo "anon" . PHP_EOL;
    echo "Не верный пароль" . PHP_EOL;
}
?>

<!DOCTYPE html>
<form action="/" method="post">
    <input name="login" type="text">
    <input name="password" type="text">
    <input name="cmd" value="отправить" type="submit">
</form>








