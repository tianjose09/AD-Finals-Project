<?php
header('Content-Type: application/json');

function connectDB(): PDO {
    $host     = 'host.docker.internal';
    $port     = '5112';
    $dbname   = 'finaldatabase';
    $user     = 'user';
    $password = 'password';
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    return new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

try {
    $flightId = $_GET['flight_id'] ?? null;
    if (!$flightId) {
        throw new Exception('Flight ID is required');
    }

    $pdo = connectDB();
    $stmt = $pdo->prepare("SELECT price FROM flights WHERE id = :flight_id");
    $stmt->execute([':flight_id' => $flightId]);
    $flight = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$flight) {
        throw new Exception('Flight not found');
    }

    echo json_encode([
        'success' => true,
        'price' => $flight['price']
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}