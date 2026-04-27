
<?php
<<<<<<< HEAD
// Pripojenie 
$pripojenie = mysqli_connect("localhost", "root", "root", "filmova_aplikacia");

// Ak sa nepripoji, vypise chybu a zastavi sa
=======

$pripojenie = mysqli_connect("localhost", "root", "root", "filmova_aplikacia");


>>>>>>> 8598022c8399bfcd1a9737c7529d7f850c2c3065
if (!$pripojenie) {
    die("Chyba pripojenia k databaze.");
}

<<<<<<< HEAD
// Nastavenie slovenciny
=======
// aby spravne fungovala slovencina
>>>>>>> 8598022c8399bfcd1a9737c7529d7f850c2c3065
mysqli_set_charset($pripojenie, "utf8");
?>