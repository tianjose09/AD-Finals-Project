CREATE TABLE IF NOT EXISTS public.flights (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  departure_planet_id UUID REFERENCES planets(id),
  arrival_planet_id UUID REFERENCES planets(id),
  departure_time TIMESTAMP NOT NULL,
  return_time TIMESTAMP NOT NULL,
  price NUMERIC(10,2) NOT NULL,
  flight_number VARCHAR(20) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);