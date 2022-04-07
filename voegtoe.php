<?php
require 'config.php';
session_start();



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header("Location: login.php");
}
?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Toevoegen</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <div class="container">
        <form action="voegtoe_verwerk.php" method="post">
            <div class="row mb-4 mt-3">
                <div class="form-outline mb-4">
                    <label class="form-label" for="naam">Naam</label>
                    <input type="text" name="naam" id="naam" class="form-control"  required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="soort">Soort</label>
                    <input type="text" name="soort" id="soort" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="geboortedatum">Geboortedatum</label>
                    <input type="date" name="geboortedatum" id="geboortedatum" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="geslacht">Geslacht</label>
                    <select class="form-select" name="geslacht" id="geslacht" aria-label="Default select example" required >
                        <option value="m">Man</option>
                        <option value="v">Vrouw</option>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="landvanherkomst">Land van Herkomst</label>
                    <input type="text" name="landvanherkomst" id="landvanherkomst" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="regio">Regio</label>
                    <input type="text" name="regio" id="regio" class="form-control" required/>
                </div>

                <button type="submit" name="verzend" class="btn btn-primary btn-block mb-4">Toevoegen </button>
        </form>
    </div>
    <div class="container">
        <button class="btn btn-danger btn-block mb-8" onclick="window.location.href='index.php'">Terug</button>
    </div>
    </body>
    </html>