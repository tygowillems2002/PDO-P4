<!-- Maak een nieuwe php file genaamd insert.php.
Maak een database connectie in het bestand db.php.
Include je db connectie in insert.php en maak daar een nieuw formulier aan met een POST method.
Voeg 3 input fields in je formulier (product_naam, prijs_per_stuk, omschrijving) en een button.
Schrijf daarna je PHP code zodat er een product wordt toegevoegd in de tabel producten met de gegevens die in het formulier worden ingevuld.
Voeg in totaal 5 verschillende producten toe. -->

<?php
    include 'index.php';
    if (isset($_POST['knop'])) {
        $naam = $_POST['product_naam'];
        $prijs = $_POST['prijs_per_stuk'];
        $omschrijving = $_POST['omschrijving'];

        $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
        $result = $pdo->prepare($sql);
        $placeholder = [
            'product_naam' => $naam,
            'prijs_per_stuk' => $prijs,
            'omschrijving' => $omschrijving
        ];
        $result->execute($placeholder);
        if ($result) {
            echo "Product is toegevoegd";
        } else {
            echo "Product is niet toegevoegd";
        }
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
    <form action="insert.php" method="post">
        <input type="text" name="product_naam" placeholder="Product naam">
        <input type="text" name="prijs_per_stuk" placeholder="Prijs per stuk">
        <input type="text" name="omschrijving" placeholder="Omschrijving">
        <input type="submit" name="knop" value="Submit">
    </form>
</body>
</html>