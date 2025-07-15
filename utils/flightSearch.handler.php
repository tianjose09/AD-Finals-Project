<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/dbConnection.php';

function handleFlightSearch() {
    $response = ['success' => false, 'message' => '', 'flights' => []];

    // Validate required fields
    if (empty($_POST['from']) || empty($_POST['to']) || empty($_POST['date'])) {
        $response['message'] = 'Please fill all required fields';
        echo json_encode($response);
        return;
    }

    $departurePlanet = $_POST['from'];
    $arrivalPlanet = $_POST['to'];
    $departureDate = $_POST['date'];
    $passengerCount = $_POST['passengers'] ?? 1;
    $flightClass = $_POST['class'] ?? 'Economy';

    try {
        $db = getDatabaseConnection();
        
        // Query to find flights between planets on the selected date
        $query = "
            SELECT f.*, p1.name as departure_planet, p2.name as arrival_planet
            FROM flights f
            JOIN planets p1 ON f.departure_planet_id = p1.id
            JOIN planets p2 ON f.arrival_planet_id = p2.id
            WHERE p1.name = :departurePlanet
            AND p2.name = :arrivalPlanet
            AND DATE(f.departure_time) = :departureDate
            AND f.capacity >= :passengerCount
            ORDER BY f.departure_time
        ";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':departurePlanet', $departurePlanet);
        $stmt->bindParam(':arrivalPlanet', $arrivalPlanet);
        $stmt->bindParam(':departureDate', $departureDate);
        $stmt->bindParam(':passengerCount', $passengerCount, PDO::PARAM_INT);
        $stmt->execute();

        $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($flights)) {
            $response['message'] = 'No flights found for your criteria';
        } else {
            // Adjust price based on class
            foreach ($flights as &$flight) {
                $flight['price'] = calculatePriceBasedOnClass($flight['price'], $flightClass);
                $flight['formatted_price'] = '$' . number_format($flight['price'], 2);
                $flight['duration'] = calculateDuration($flight['departure_time'], $flight['return_time']);
            }

            $response['success'] = true;
            $response['flights'] = $flights;
        }
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function calculatePriceBasedOnClass($basePrice, $class) {
    switch ($class) {
        case 'Business Class':
            return $basePrice * 1.5;
        case 'First Class':
            return $basePrice * 2;
        case 'Galactic Luxury':
            return $basePrice * 3;
        default: // Economy
            return $basePrice;
    }
}

function calculateDuration($departure, $arrival) {
    $departure = new DateTime($departure);
    $arrival = new DateTime($arrival);
    $interval = $departure->diff($arrival);
    
    return $interval->format('%hh %im');
}