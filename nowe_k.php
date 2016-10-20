<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);



$haslo = md5($haslo);


 $test_q="select count('id_uzytkownika') from uzytkownicy where login='$login'";
 $wynik_test=mysql_query($test_q) or die("z³e zapytanie");
 $test=mysql_result($wynik_test,0);

 if($_POST['login'] != ''){
  if($test==0){
      $query="INSERT INTO `uzytkownicy` (`imie`, `nazwisko`,`login`, `haslo`)
	VALUES ('{$_POST['imie']}', '{$_POST['nazwisko']}', '$login', '$haslo')";
	mysql_query($query)
      or die('nie stworzono konta');

      header("Location: index.php");

  }
  else{
      echo "Ten login jest zajety!!! Wybierz inny login.<br>";
      echo"<a href='nowe_konto.php'>POWROT</a><br>";
  }

 }

else{

      header("Location: index.php");

}
 ?>

