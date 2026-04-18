<?php
header('Content-Type: application/json; charset=utf-8');
// A tárhelyed adataival töltsd ki! [cite: 59, 60]
$dbh = new PDO('mysql:host=localhost;dbname=nbibeadando', 'nbibeadando', 'XN6JPD',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

$stmt = $dbh->query("SELECT * FROM klub"); // Kezdésnek a klubokat kérjük le
$eredmeny = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($eredmeny);
?>
