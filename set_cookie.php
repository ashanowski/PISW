<?php
	$font_size = $_POST["czcionka"];
	$font_color = $_POST["kolor"];
	$background = $_POST["tlo"];

	setcookie("background", $background, time() + 60 * 60);
	setcookie("font_color", $font_color, time() + 60 * 60);
	setcookie("font_size", $font_size, time() + 60 * 60);

	header("Location: konto.php");

?>
