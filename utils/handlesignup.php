<?php
/* ---------- DATABASE CONNECTION ---------- */
function connectDB(): PDO
{
    $host     = 'host.docker.internal';   // container / host name
    $port     = '5112';
    $dbname   = 'finaldatabase';
    $user     = 'user';
    $password = 'password';     // change to real creds

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    return new PDO(
        $dsn,
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

/* ---------- SIGN‑UP HANDLER ---------- */
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$required = ['fullname', 'username', 'password', 'contact'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        echo json_encode(['success' => false, 'message' => ucfirst($field) . ' is required']);
        exit;
    }
}

$fullname = trim($data['fullname']);
$username = trim($data['username']);
$password = $data['password'];
$contact  = trim($data['contact']);

// Determine role by presence of “#”
$isAdmin = strpos($username, '#') !== false;
$role    = $isAdmin ? 'admin' : 'client';

// Optional: block “#” in client signup to prevent mistakes
if (!$isAdmin && strpos($username, '#') !== false) {
    echo json_encode(['success' => false, 'message' => 'Client usernames cannot contain “#”']);
    exit;
}

try {
    $pdo = connectDB();

    // Insert user
    $stmt = $pdo->prepare(
        'INSERT INTO users (fullname, password, contact_num, username, role)
         VALUES (:fullname, :password, :contact, :username, :role)'
    );

    $stmt->execute([
        'fullname' => $fullname,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'contact'  => $contact ?: null,
        'username' => $username,
        'role'     => $role
    ]);

    echo json_encode(['success' => true, 'message' => 'Account created! Please log in.']);

} catch (PDOException $e) {

    // Handle UNIQUE constraint errors nicely
    if ($e->getCode() === '23505') { // PostgreSQL unique_violation
        $field = str_contains($e->getMessage(), 'users_fullname_key') ? 'Full name'
               : (str_contains($e->getMessage(), 'users_username_key') ? 'Username' : 'Value');
        echo json_encode(['success' => false, 'message' => "$field already exists"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
    }
}
