<?php
function connectDB(): PDO
{
    $host     = 'host.docker.internal';
    $port     = '5112';
    $dbname   = 'finaldatabase';
    $user     = 'user';
    $password = 'password';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    return new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['mode']) || !isset($data['destination']) || !isset($data['date']) || !isset($data['time'])) {
    echo json_encode(['success' => false, 'message' => 'Incomplete data']);
    exit;
}

$mode = $data['mode'];
$destination = strtoupper(trim($data['destination']));
$date = $data['date'];
$time = $data['time'];
$datetime = $date . ' ' . $time;

try {
    $pdo = connectDB();

    // Get arrival_planet_id
    $stmt = $pdo->prepare("SELECT id FROM planets WHERE UPPER(name) = :name");
    $stmt->execute([':name' => $destination]);
    $planet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$planet) {
        echo json_encode(['success' => false, 'message' => 'Planet not found']);
        exit;
    }

    $arrival_planet_id = $planet['id'];

    if ($mode === 'create') {
        // Check for duplicate flight
        $check = $pdo->prepare("SELECT * FROM flights WHERE arrival_planet_id = :arrival AND departure_time = :time");
        $check->execute([':arrival' => $arrival_planet_id, ':time' => $datetime]);

        if ($check->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'Flight already exists']);
            exit;
        }

        // Insert new flight
        $stmt = $pdo->prepare("
            INSERT INTO flights (
                departure_planet_id, arrival_planet_id, departure_time,
                return_time, capacity, base_price, flight_number, class
            ) VALUES (
                NULL, :arrival, :time, :return_time, 100, 1000, 
                CONCAT('FL', FLOOR(RANDOM()*10000)::int), 'economy'
            )
        ");
        $stmt->execute([
            ':arrival' => $arrival_planet_id,
            ':time' => $datetime,
            ':return_time' => $datetime // Simplified: return = departure
        ]);
        echo json_encode(['success' => true, 'message' => 'Flight created successfully']);
    }

    else if ($mode === 'delete') {
        $stmt = $pdo->prepare("DELETE FROM flights WHERE arrival_planet_id = :arrival AND departure_time = :time");
        $stmt->execute([':arrival' => $arrival_planet_id, ':time' => $datetime]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Flight deleted']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No matching flight found']);
        }
    }

    else if ($mode === 'update') {
        // You might allow changing return time, base_price, etc.
        $stmt = $pdo->prepare("
            UPDATE flights 
            SET base_price = 9999, updated_at = CURRENT_TIMESTAMP 
            WHERE arrival_planet_id = :arrival AND departure_time = :time
        ");
        $stmt->execute([':arrival' => $arrival_planet_id, ':time' => $datetime]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Flight updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No matching flight to update']);
        }
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
