<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('forum_db');
?>
!
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
<div id="container">
			<div id="page">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">Edycja danych konta</a></h2>
							

						</div>	
<div class="entry">
 <?php
if ($_SESSION['zalogowany']){
 if (@$_SESSION['admin']){
 $query="SELECT * FROM `uzytkownicy` where `id`={$_GET['id_uz']}";
	$query=mysql_query($query);
	$rekord=mysql_fetch_assoc($query);
 } else{
	$query="SELECT * FROM `uzytkownicy` where `id`={$_SESSION['id_uzytkownika']}";
	$query=mysql_query($query);
	$rekord=mysql_fetch_assoc($query);
	}


            echo "
<div style='margin: 100px auto; width: 300px;'>
<table>
<form method='post' action='edytuj_konto1.php'>
        <tr>
	<td>Login</td><td><input type='text' name='imie' disabled value='{$rekord['login']}' /></td>
	</tr>
        <tr>
	<td>Imię</td><td><input type='text' name='imie' value='{$rekord['imie']}' /></td><input type='hidden' name='id_uzytkownika' value='{$rekord['id']}' />
	</tr>
	<tr>
	<td>Nazwisko</td><td><input type='text' name='nazwisko' value='{$rekord['nazwisko']}' /></td>
	</tr>
	<tr>
	<td>Haslo</td><td><input type='password' name='haslo' value='{$rekord['haslo']}' /></td>
	</tr>
	<tr>
	<td></td><td><input type='submit' value='Zatwierdź zmiany' /></td>
	</tr>
</form>
</table>
</div>";
}
?>
						
							
						</div>
					
						
					</div>
					<div class="post">
						
						<div class="entry">
							<p></p>
						</div>
						
					</div>
				</div>
				<!-- end #content -->
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

    echo "<span>Nie jesteś zalogowany</span>" ?> </h2>
							<ul>
									<?php
                                                                if (@$_SESSION['zalogowany']){
                                                    if (@$_SESSION['admin']){
					echo "
                            <a href='pok_posty.php'>Wyswietl forum</a><br>
                            <a href='pok_userow.php'>Wyswietl użytkowników</a><br>";
											
				} else {
				echo "<a href='edytuj.php'>Edytuj konto</a><br>
                        <a href='pok_posty.php'>Wyswietl forum</a><br>";
					
					}
				}
		
				
			?>
								
							</ul>
						</li>
					</ul>
				</div>
				
				
			</div>
			<div id="stopka">

			
			
		</div>
	</div>
	




</div>

</body>
</html>
