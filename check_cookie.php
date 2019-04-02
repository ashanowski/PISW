<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header('Location: konto.php');
        exit();
    }

	setcookie("styl", $expire=3600);
?>
<!DOCTYPE html>
<html>
<head lang="pl">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Kármán Line - O blogu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Karman, line, rakiety, blog, kontakt, autorzy, biografia, historia">
    <meta name="description" content="Karman Line - informacje o autorach">
    
	<link href="css/fontello.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.php">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="scripts/info_script.js"></script>

</head>
<body onload="load();">
	<header>
		<div id="logo">
			<h1>Kármán Line</h1>
			<h2>czyli rakietowy blog o rakietowych rakietach</h2>
		</div>
		<nav>
			<ul>
				<li><a href="index.html">Strona główna</a></li>
				<li><a href="info.html">O blogu</a></li>
				<li><a href="linki.html">Linki</a></li>
				<li><a href="konto.php">Konto</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div id="zadania_dom">
			<div id="check_cookie" class="zadanie_dom">
				<p>Ustawione ciasteczka:</p>
				<label>background:<label> 
				<? 
					if (!isset($_COOKIE["background"])){
						print("Nie ustawiono!");
					}
					else print($_COOKIE["background"]);
				?>
				<br>
				<label>font_color:</label>		
				<? 
					if (!isset($_COOKIE["font_color"])){
						print("Nie ustawiono!");
					}
					else print($_COOKIE["font_color"]);
				?>
				<br>
				<label>font_size:</label>
				<? 
					if (!isset($_COOKIE["font_size"])){
						print("Nie ustawiono!");
					}
					else print($_COOKIE["font_size"]);
				?>
			</div>
		</div>
		<ul>
			<li><a href="wyloguj.php">Wyloguj się</a></li>
		</ul>
    </main>
	<footer>
		<div class="info">
			Wszelkie prawa zastrzeżone &copy; 2019
		</div>
	</footer>
</body>
</html>