<?php
// utils/dbSeederPostgresql.util.php

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

// Truncate tables to avoid duplicates
echo "🧹 Truncating tables...\n";
$pdo->exec('
  TRUNCATE TABLE public."bookings",
                  public."tickets",
                  public."users",
                  public."images",
                  public."flights",
                  public."planets"
  RESTART IDENTITY CASCADE
');

// 1. Seed planets and build planet map
$planetStmt = $pdo->prepare("INSERT INTO public.\"planets\" (name, distance_from_earth, planet_img) VALUES (:name, :distance_from_earth, :planet_img) RETURNING id, name");
$planetMap = [];
echo "🚐 Seeding planets...\n";
foreach ($planets as $p) {
  $planetStmt->execute([
    ':name' => $p['name'],
    ':distance_from_earth' => $p['distance_from_earth'],
    ':planet_img' => $p['planet_img'] ?? null,
  ]);
  $result = $planetStmt->fetch(PDO::FETCH_ASSOC);
  $planetMap[$result['name']] = $result['id'];
}

// 2. Seed flights and build flight map
$flightStmt = $pdo->prepare("INSERT INTO public.\"flights\" (planet_id, departure_time, return_time, capacity, price, package_type) VALUES (:planet_id, :departure_time, :return_time, :capacity, :price, :package_type) RETURNING id, package_type");
$flightMap = [];
echo "✈️ Seeding flights...\n";
foreach ($flights as $f) {
  $planetId = $planetMap[$f['planet_name'] ?? 'Mars'] ?? null;
  $flightStmt->execute([
    ':planet_id' => $planetId,
    ':departure_time' => $f['departure_time'],
    ':return_time' => $f['return_time'],
    ':capacity' => $f['capacity'],
    ':price' => $f['price'],
    ':package_type' => $f['package_type'],
  ]);
  $result = $flightStmt->fetch(PDO::FETCH_ASSOC);
  $flightMap[$result['package_type']] = $result['id'];
}

// 3. Seed users and image associations
$userStmt = $pdo->prepare("INSERT INTO public.\"users\" (fullname, password, contact_num, username, role, flight_id) VALUES (:fullname, :password, :contact_num, :username, :role, :flight_id) RETURNING id, username");
$imageStmt = $pdo->prepare("INSERT INTO public.\"images\" (filename, filepath, mimetype, size_bytes) VALUES (:filename, :filepath, :mimetype, :size_bytes) RETURNING id");
$updateUserPassportStmt = $pdo->prepare("UPDATE public.\"users\" SET passport_image_id = :image_id WHERE id = :user_id");

$userMap = [];
echo "🌿 Seeding users and images...\n";
foreach ($users as $u) {
  $flightId = ($u['role'] === 'admin')
    ? $flightMap['Galactic Pass']
    : $flightMap[array_rand($flightMap)];

  $userStmt->execute([
    ':fullname' => $u['fullname'],
    ':password' => password_hash($u['password'], PASSWORD_DEFAULT),
    ':contact_num' => $u['contact_num'],
    ':username' => $u['username'],
    ':role' => $u['role'],
    ':flight_id' => $flightId,
  ]);
  $userResult = $userStmt->fetch(PDO::FETCH_ASSOC);
  $userId = $userResult['id'];
  $userMap[$userResult['username']] = $userId;

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

// 4. Seed bookings
$bookingStmt = $pdo->prepare("INSERT INTO public.\"bookings\" (user_id, flight_id, travel_date, seat_number, ticket_code, status, feedback) VALUES (:user_id, :flight_id, :travel_date, :seat_number, :ticket_code, :status, :feedback) RETURNING id");
$bookingIds = [];
echo "🚊 Seeding bookings...\n";
$flightIds = array_values($flightMap);
$userIds = array_values($userMap);
foreach ($booking as $index => $b) {
  $userId = $userIds[$index % count($userIds)];
  $flightId = $flightIds[$index % count($flightIds)];
  $bookingStmt->execute([
    ':user_id' => $userId,
    ':flight_id' => $flightId,
    ':travel_date' => $b['travel_date'],
    ':seat_number' => $b['seat_number'],
    ':ticket_code' => $b['ticket_code'],
    ':status' => $b['status'],
    ':feedback' => $b['feedback'],
  ]);
  $bookingIds[] = $bookingStmt->fetchColumn();
}

// 5. Seed tickets
$ticketStmt = $pdo->prepare("INSERT INTO public.\"tickets\" (booking_id, flight_id, flight_number, launch_pad, gate, qr_code) VALUES (:booking_id, :flight_id, :flight_number, :launch_pad, :gate, :qr_code)");
echo "🎟️ Seeding tickets...\n";
foreach ($tickets as $i => $t) {
  $bookingId = $bookingIds[$i % count($bookingIds)];
  $flightId = $flightIds[$i % count($flightIds)];
  $ticketStmt->execute([
    ':booking_id' => $bookingId,
    ':flight_id' => $flightId,
    ':flight_number' => $t['flight_number'],
    ':launch_pad' => $t['launch_pad'],
    ':gate' => $t['gate'],
    ':qr_code' => $t['qr_code'],
  ]);
}

echo "✅ PostgreSQL seeding complete!\n";
