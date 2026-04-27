<<<<<<< HEAD
<?php
include 'db.php';

//vymazeme film
if (isset($_GET['vymazat'])) {
    $id = $_GET['vymazat'];
    $sql = "DELETE FROM filmy WHERE id = $id";
    mysqli_query($pripojenie, $sql);
    
    // Obnovime stranku
=======
<?php 
include 'db.php'; 

if(isset($_GET['zmazat'])) {
    $id = $_GET['zmazat'];
    mysqli_query($pripojenie, "DELETE FROM filmy WHERE id = $id");
>>>>>>> 8598022c8399bfcd1a9737c7529d7f850c2c3065
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<<<<<<< HEAD
<html>
<head>
    <title>Moje filmy</title>
</head>
<body>

    <h1>Evidencia filmov</h1>
    
    <a href="pridat.php">Pridať nový film</a>
    <br><br>

    <table border="1" cellpadding="5">
=======
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Evidencia Filmov</title>
    <style>
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .kontajner {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05); /* Veľmi jemný, moderný tieň */
            width: 100%;
            max-width: 900px;
            border: 1px solid #eaeaea;
        }
        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 25px;
            color: #1a1a1a;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }
        
        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 15px; }
        th, td { padding: 15px 12px; text-align: left; border-bottom: 1px solid #f0f0f0; }
        th { 
            color: #666; 
            font-weight: 600; 
            text-transform: uppercase; 
            font-size: 12px; 
            letter-spacing: 0.5px; 
        }
        tr:hover { background-color: #fcfcfc; }

        .btn { 
            display: inline-block; 
            padding: 8px 16px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-size: 14px; 
            font-weight: 500;
            transition: all 0.2s ease; /* Plynulý efekt pri ukázaní myšou */
        }
        .btn-add { background: #0f172a; color: white; margin-bottom: 20px; }
        .btn-add:hover { background: #334155; }
        .btn-sm { padding: 6px 12px; font-size: 13px; margin-right: 5px; }
        .btn-edit { background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; }
        .btn-edit:hover { background: #e2e8f0; }
        .btn-del { background: transparent; color: #ef4444; border: 1px solid #fca5a5; }
        .btn-del:hover { background: #fef2f2; }
    </style>
</head>
<body>

<div class="kontajner">
    <h1>Evidencia filmov</h1>
    <a href="pridat.php" class="btn btn-add">Pridať nový záznam</a>

    <table>
>>>>>>> 8598022c8399bfcd1a9737c7529d7f850c2c3065
        <tr>
            <th>Názov</th>
            <th>Žáner</th>
            <th>Rok</th>
<<<<<<< HEAD
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
=======
            <th>Pridal</th>
            <th>Akcie</th>
        </tr>
        <?php
        $sql = "SELECT filmy.*, pouzivatelia.meno AS autor 
                FROM filmy 
                JOIN pouzivatelia ON filmy.pouzivatel_id = pouzivatelia.id
                ORDER BY filmy.id DESC"; /* Zoradíme od najnovšieho */
        $res = mysqli_query($pripojenie, $sql);
        
        while($r = mysqli_fetch_assoc($res)) {
            echo "<tr>
                    <td><strong>{$r['nazov']}</strong></td>
                    <td>{$r['zaner']}</td>
                    <td>{$r['rok']}</td>
                    <td>{$r['autor']}</td>
                    <td>
                        <a href='upravit.php?id={$r['id']}' class='btn btn-sm btn-edit'>Upraviť</a>
                        <a href='index.php?zmazat={$r['id']}' class='btn btn-sm btn-del' onclick='return confirm(\"Naozaj chcete zmazať tento záznam?\")'>Zmazať</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
>>>>>>> 8598022c8399bfcd1a9737c7529d7f850c2c3065

</body>
</html>