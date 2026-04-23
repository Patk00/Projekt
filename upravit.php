<?php 
include 'db.php'; 

$id = $_GET['id'];

if (isset($_POST['upravit'])) {
    $n = $_POST['nazov'];
    $z = $_POST['zaner'];
    $r = $_POST['rok'];
    $h = $_POST['hodnotenie'];
    $uid = $_POST['user_id'];

    $sql = "UPDATE filmy SET nazov='$n', zaner='$z', rok='$r', hodnotenie='$h', pouzivatel_id='$uid' WHERE id=$id";
    mysqli_query($pripojenie, $sql);
    header("Location: index.php");
}

$res = mysqli_query($pripojenie, "SELECT * FROM filmy WHERE id=$id");
$film = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Úprava záznamu</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; color: #333; }
        .form-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.05); width: 100%; max-width: 400px; border: 1px solid #eaeaea; }
        h2 { font-size: 20px; margin-top: 0; margin-bottom: 25px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #666; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.5px; }
        input, select { width: 100%; padding: 10px 12px; margin-bottom: 20px; border: 1px solid #d1d5db; border-radius: 5px; box-sizing: border-box; font-size: 15px; font-family: inherit; transition: border-color 0.2s; }
        input:focus, select:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
        button { width: 100%; padding: 12px; background: #2563eb; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 15px; font-weight: 600; transition: background 0.2s; }
        button:hover { background: #1d4ed8; }
        .spat { display: block; text-align: center; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 14px; }
        .spat:hover { color: #0f172a; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Úprava záznamu</h2>
    <form method="POST">
        <label>Názov filmu</label>
        <input type="text" name="nazov" value="<?php echo $film['nazov']; ?>" required>

        <label>Žáner</label>
        <input type="text" name="zaner" value="<?php echo $film['zaner']; ?>">

        <label>Rok vydania</label>
        <input type="number" name="rok" value="<?php echo $film['rok']; ?>">

        <label>Hodnotenie (1-10)</label>
        <input type="number" name="hodnotenie" min="1" max="10" value="<?php echo $film['hodnotenie']; ?>">

        <label>Používateľ</label>
        <select name="user_id">
            <?php
            $users = mysqli_query($pripojenie, "SELECT * FROM pouzivatelia");
            while($u = mysqli_fetch_assoc($users)) {
                $selected = ($u['id'] == $film['pouzivatel_id']) ? "selected" : "";
                echo "<option value='{$u['id']}' $selected>{$u['meno']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="upravit">Uložiť zmeny</button>
    </form>
    <a href="index.php" class="spat">Zrušiť a späť</a>
</div>

</body>
</html>