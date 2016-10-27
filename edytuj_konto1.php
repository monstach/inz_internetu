<?php
session_start();
if ($_SESSION['zalogowany']){
mysql_connect('localhost', 'root', '');
$_POST['haslo'] = md5($_POST['haslo']);
mysql_select_db('forum_db');
	$query="UPDATE `uzytkownicy` SET `imie` = '{$_POST['imie']}', `nazwisko` = '{$_POST['nazwisko']}', `haslo` = '{$_POST['haslo']}' WHERE `id` = {$_POST['id_uzytkownika']}";
	mysql_query($query);
	header("location:index.php");
}
?>
