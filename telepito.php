<?php
// Behozzuk a működő adatbázis kapcsolatot
require_once 'db.php';

try {
    // A tábla létrehozó SQL parancs
    $sql = "CREATE TABLE IF NOT EXISTS `poszt` (
      `id` int(11) NOT NULL,
      `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;";

    // Végrehajtjuk a parancsot
    $dbh->exec($sql);
    
    // Siker üzenet
    echo "<h1 style='color: green;'> A 'poszt' tábla sikeresen létrejött a Nethely szerverén!</h1>";
    echo "<p>Most már visszamehetsz a weblapodra, és tesztelheted a Fetch API / Axios menüt.</p>";

} catch (PDOException $e) {
    // Ha valamiért mégis hiba lenne, kiírjuk
    echo "<h1 style='color: red;'>Hiba történt:</h1>";
    echo "<b>" . $e->getMessage() . "</b>";
}
?>
