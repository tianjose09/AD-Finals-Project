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

try {
    $pdo = connectDB();

    $stmt = $pdo->query("SELECT id, passenger_name, gender, nationality, contact_number, passport_number FROM tickets ORDER BY generated_at DESC");
    $passengers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $passengers
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to load passengers.',
        'error' => $e->getMessage()
    ]);
}
