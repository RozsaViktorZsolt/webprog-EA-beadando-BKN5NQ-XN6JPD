<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    switch($method) {
        case 'GET':
            $stmt = $dbh->query("SELECT * FROM poszt");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;
        case 'POST':
            $stmt = $dbh->prepare("INSERT INTO poszt (id, nev) VALUES (?, ?)");
            $stmt->execute([$input['id'], $input['nev']]);
            echo json_encode(['status' => 'ok']);
            break;
        case 'PUT':
            $stmt = $dbh->prepare("UPDATE poszt SET nev = ? WHERE id = ?");
            $stmt->execute([$input['nev'], $input['id']]);
            echo json_encode(['status' => 'ok']);
            break;
        case 'DELETE':
            $stmt = $dbh->prepare("DELETE FROM poszt WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode(['status' => 'ok']);
            break;
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
