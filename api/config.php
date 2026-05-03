<?php

$host = 'localhost';
$dbname = 'adatbazis_neve'; 
$user = 'felhasznalonev';  
$pass = 'jelszo';           

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Kapcsolódási hiba: " . $e->getMessage()]));
}
?>
