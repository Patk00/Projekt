<?php 
include 'db.php'; 

if(isset($_POST['ulozit'])) {
    $n = $_POST['nazov'];
    $z = $_POST['zaner'];
    $r = $_POST['rok'];
    $h = $_POST['hodnotenie'];
    $uid = $_POST['user_id'];

    $sql = "INSERT INTO filmy (pouzivatel_id, nazov, zaner, rok, hodnotenie) VALUES ('$uid', '$n', '$z', '$r', '$h')";
    mysqli_query($pripojenie, $sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Nový záznam</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; color: #333; }
        .form-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.05); width: 100%; max-width: 400px; border: 1px solid #eaeaea; }
        h2 { font-size: 20px; margin-top: 0; margin-bottom: 25px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #666; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.5px; }
        input, select { width: 100%; padding: 10px 12px; margin-bottom: 20px; border: 1px solid #d1d5db; border-radius: 5px; box-sizing: border-box; font-size: 15px; font-family: inherit; transition: border-color 0.2s; }
        input:focus, select:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
        button { width: 100%; padding: 12px; background: #0f172a; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 15px; font-weight: 600; transition: background 0.2s; }
        button:hover { background: #334155; }
        .spat { display: block; text-align: center; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 14px; }
        .spat:hover { color: #0f172a; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Pridať nový záznam</h2>
    <form method="POST">
        <label>Názov filmu</label>
        <input type="text" name="nazov" required>

        <label>Žáner</label>
        <input type="text" name="zaner">

        <label>Rok vydania</label>
        <input type="number" name="rok">

        <label>Hodnotenie (1-10)</label>
        <input type="number" name="hodnotenie" min="1" max="10">
        
        <label>Používateľ</label>
        <select name="user_id">
            <?php
            $users = mysqli_query($pripojenie, "SELECT * FROM pouzivatelia");
            while($u = mysqli_fetch_assoc($users)) {
                echo "<option value='{$u['id']}'>{$u['meno']}</option>";
            }
            ?>
        </select>
        
        <button type="submit" name="ulozit">Uložiť záznam</button>
    </form>
    <a href="index.php" class="spat">Späť na prehľad</a>
</div>

</body>
</html>