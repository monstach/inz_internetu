<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');
if ($_SESSION['zalogowany'] == false){
$query="SELECT * FROM `uzytkownicy` where `login`='".$_POST['login']."' AND `haslo`='".$_POST['haslo']."'";
$wynik=mysql_query($query) or die("cos zle");
$rekord=mysql_fetch_assoc($wynik);
if($_POST['login']==$rekord['login'] && $_POST['haslo']==$rekord['haslo'] && $_POST['login']!=NULL) {
$_SESSION['zalogowany']=true;
$_SESSION['id_uzytkownika']=$rekord['id'];
if ($rekord['admin']) $_SESSION['admin']=true;
}
header("location:index.php");
}
?>
