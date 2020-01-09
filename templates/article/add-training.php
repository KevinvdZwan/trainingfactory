
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Training</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-grid.css" rel="stylesheet">
    <link href="../css/bootstrap-reboot.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="show-article-container p-3 mt-4">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="img-fluid" src="\images/trainingfactory.png">
                        <div class="show-article-title-container d-inline-block pl-3 align-middle"><p style="text-align: right; margin-left: 720px; color: red;">Welkom H. Puf<br> - klant - <br> <button type="button" class="btn btn-outline-secondary">uitloggen</button></p>
                            <span class="show-article-title"><h1 style="color: red; font-weight: bold; font-size: 60px;">Training Centrum</span>
                            <br>
                            <br>
                            <span class="align-left article-details"> Den Haag </span></h1>
                        </div>

                        <hr>
                    </div>
                </div>


                <nav class="navbar navbar-expand-lg navbar-bg mb-5">
                    <a style="margin-left: 75px; color: red;" class="navbar-brand space-brand" href="/home">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a style="color: red;" class="nav-link" href="/inschrijvingen">Inschrijven op les</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: red;" class="nav-link" href="/registratie">Lid Worden</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: red;" class="nav-link" href="/contact">Contact</a>
                            </li>
                        </ul>\
                    </div>
                </nav>
                <div class="container">
                    <form method="post" action="">
                        <label>Voornaam</label>
                        <input type="text" class="w50" name="voornaam">
                        <br>

                        <label>Achternaam</label>
                        <input type="text" name="achternaam">
                        <br>

                        <label>Geboortedatum</label>
                        <input type="date" name="geboortedatum">
                        <br>

                        <label>Telefoon-nummer</label>
                        <input type="number" name="telefoonNummer">
                        <br>

                        <label>Verzekerings-nummer</label>
                        <input type="number" name="verzekeringsNummer">
                        <br>

                        <input type="submit" name="verzenden" value="Opslaan">

                    </form>
                    <?php
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
                        if (isset($_POST['verzenden'])) {
                            $voornaam = filter_input(INPUT_POST, "voornaam", FILTER_SANITIZE_STRING);
                            $achternaam = filter_input(INPUT_POST, "achternaam", FILTER_SANITIZE_STRING);
                            $geboortedatum = filter_input(INPUT_POST, "geboortedatum", FILTER_SANITIZE_NUMBER_INT);
                            $telefoonNummer = filter_input(INPUT_POST, "telefoonNummer", FILTER_SANITIZE_NUMBER_INT);
                            $verzekeringsNummer = filter_input(INPUT_POST, "verzekeringsNummer", FILTER_SANITIZE_NUMBER_INT);
                            $query = $db->prepare("INSERT INTO patient(voornaam,achternaam,geboortedatum, telefoonNummer, verzekeringsNummer)
                                                    VALUES (:voornaam, :achternaam, :geboortedatum, :telefoonNummer, :verzekeringsNummer)");
                            $query->bindParam("voornaam", $voornaam);
                            $query->bindParam("achternaam", $achternaam);
                            $query->bindParam("geboortedatum", $geboortedatum);
                            $query->bindParam("telefoonNummer", $telefoonNummer);
                            $query->bindParam("verzekeringsNummer", $verzekeringsNummer);
                            if ($query->execute()) {
                                echo "de nieuwe patient is toegevoegd";
                            } else {
                                echo "er ging iets mis";
                            }
                            echo "<br>";
                        }
                    } catch (PDOException $e) {
                        die("Error!:" . $e->getMessage());
                    }
                    ?>

                </div>
</body>
</html>