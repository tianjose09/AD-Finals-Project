<?php
declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';
$planets = require_once DUMMIES_PATH . '/planets.staticData.php';
$flights = require_once DUMMIES_PATH . '/flights.staticData.php';
$booking = require_once DUMMIES_PATH . '/booking.staticData.php';
$tickets = require_once DUMMIES_PATH . '/tickets.staticData.php';

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL via PDO\n";

echo "🌱 Seeding users and images…\n";

$userStmt = $pdo->prepare("
  INSERT INTO public.\"users\" (
    fullname,
    password,
    contact_num,
    username,
    role,
    flight_id
  ) VALUES (
    :fullname,
    :password,
    :contact_num,
    :username,
    :role,
    :flight_id
  ) RETURNING id
");

$imageStmt = $pdo->prepare("
  INSERT INTO public.\"images\" (
    filename,
    filepath,
    mimetype,
    size_bytes
  ) VALUES (
    :filename,
    :filepath,
    :mimetype,
    :size_bytes
  ) RETURNING id
");

$updateUserPassportStmt = $pdo->prepare("
  UPDATE public.\"users\" SET passport_image_id = :image_id WHERE id = :user_id
");

foreach ($users as $u) {
  $userStmt->execute([
    ':fullname' => $u['fullname'],
    ':password' => password_hash($u['password'], PASSWORD_DEFAULT),
    ':contact_num' => $u['contact_num'],
    ':username' => $u['username'],
    ':role' => $u['role'],
    ':flight_id' => $u['flight_id'],
  ]);
  $userId = $userStmt->fetchColumn();

  $passport = $u['passport_image'];
  $imageStmt->execute([
    ':filename' => $passport['filename'],
    ':filepath' => $passport['filepath'],
    ':mimetype' => $passport['mimetype'],
    ':size_bytes' => $passport['size_bytes'],
  ]);
  $imageId = $imageStmt->fetchColumn();

  $updateUserPassportStmt->execute([
    ':image_id' => $imageId,
    ':user_id' => $userId,
  ]);
}

$planetStmt = $pdo->prepare("
  INSERT INTO public.\"planets\" (
    name,
    distance_from_earth,
    planet_img
  ) VALUES (
    :name,
    :distance_from_earth,
    :planet_img
  )
");

foreach ($planets as $p) {
  $planetStmt->bindValue(':name', $p['name']);
  $planetStmt->bindValue(':distance_from_earth', $p['distance_from_earth']);
  $planetStmt->bindValue(':planet_img', $p['planet_img'], PDO::PARAM_LOB);
  $planetStmt->execute();
}

$flightStmt = $pdo->prepare("
  INSERT INTO public.\"flights\" (
    departure_time,
    return_time,
    capacity,
    price,
    package_type
  ) VALUES (
    :departure_time,
    :return_time,
    :capacity,
    :price,
    :package_type
  )
");

foreach ($flights as $f) {
  $flightStmt->execute([
    ':departure_time' => $f['departure_time'],
    ':return_time' => $f['return_time'],
    ':capacity' => $f['capacity'],
    ':price' => $f['price'],
    ':package_type' => $f['package_type'],
  ]);
}

$bookingStmt = $pdo->prepare("
  INSERT INTO public.\"bookings\" (
    travel_date,
    seat_number,
    ticket_code,
    status,
    feedback
  ) VALUES (
    :travel_date,
    :seat_number,
    :ticket_code,
    :status,
    :feedback
  )
");

foreach ($booking as $b) {
  $bookingStmt->execute([
    ':travel_date' => $b['travel_date'],
    ':seat_number' => $b['seat_number'],
    ':ticket_code' => $b['ticket_code'],
    ':status' => $b['status'],
    ':feedback' => $b['feedback'],
  ]);
}

$ticketStmt = $pdo->prepare("
  INSERT INTO public.\"tickets\" (
    flight_number,
    launch_pad,
    gate,
    qr_code
  ) VALUES (
    :flight_number,
    :launch_pad,
    :gate,
    :qr_code
  )
");

foreach ($tickets as $t) {
  $ticketStmt->execute([
    ':flight_number' => $t['flight_number'],
    ':launch_pad' => $t['launch_pad'],
    ':gate' => $t['gate'],
    ':qr_code' => $t['qr_code'],
  ]);
}

echo "✅ PostgreSQL seeding complete!\n";
