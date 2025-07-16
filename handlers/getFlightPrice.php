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
    $stmt = $pdo->prepare("
        SELECT f.price, f.departure_time, f.return_time, 
               f.departure_planet_id, f.arrival_planet_id, 
               p.name AS destination
        FROM flights f
        JOIN planets p ON f.arrival_planet_id = p.id
        WHERE f.id = :flight_id
    ");
    $stmt->execute([':flight_id' => $flightId]);
    $flight = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$flight) {
        throw new Exception('Flight not found');
    }

    echo json_encode([
        'success' => true,
        'price' => $flight['price'],
        'departure_time' => $flight['departure_time'],
        'destination' => $flight['destination']
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
