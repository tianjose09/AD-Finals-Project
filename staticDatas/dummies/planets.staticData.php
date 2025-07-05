<?php
// handlers/dummies/planets.staticData.php

return [
  [
    'name' => 'Earth',
    'distance_from_earth' => '0 km',
    'planet_img' => file_get_contents(IMAGES_PATH . '/earth.jpg')
  ],
  [
    'name' => 'Mars',
    'distance_from_earth' => '225 million km',
    'planet_img' => file_get_contents(IMAGES_PATH . '/mars.jpg')
  ],
  [
    'name' => 'Venus',
    'distance_from_earth' => '261 million km',
    'planet_img' => file_get_contents(IMAGES_PATH . '/venus.jpg')
  ],
  [
    'name' => 'Jupiter',
    'distance_from_earth' => '588 million km',
    'planet_img' => file_get_contents(IMAGES_PATH . '/jupiter.jpg')
  ],
  [
    'name' => 'Saturn',
    'distance_from_earth' => '1.2 billion km',
    'planet_img' => file_get_contents(IMAGES_PATH . '/saturn.jpg')
  ],
];