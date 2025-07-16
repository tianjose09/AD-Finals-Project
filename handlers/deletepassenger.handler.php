<?php
header('Content-Type: application/json');

function connectDB(): PDO {
    $host = 'host.docker.internal';
    $port = '5112';
    $dbname = 'finaldatabase';
    $user = 'user';
    $password = 'password';

    return new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID is required.']);
    exit;
}

try {
    $pdo = connectDB();
    $stmt = $pdo->prepare("DELETE FROM tickets WHERE id = :id");
    $stmt->execute(['id' => $data['id']]);

    echo json_encode(['success' => true, 'message' => 'Passenger deleted successfully.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error deleting passenger.', 'error' => $e->getMessage()]);
}
