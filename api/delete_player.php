<?php
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? null;

if ($id) {
    $dbh = new PDO(
        'mysql:host=localhost;dbname=adatbazis',
        'felhasznalo',
        'jelszo',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $stmt = $dbh->prepare("DELETE FROM players WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
?>
