Dokumentácia k projektu: Evidencia filmov

Tento projekt je jednoduchá webová aplikácia postavená na jazyku PHP a databáze MySQL, ktorá slúži na správu zoznamu filmov. Aplikácia umožňuje pridávať nové filmy, zobrazovať ich zoznam, upravovať existujúce údaje a mazať záznamy.

1. Štruktúra databázy
Databáza sa volá filmova_aplikacia a obsahuje dve prepojené tabuľky:

pouzivatelia: Obsahuje zoznam ľudí, ktorí môžu filmy pridávať (základný používateľ je "admin").

filmy: Obsahuje informácie o názve, žánri, roku vydania a hodnotení filmu. Táto tabuľka je prepojená s používateľmi pomocou stĺpca pouzivatel_id.

2. Popis funkčnosti súborov
Projekt je rozdelený do viacerých súborov pre lepšiu prehľadnosť:

db.php: Najdôležitejší súbor, ktorý zabezpečuje pripojenie k MySQL serveru. Ak pripojenie zlyhá, aplikácia vypíše chybu. Ostatné súbory si ho načítavajú pomocou include.

index.php: Hlavná stránka, ktorá z databázy vytiahne všetky filmy a zobrazí ich v prehľadnej tabuľke. Obsahuje aj logiku pre mazanie – ak v adrese deteguje parameter vymazat, spustí SQL príkaz na odstránenie daného filmu.

pridat.php: Obsahuje HTML formulár na zadanie nového filmu. Po odoslaní formulára sa dáta spracujú pomocou metódy POST a uložia do databázy príkazom INSERT INTO.

upravit.php: Funguje podobne ako pridávanie, ale najprv načíta existujúce dáta o filme podľa jeho ID. Po zmene údajov ich prepíše v databáze pomocou príkazu UPDATE.

3. Ako aplikácia funguje (zjednodušene)
Pripojenie: Každý súbor sa najprv spojí s databázou cez db.php.

Komunikácia: PHP posiela SQL príkazy (SELECT, INSERT, UPDATE, DELETE) do databázy cez funkciu mysqli_query.

Zobrazenie: Výsledky z databázy sa premenia na pole v PHP a pomocou cyklu while sa vypíšu do HTML kódu stránky.

Presmerovanie: Po každej akcii (pridanie, úprava, zmazanie) sa používa funkcia header("Location: index.php"), aby sa používateľ vrátil na hlavný zoznam a videl aktuálne zmeny.