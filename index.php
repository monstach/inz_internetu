﻿<?php
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
							<h2><a href="#">Witamy na forum!!!</a></h2>
							
						</div>
						
						
					</div>
					<div class="post">
						
						<div class="entry">
							<p></p>
						</div>
						
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
							<?php
                                                                if (@$_SESSION['zalogowany']){
                                                    if (@$_SESSION['admin']){
					echo "
                           
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
