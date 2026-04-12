<?php
// Adatbázis adatok - töltsd ki a sajátoddal! [cite: 59]
$host = 'localhost';
$dbname = 'adatbazis_neve'; // [cite: 62]
$user = 'felhasznalonev';   // [cite: 63]
$pass = 'jelszo';           // [cite: 64]

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Kapcsolódási hiba: " . $e->getMessage()]));
}
?>
