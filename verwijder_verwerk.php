<?php
require 'config.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
}
else {
	header("Location: login.php");
}


if (isset($_POST['verzend'])) {
	$id = $_POST['id'];


	$query = "DELETE FROM db_dieren WHERE id =";
	$query .= $id;
//Voer de query vit en vang het ‘resultaat' op
	$result = mysqli_query($link, $query);
//controleer of het is gelukt

	if ($result) {
		echo "Het item is verwijderd<br/>";
		header("Location: index.php");
	} else {
		echo "FOUT bij verwijderen<br/>";
		echo $query . "<br/>"; //Tijdelijk (!) de query tonen
		echo mysqli_error($link); //Tijdelijk (!) de foutmelding tonen
		//Terug naar het overzicht
		echo "<a href='testindex.php'>Terug</a>";
	}

}



?>
