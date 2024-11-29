<!-- Maak een nieuwe php file genaamd select.php aan.
Connect weer met de database winkel.
Selecteer alle data uit je tabel en print ze netjes in een html table. -->


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


$producten = $pdo->query("SELECT * FROM producten");
$result = $producten->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>Product toevoegen</h1>
    <form action="insert.php" method="post">
        <input type="text" name="product_naam" placeholder="Product naam" required>
        <input type="text" name="prijs_per_stuk" placeholder="Prijs per stuk" required>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required>
        <input type="submit" name="knop" value="Submit">
    </form>
    <h2>Producten</h2>
    <table class="table table-striped">
        <tr>
            <th>Product Code</th>
            <th>Product Naam</th>
            <th>Prijs per stuk</th>
            <th>Omschrijving</th>
        </tr>
        <?php foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['product_code'] . "</td>";
            echo "<td>" . $row['product_naam'] . "</td>";
            echo "<td>" . $row['prijs_per_stuk'] . "</td>";
            echo "<td>" . $row['omschrijving'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>