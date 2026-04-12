<?php
$host = 'localhost';
$dbname = 'adatb';
$user = 'adatbf';
$pass = '****';

try{
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  die("Hiba: " . $e->getMessage());
}
?>
