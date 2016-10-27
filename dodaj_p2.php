<?php
session_start();
if (@$_SESSION['zalogowany']){
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');
$czas=date('Y-m-d H:i:s');
$query="INSERT INTO `wpisy` (`typ`, `wpis`, `id_uzytkownika`, `data_wpis`) VALUES ('p','{$_POST['poscik']}' , '{$_SESSION['id_uzytkownika']}', '{$czas}')";
mysql_query($query) or die ("Nie mo¿na dodac");
header("location:pok_posty.php");
}
?>
