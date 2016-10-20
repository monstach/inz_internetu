<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);

$haslo = md5($haslo);

if ($_SESSION['zalogowany'] == false){
$query="SELECT * FROM `uzytkownicy` where `login`='$login' AND `haslo`='$haslo'";
$wynik=mysql_query($query) or die("cos zle");
$rekord=mysql_fetch_assoc($wynik);
if($login==$rekord['login'] && $haslo==$rekord['haslo'] && $login!=NULL) {
$_SESSION['zalogowany']=true;
$_SESSION['id_uzytkownika']=$rekord['id'];
if ($rekord['admin']) $_SESSION['admin']=true;
}
header("location:index.php");
}
?>
