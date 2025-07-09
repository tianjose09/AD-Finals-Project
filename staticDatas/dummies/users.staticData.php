<?php

function loadImageOrFail(string $filename): string {
  $path = IMAGES_PATH . '/' . $filename;

  if (!file_exists($path)) {
    throw new RuntimeException("❌ Image file not found: $path");
  }

  return file_get_contents($path);
}

return [
  [
    'fullname' => 'John Doe',
    'password' => 'Admin@123',
    'contact_num' => '09171234567',
    'username' => 'kirkgt',
    'role' => 'admin',
    'passport_img' => loadImageOrFail('kirk.jpg'),
    'flight_id' => null,
  ],
  [
    'fullname' => 'Tony Smith',
    'password' => 'Tonysmith@123',
    'contact_num' => '09180001111',
    'username' => 'tony',
    'role' => 'client',
    'passport_img' => loadImageOrFail('tony.jpg'),
    'flight_id' => null,
  ],
  [
    'fullname' => 'Peter Gayle',
    'password' => 'Petergayle@123',
    'contact_num' => '09223334444',
    'username' => 'peter',
    'role' => 'client',
    'passport_img' => loadImageOrFail('peter.jpg'),
    'flight_id' => null,
  ],
  [
    'fullname' => 'Bruce Clarks',
    'password' => 'Bruceclarks@123',
    'contact_num' => '09998887777',
    'username' => 'bruce',
    'role' => 'client',
    'passport_img' => loadImageOrFail('bruce.jpg'),
    'flight_id' => null,
  ],
  [
    'fullname' => 'Clark Johnson',
    'password' => 'Clarkjohnson@123',
    'contact_num' => '09179998888',
    'username' => 'clark',
    'role' => 'client',
    'passport_img' => loadImageOrFail('clark.jpg'),
    'flight_id' => null,
  ],
];
