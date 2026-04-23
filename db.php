
<?php
// Pripojenie (server, meno, heslo, databaza)
$pripojenie = mysqli_connect("localhost", "root", "root", "filmova_aplikacia");

// Ak sa nepripoji, vypise chybu a zastavi sa
if (!$pripojenie) {
    die("Chyba pripojenia k databaze.");
}

// Nastavenie slovenciny
mysqli_set_charset($pripojenie, "utf8");
?>