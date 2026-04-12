<?php
header('Content-Type: application/json');
include 'config.php';

try {
    // Lekérjük a labdarúgókat és a klubjuk nevét is összekapcsolva
    $sql = "SELECT l.id, l.vezeteknev, l.utonev, k.csapatnev, p.nev as poszt 
            FROM labdarugo l
            LEFT JOIN klub k ON l.klubid = k.id
            LEFT JOIN poszt p ON l.posztid = p.id";
    
    $stmt = $dbh->query($sql);
    $players = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($players);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
