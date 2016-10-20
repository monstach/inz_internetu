<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<meta http-equiv="content-type" content="text/html;charset=windows-1250">
<title>Forum</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<center>
<div id="naglowek">


<a href="index.php"> Strona główna </a>
<a href="nowe_konto.php"> Rejestracja </a>
<a href="zaloguj.php"> Zaloguj </a>
<a href="wyloguj.php"> Wyloguj </a>
   

</div>
</center>
</center>
<div id="container">
			<div id="page">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">Rejestracja</a></h2>
							
						</div>
					
					
						
					</div>
					<div class="post">
						
						<div class="entry">
					<?php
          if( !@$_SESSION['zalogowany']){

echo ' <form method="post" action="nowe_k.php"> ';
echo ' <table>';
echo '	<tr>';
echo '	<td>Podaj imię</td><td><input type="text" name="imie" /></td> ';
echo '	</tr>  ';
echo '	<tr>  ';
echo '	<td>Podaj nazwisko</td><td><input type="text" name="nazwisko" /></td> ';
echo '	</tr>';
echo '	<tr> ';
echo '	<td>Podaj login</td><td><input type="text" name="login" maxlength="32" /></td>';
echo '	</tr>';
echo '	<tr>';
echo '	<td>Podaj haslo</td><td><input type="password" name="haslo" maxlength="32" /></td>';
echo '	</tr>';
echo '	<tr>';
echo '	<td></td><td><input type="submit" value="Załóż konto" /></td>';
echo '	</tr>';
echo '</form>';
echo '</table>';
}
else {
echo "<h1 align='center'>Masz już konto</h1>";
}
?>						</div>
						
					</div>
				</div>
				
				<div id="sidebar">
					<ul>
						
						<li>
							<h2><?php
   if (@$_SESSION['zalogowany']){
	$query="SELECT * FROM `uzytkownicy` where `id`={$_SESSION['id_uzytkownika']}";
	$wynik=mysql_query($query);
	$rekord=mysql_fetch_assoc($wynik);
   echo "<span>Witaj:{$rekord['login']}</span>";

   }
   else

    echo "<span>Nie jesteś zalogowany</span>" ?>   </h2>
							<ul>
								
								
							</ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both; height: 40px;">&nbsp;</div>
			</div>
			<div id="stopka">

			
			
		</div>
	</div>
	
</div>



</div>

</body>
</html>
