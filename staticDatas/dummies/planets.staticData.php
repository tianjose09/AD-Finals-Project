<?php
// handlers/dummies/planets.staticData.php

return [
  [
    'name' => 'Earth',
    'distance_from_earth' => 0,
    'description' => 'Our home planet, Earth supports diverse life and is the origin of all known space missions.',
    'price' => 0
  ],
  [
    'name' => 'Moon',
    'distance_from_earth' => 384400 / 9.461e+12, // ≈ 0.000000041
    'description' => 'Only natural satellite of Earth, the Moon influences tides and is the site of the first human space landing; its surface is covered in craters and dusty plains.',
    'price' => 750000
  ],
  [
    'name' => 'Mars',
    'distance_from_earth' => 225000000 / 9.461e+12, // ≈ 0.00002377
    'description' => 'Known as the Red Planet due to its iron-rich soil, Mars has the largest volcano in the solar system and signs of ancient water flows.',
    'price' => 2500000
  ],
  [
    'name' => 'Venus',
    'distance_from_earth' => 261000000 / 9.461e+12, // ≈ 0.00002759
    'description' => 'Similar in size to Earth but extremely hot, Venus has a thick, toxic atmosphere and surface temperatures hot enough to melt lead.',
    'price' => 3000000
  ],
  [
    'name' => 'Jupiter',
    'distance_from_earth' => 588000000 / 9.461e+12, // ≈ 0.00006215
    'description' => 'The largest planet in the solar system, Jupiter is a gas giant with powerful storms, including the iconic Great Red Spot.',
    'price' => 5000000
  ],
  [
    'name' => 'Saturn',
    'distance_from_earth' => 1200000000 / 9.461e+12, // ≈ 0.00012684
    'description' => 'Famous for its stunning ring system, Saturn is a gas giant composed mostly of hydrogen and helium, with dozens of moons.',
    'price' => 5500000
  ],
];
