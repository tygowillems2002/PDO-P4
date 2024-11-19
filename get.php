<?php
if(isset($_GET['knop'])) {
    $naam = $_GET['naam'];
    $achternaam = $_GET['achternaam'];
    $leeftijd = $_GET['leeftijd'];
    $adres = $_GET['adres'];
    $email = $_GET['email'];

    echo $naam . "<br>" . $achternaam . "<br>" . $leeftijd . "<br>" . $adres . "<br>" . $email;
    // Het verschil tussen POST en GET is dat GET de data in de URL zet en POST in de body van de request.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="naam" placeholder="Naam" required> <br>
        <input type="text" name="achternaam" placeholder="Achternaam" required> <br>
        <input type="number" name="leeftijd" placeholder="Leeftijd" required> <br>
        <input type="text" name="adres" placeholder="Adres" required> <br>
        <input type="email" name="email" placeholder="Email" required> <br>
        <input type="submit" name="knop" value="Verstuur">
    </form>
</body>
</html>