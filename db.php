<?php
$host = 'localhost';
$dbname = 'nbibeadando';
$user = 'nbibeadando';
$pass = 'XN6JPD';

try{
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  die("Hiba: " . $e->getMessage());
}
?>
