<?php

    session_start();

    if(!isset($_POST['login']) || !isset($_POST['haslo']))
    {
        header('Location: konto.php');
        exit();
    }

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_pass, $db_name);

    if ($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if ($wynik = @$polaczenie->query(
            sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
            mysqli_real_escape_string($polaczenie, $login))))
        {
            $ile_uzytkownikow = $wynik->num_rows;
            if ($ile_uzytkownikow > 0)
            {
                $wiersz = $wynik->fetch_assoc();

                //if (password_verify($haslo, $wiersz['pass']))
                if ($haslo == $wiersz['pass'])
                {
                    $_SESSION['logged'] = true;

                    $_SESSION['id'] = $wiersz['id'];
                    $_SESSION['user'] = $wiersz['user'];
                    $_SESSION['email'] = $wiersz['email'];

                    unset($_SESSION['error']);

                    $wynik->free_result();

                    header('Location: panel.php');
                } 
                else 
                {
                    $_SESSION['error'] = '<span style="color:red">Nieprawidłowe hasło!</span>';
                    header('Location: konto.php');
                } 
            } 
            else 
            {
                $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login!</span>';
                header('Location: konto.php');

            }
        }

        $polaczenie->close();


    }
?>