<?php
require 'config.php';
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header("login.php");
}


if (isset($_POST['verzend'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $soort = $_POST['soort'];
    $geboortedatum = $_POST['geboortedatum'];
    $geslacht = $_POST['geslacht'];
    $landvanherkomst = $_POST['landvanherkomst'];
    $regio = $_POST['regio'];

    $query = "UPDATE db_dieren";
    $query .= " SET naam = '{$naam}', soort = '{$soort}', geboortedatum = '{$geboortedatum}',";
    $query .= " geslacht = '{$geslacht}', landvanherkomst = '{$landvanherkomst}', regio = '{$regio}'";
    $query .= " WHERE id = {$id}";

    //Voer de query vit en vang het ‘resultaat' op
    $result = mysqli_query($link, $query);
    //controleer of het is gelukt

    if ($result) {
        echo "Het item is aangepast<br/>";
        echo $query . "<br/>";
        header("Location: index.php");
    } else {
        echo "Fout bij aanpassen<br/>";
        echo $query . "<br/>"; //Tijdelijk (!) de query tonen
        echo mysqli_error($link); //Tijdelijk (!) de foutmelding tonen
    }

    //Terug naar het overzicht
    echo "<a href='index.php'>Terug naar</a>";
}
?>