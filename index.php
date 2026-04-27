<?php
include 'db.php';

//vymazeme film
if (isset($_GET['vymazat'])) {
    $id = $_GET['vymazat'];
    $sql = "DELETE FROM filmy WHERE id = $id";
    mysqli_query($pripojenie, $sql);
    
    // Obnovime stranku
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Moje filmy</title>
</head>
<body>

    <h1>Evidencia filmov</h1>
    
    <a href="pridat.php">Pridať nový film</a>
    <br><br>

    <table border="1" cellpadding="5">
        <tr>
            <th>Názov</th>
            <th>Žáner</th>
            <th>Rok</th>
            <th>Hodnotenie</th>
            <th>Akcie</th>
        </tr>

        <?php
        $sql = "SELECT * FROM filmy";
        $vysledok = mysqli_query($pripojenie, $sql);

        while ($riadok = mysqli_fetch_assoc($vysledok)) {
            echo "<tr>";
            echo "<td>" . $riadok['nazov'] . "</td>";
            echo "<td>" . $riadok['zaner'] . "</td>";
            echo "<td>" . $riadok['rok'] . "</td>";
            echo "<td>" . $riadok['hodnotenie'] . " / 10</td>";
            echo "<td>
                    <a href='upravit.php?id=" . $riadok['id'] . "'>Upravit</a> | 
                    <a href='index.php?vymazat=" . $riadok['id'] . "'>Zmazat</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>