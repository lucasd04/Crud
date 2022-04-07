<?php
require 'config.php';
session_start();



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header("Location: login.php");
}

$id = $_GET['id'];

$query = "SELECT * FROM db_dieren WHERE id = " . $id;

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0)
{
    $item = mysqli_fetch_assoc($result);

    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aanpassen</title>
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
    <form action="verwijder_verwerk.php" method="post">
        <h5 style="text-align: center">Weet je zeker dat je het wilt verwijderen?</h5> <br>
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>"/>
        <button type="submit" name="verzend" class="btn btn-danger btn-block mb-4" >Verwijderen</button>
    </form>
    </div>
    <div class="container">
        <button class="btn btn-primary btn-block mb-4" onclick="window.location.href='index.php'">Terug</button>
    </div>
    </body>
    </html>

    <?php
}
