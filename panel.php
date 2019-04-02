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
			<div id=compare_rockets class="zadanie_dom">
				<h2>Porównywarka rakiet</h2>
				<h3>Wybierz rakiety które chcesz porównać</h3>
				<form method = "post">
					<label>
						<input type="checkbox" name="f9"> Falcon 9
					</label>
					<label>
						<input type="checkbox" name="a5"> Atlas 5
					</label>
					<label>
						<input type="checkbox" name="d4"> Delata IV
					</label>
					<label>
						<input type="checkbox" name="d4h"> Delta IV Heavy
					</label>
					<br>
				
				<h3>Wybierz parametry</h3>
					<label>
						<input type="checkbox" name="LEO"> Niska orbita okołoziemska
					</label>
					<br>
					<label>
						<input type="checkbox" name="GEO"> Orbita geostacjonarna
					</label>
					<br>
					<label>
						<input type="checkbox" name="thrust"> Ciąg przy starcie
					</label>
					<br>
					<input type="submit" value="Porównaj">
				</form>
				<hr>

				<?php
					$selected_rockets = array();
					$all_rockets = array('f9','a5','d4', 'd4h');
					foreach($all_rockets as $rocket)
					{
						if(isset($_POST[$rocket]))
						{
							array_push($selected_rockets,$rocket);
						}
					}
					
					function leoCompare($selected_rockets)
					{
						$rockets_LEO = array('f9'=>array('Falcon 9',22.8), 'a5'=>array('Atlas 5',20.5), 'd4'=>array('Delta IV',11), 'd4h'=>array('Delta IV Heavy',28));
						echo "<h4>Porównanie osiągów na LEO</h4>";
						foreach($selected_rockets as $rocket)
						{
							$temp = $rockets_LEO[$rocket];
							echo "<div class='LEO_compare'>$temp[0] to LEO: $temp[1]t</div>";
							
						}
						echo '<hr>';
					}

					function geoCompare($selected_rockets)
					{
						$rockets_GEO = array('f9'=>array('Falcon 9',8.3), 'a5'=>array('Atlas 5',8.9), 'd4'=>array('Delta IV',4.4), 'd4h'=>array('Delta IV Heavy',14.2));
						echo "<h4>Porównanie osiągów na GEO</h4>";
						foreach($selected_rockets as $rocket)
						{
							$temp = $rockets_GEO[$rocket];
							echo "<div class='LEO_compare'>$temp[0] to GEO: $temp[1]t</div>";
							
						}
						echo '<hr>';
					}
					
					function thrustCompare($selected_rockets)
					{
						//$rockets_thrust = array('f9'=>array('Falcon 9',7606), 'a5'=>array('Atlas 5',8827), 'd4'=>array('Delta IV',3140), 'd4h'=>array('Delta IV Heavy',10000));
						$rockets_thrust = array(array('Falcon 9',7606), array('Atlas 5',8827), array('Delta IV',3140), array('Delta IV Heavy',10000));
						echo "<h4>Porównanie ciągu przy starcie</h4>";
						for($i=0; $i<=count($selected_rockets)-1; $i++)
						{
							$temp = $rockets_thrust[$i];
							echo "<div class='LEO_compare'>$temp[0] ciąg przy starcie: $temp[1]kN</div>";
							
						}
						echo '<hr>';
					}
					if(isset($_POST['LEO']))
					{
						leoCompare($selected_rockets);
					}
					if(isset($_POST['GEO']))
					{
						geoCompare($selected_rockets);
					}
					if(isset($_POST['thrust']))
					{
						thrustCompare($selected_rockets);
					}
				?>

			</div>

			<div id="change_style" class="zadanie_dom">

				<form action="set_cookie.php" method="post">
					<br>
					<label for="zad3_czcionka">Czcionka</label>
					<select name="czcionka" id="zad3_czcionka">
						<option value="18px">Rozmiar: 18 (domyślna)</option>
						<option value="20px">Rozmiar: 20</option>
						<option value="30px">Rozmiar: 30</option>
					</select>
					<br><br>

					<label for="zad3_kolor">Kolor czcionki</label>
					<select name="kolor" id="zad3_kolor">
						<option value="white">Biała (domyślna)</option>
						<option value="red">Czerwona</option>
						<option value="green">Zielona</option>
					</select>
					<br><br>

					<label for="zad3_tlo">Kolor tła</label>
					<select name="tlo" id="zad3_tlo">
						<option value="kosmos">Kosmos (domyślne)</option>
						<option value="black">Czarne</option>
						<option value="white">Białe</option>
					</select>
					<br><br>

					<input type="submit" value="Ustaw">

				</form>
			</div>
		</div>

	<ul>

		<li><a href="wyloguj.php">Wyloguj się</a></li>
		<li><a href="check_cookie.php">Sprawdź ciasteczka</a></li>

	</ul>

    </main>
	<footer>
		<div class="info">
			Wszelkie prawa zastrzeżone &copy; 2019
		</div>
	</footer>
</body>
</html>