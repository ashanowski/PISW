<?php
    session_start();

    if ( isset($_POST['email']))
    {
        $valid = true;

        $nick = $_POST['nick'];

        //if ( (strlen($nick)) <3 || (strlen($nick) > 20))
        $pattern = "/^[a-z0-9_-]{3,15}$/";

        $reg_match = preg_match($pattern, $nick);

        if (!$reg_match)
        {
            $valid = false;
            $_SESSION['e_nick'] = 'Nick musi posiadać od 3 do 15 znaków';
        }

        $email = $_POST['email'];
        $email_filtered = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ( ($email != $email_filtered) || (filter_var($email_filtered, FILTER_VALIDATE_EMAIL)) == false ){
            $valid = false;
            $_SESSION['e_email'] = 'Podaj poprawny adres e-mail';

        }

        $pass1 = $_POST['haslo1'];
        $pass2 = $_POST['haslo2'];

        if ( strlen($pass1) < 8 || strlen($pass1 > 20) ){
            $valid = false;
            $_SESSION['e_pass'] = 'Hasło musi mieć od 8 do 20 znaków';

        }

        if ( $pass1 != $pass2){
            $valid = false;
            $_SESSION['e_pass'] = 'Hasła muszą być identyczne!';

        }

        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

        if (!isset($_POST['regulamin']))
        {
            $valid = false;
            $_SESSION['e_regulamin'] = 'Nie zaakceptowano regulaminu';
        }


        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {

            $connection = new mysqli($host, $db_user, $db_pass, $db_name);
            if ($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result = $connection->query("SELECT id FROM uzytkownicy WHERE email='$email'");

                if (!$result) throw new Exception($connection->error);

                $mail_num = $result->num_rows;

                if ($mail_num > 0)
                {
                    $valid = false;
                    $_SESSION['e_email'] = 'Istnieje już konto z tym adresem e-mail!';
                }

                $result = $connection->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

                if (!$result) throw new Exception($connection->error);

                $nick_num = $result->num_rows;

                if ($nick_num > 0)
                {
                    $valid = false;
                    $_SESSION['e_nick'] = 'Istnieje już gracz z takim nickiem!';
                }

                if ($valid){
                    //dodanie do bazy

                    if ($connection->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$pass_hash', '$email')"))
                    {
                        $_SESSION['register_success'] = true;
                        header('Location: greeter.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);

                    }
                }

                $connection->close();
            }
        } catch (Exception $e) {
            echo '<span style="color:red">Błąd serwera! Rejestracja chwilowo niedostępna.</span>';
            echo '<br>Informacja developerska: '.$e;
        }

    }
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

    <style>
        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    
    </style>

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
		<form method="post">
			Nickname: <br> <input type="text" name="nick"> <br>

			<?php
				if(isset($_SESSION['e_nick'])){
					echo "<div class='error'>".$_SESSION['e_nick']."</div>";
					unset($_SESSION['e_nick']);
				}

			?>
			E-mail: <br> <input type="text" name="email"> <br>
			<?php
				if(isset($_SESSION['e_email'])){
					echo "<div class='error'>".$_SESSION['e_email']."</div>";
					unset($_SESSION['e_email']);
				}

			?>
			Hasło: <br> <input type="password" name="haslo1"> <br>
			<?php
				if(isset($_SESSION['e_pass'])){
					echo "<div class='error'>".$_SESSION['e_pass']."</div>";
					unset($_SESSION['e_pass']);
				}

			?>
			Powtórz hasło: <br> <input type="password" name="haslo2"> <br>
			<label>
				<input type="checkbox" name="regulamin"> Akceptuję regulamin
			</label>
			<?php
				if(isset($_SESSION['e_regulamin'])){
					echo "<div class='error'>".$_SESSION['e_regulamin']."</div>";
					unset($_SESSION['e_regulamin']);
				}

			?>
			<br>
			<input type="submit" value="Zarejestruj się">
		</form>

    </main>
	<footer>
		<div class="info">
			Wszelkie prawa zastrzeżone &copy; 2019
		</div>
	</footer>
</body>
</html>