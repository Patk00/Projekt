<?php
include 'db.php';

$id = $_GET['id'];

if (isset($_POST['upravit'])) {
    $nazov = $_POST['nazov'];
    $zaner = $_POST['zaner'];
    $rok = $_POST['rok'];
    $hodnotenie = $_POST['hodnotenie'];

    $sql = "UPDATE filmy SET nazov='$nazov', zaner='$zaner', rok='$rok', hodnotenie='$hodnotenie' WHERE id=$id";
    mysqli_query($pripojenie, $sql);
    
    header("Location: index.php");
}

$sql = "SELECT * FROM filmy WHERE id=$id";
$vysledok = mysqli_query($pripojenie, $sql);
$film = mysqli_fetch_assoc($vysledok);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upraviť film</title>
</head>
<body>

    <h1>Upraviť film</h1>

    <form method="POST" action="">
        Názov filmu: <br>
        <input type="text" name="nazov" value="<?php echo $film['nazov']; ?>"><br><br>

        Žáner: <br>
        <input type="text" name="zaner" value="<?php echo $film['zaner']; ?>"><br><br>

        Rok vydania: <br>
        <input type="number" name="rok" value="<?php echo $film['rok']; ?>"><br><br>

        Hodnotenie (1-10): <br>
        <input type="number" name="hodnotenie" value="<?php echo $film['hodnotenie']; ?>"><br><br>

        <input type="submit" name="upravit" value="Ulozit zmeny">
    </form>

    <br>
    <a href="index.php">Spat na zoznam</a>

</body>
</html>