<?php
require "config.php";
session_start();

//Maak de query
$query = "SELECT * FROM db_dieren";

//Voer de query uit, en vang het resultaat op
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0)
{
    //maak tabel
    echo "<table class='table'>";
    //eerst de headers van de tabel
    echo "<thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Naam</th>
                <th scope='col'>Soort</th>
                <th scope='col'>Geboortedatum</th>
                <th scope='col'>Geslacht</th>
                <th scope='col'>Land van herkomst</th>
                <th scope='col'>Regio</th>
            </tr>
           </thead>
";
    //zolang er items vit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result))
    {
        //Toon de gegevens van het item
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['naam'] . "</td>";
        echo "<td>" . $item['soort'] . "</td>";
        echo "<td>" . $item['geboortedatum'] . "</td>";
        echo "<td>" . $item['geslacht'] . "</td>";
        echo "<td>" . $item['landvanherkomst'] . "</td>";
        echo "<td>" . $item['regio'] . "</td>";
        echo "<td>" . "<button type='submit' class='btn btn-danger mr-2' onclick=window.location.href='verwijder.php?id=" . $item['id'] . "'>Verwijder</button>";
        echo "<td>" . "<button type='submit' class='btn btn-primary mr-2' onclick=window.location.href='pasaan.php?id=" . $item['id'] . "'>Aanpassen</button>";
        echo "<tr>";
    }
}
//Als er geen records zijn...
else
{
    echo "<p>Geen items gevonden!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark text-light sticky-top">
        <li>
            <button type='submit' class='btn btn-success mr-2' onclick=window.location.href='voegtoe.php' >Nieuwe item toevoegen</button>
        </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo "<form method='get' action='https://86595.ict-lab.nl/crud/logout.php'>
                                <button type='submit' class='btn btn-secondary mr-2'>Logout</button>";
                    
                    } else {
                        echo "<form method='get' action='https://86595.ict-lab.nl/crud/login.php'>
                            <button type='submit' class='btn btn-secondary mr-2'>Login</button>";}?>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->

</body>
</html>
