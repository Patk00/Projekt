
<?php

$pripojenie = mysqli_connect("localhost", "root", "root", "filmova_aplikacia");

if (!$pripojenie) {
    die("Chyba pripojenia k databaze.");
}

// Nastavenie slovenciny
mysqli_set_charset($pripojenie, "utf8");
?>
