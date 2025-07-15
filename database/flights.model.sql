CREATE TABLE IF NOT EXISTS public.flights (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  departure_planet_id UUID REFERENCES planets(id),
  arrival_planet_id UUID REFERENCES planets(id),
  departure_time TIMESTAMP NOT NULL,
  return_time TIMESTAMP NOT NULL,
  capacity INT NOT NULL,
  base_price NUMERIC(10,2) NOT NULL,
  flight_number VARCHAR(20) NOT NULL UNIQUE,
  launch_pad VARCHAR(50),
  gate VARCHAR(10),
  class VARCHAR(30) NOT NULL CHECK (class IN ('economy', 'business', 'first', 'galactic')),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);