<?php
require 'config.php';


if (isset($_POST['verzend']))
{
	$naam = $_POST['naam'];
	$soort = $_POST['soort'];
	$geboortedatum = $_POST['geboortedatum'];
	$geslacht = $_POST['geslacht'];
	$landvanherkomst = $_POST['landvanherkomst'];
	$regio = $_POST['regio'];
	
	$query  = "INSERT INTO db_dieren";
	$query .= " (naam, soort, geboortedatum, geslacht, landvanherkomst, regio)";
	$query .= " VALUES ('{$naam}', '{$soort}', '{$geboortedatum}', '{$geslacht}', '{$landvanherkomst}', 						'{$regio}')";
	
	//Voer de query vit en vang het ‘resultaat' op
	$result = mysqli_query($link, $query);
	//controleer of het is gelukt

	if ($result)
	{
	echo "Het item is toegevoegd<br/>";
    header("Location: testindex.php");
	}
	else
	{
		echo "FOUT bij toevoegen<br/>";
		echo $query . "<br/>"; //Tijdelijk (!) de query tonen
		echo mysqli_error($link); //Tijdelijk (!) de foutmelding tonen
	}

	//Terug naar het overzicht
	echo "<a href='index.php'>OVERZICHT</a>";
}

	

 
?>