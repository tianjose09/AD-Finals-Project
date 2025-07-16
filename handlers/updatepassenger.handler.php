<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

try {
    $pdo = new PDO("pgsql:host=host.docker.internal;port=5112;dbname=finaldatabase", 'user', 'password');

    $stmt = $pdo->prepare("
        UPDATE tickets
        SET
            passenger_name = :passenger_name,
            gender = :gender,
            contact_number = :contact_number,
            nationality = :nationality,
            passport_number = :passport_number
        WHERE id = :id
    ");

    $success = $stmt->execute([
        ':id' => $data['id'],
        ':passenger_name' => trim($data['passenger_name']),
        ':gender' => $data['gender'],
        ':contact_number' => $data['contact_number'],
        ':nationality' => $data['nationality'],
        ':passport_number' => $data['passport_number'],
    ]);

    echo json_encode(['success' => $success]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
