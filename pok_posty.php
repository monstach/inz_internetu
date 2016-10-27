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
						
					

						
					</div>
					<div class="post">
					
						
						<div class="entry">
						<?php
if (@$_SESSION['zalogowany']){
echo "<a href='dodaj_post.php'><h2 align='center'>DODAJ</h2></a>";
   isset($_GET['s']) ? $od = $_GET['s']*6 : $od = 0;
   $query="select * from wpisy where `typ`='p' order by `data_wpis` DESC Limit {$od},6";
   $result=mysql_query($query);
   while ($rekord=mysql_fetch_assoc($result)){
	$zapytanie="select * from uzytkownicy where `id`={$rekord['id_uzytkownika']}";
	$rezultat=mysql_query($zapytanie);
	$autor=mysql_fetch_assoc($rezultat);
    echo "

		
			
		
		";
		echo "<br><hr>";
	echo "<a href='komentarze.php?idwpis={$rekord['id_wpis']}'><div class='post'>".$rekord['wpis']."</div></a>";
				echo "Dodany: ".$rekord['data_wpis']." przez ".$autor['login']."<br />";
				echo "<a href='dodaj_kom.php?idwpis={$rekord['id_wpis']}'>Dodaj komentarz</a> &nbsp;";
			        if (@$_SESSION['admin'])
							echo "<a href='usun_wpis.php?id={$rekord['id_wpis']}'>Usuń</a> ";
							echo"<hr>";
		}
		$query="select count(*) from wpisy where `typ`='p'";
		$query=mysql_query($query);
		$result=ceil(mysql_result($query,0,0)/6);
		echo "<div style='width:150px; margin: 0 auto;'> Strona: ";
		for ($i=0; $i < $result; $i++){
			$strona=$i+1;
			echo "<a href='pok_posty.php?s={$i}'>{$strona}</a>, ";
			}
	}
?>					
						</div>
						
					</div>
				</div>  </div>
				
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
			
				<div style="clear: both; height: 40px;">&nbsp;</div>
			</div>
			<div id="stopka">

			
		
		</div>
	</div>
	
</div>



</div>

</body>
</html>
