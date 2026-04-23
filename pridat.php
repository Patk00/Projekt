<?php
include 'db.php';

// Ak sa stlacilo tlacidlo Ulozit
if (isset($_POST['ulozit'])) {
    $nazov = $_POST['nazov'];
    $zaner = $_POST['zaner'];
    $rok = $_POST['rok'];
    $hodnotenie = $_POST['hodnotenie'];

    // Vlozime do databazy (pouzivatel je 1)
    $sql = "INSERT INTO filmy (pouzivatel_id, nazov, zaner, rok, hodnotenie) VALUES (1, '$nazov', '$zaner', '$rok', '$hodnotenie')";
    mysqli_query($pripojenie, $sql);
    
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pridať film</title>
</head>
<body>

    <h1>Pridať film</h1>

    <form method="POST" action="">
        Názov filmu: <br>
        <input type="text" name="nazov"><br><br>

        Žáner: <br>
        <input type="text" name="zaner"><br><br>

        Rok vydania: <br>
        <input type="number" name="rok"><br><br>

        Hodnotenie (1-10): <br>
        <input type="number" name="hodnotenie"><br><br>

        <input type="submit" name="ulozit" value="Ulozit film">
    </form>

    <br>
    <a href="index.php">Spat na zoznam</a>

</body>
</html>