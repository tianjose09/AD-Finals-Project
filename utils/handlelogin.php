<?php
// handleLogin.php  (merged version)

/* ---------- DATABASE CONNECTION ---------- */
function connectDB(): PDO
{

    $host     = 'host.docker.internal';
    $port     = '5112';
    $dbname   = 'finaldatabase';
    $user     = 'user';
    $password = 'password';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    return new PDO(
        $dsn,
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

/* ---------- LOGIN HANDLER ---------- */
header('Content-Type: application/json');

// Grab raw JSON and decode
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username'], $data['password'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Username and password are required'
    ]);
    exit;
}

$username = trim($data['username']);
$password = $data['password'];

// Role inference by presence of “#” in username
$isAdmin       = strpos($username, '#') !== false;
$expectedRole  = $isAdmin ? 'admin' : 'client';

try {
    $pdo  = connectDB();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validate credentials
    if (!$user || !password_verify($password, $user['password'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid credentials'
        ]);
        exit;
    }

    // Check that stored role matches inferred role
    if ($user['role'] !== $expectedRole) {
        echo json_encode([
            'success' => false,
            'message' => 'Role mismatch'
        ]);
        exit;
    }

    // Successful login
    echo json_encode([
        'success'  => true,
        'message'  => 'Login successful',
        'role'     => $user['role'],
        'fullname' => $user['fullname'],
        'user_id'  => $user['id']
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'DB Error: ' . $e->getMessage()
    ]);
}
?>
